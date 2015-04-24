using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using RFCOMAPILib;
using System.Threading;

namespace ServiceUtils.Service
{
    public sealed class FaxService
    {
        private FaxServer server;

        // Threading Control
        private static ManualResetEvent _stopper = new ManualResetEvent(false);
        private bool running = true;

        // Service setting
        private String logPath;
        private short waitTime;
        private short delayTime;

        // restrict constructor access outside class
        private FaxService()
        {
            try
            {
                server = new FaxServer();
                server.Protocol = CommunicationProtocolType.cpTCPIP;
                server.UseNTAuthentication = BoolType.False;
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }

        public static FaxService Create(Domain.FaxAuthentication auth)
        {
            try
            {
                FaxService instance = new FaxService();
                FaxServer server = instance.Server;
                server.Protocol = CommunicationProtocolType.cpTCPIP;
                server.UseNTAuthentication = BoolType.False;
                server.ServerName = auth.Host;
                server.AuthorizationUserID = auth.Username;
                server.AuthorizationUserPassword = auth.Password;
                instance.Server = server;
                instance.LogPath = auth.Log;
                instance.WaitTime = auth.WaitTime;
                instance.DelayTime = auth.DelayTime;
                return instance;
            }
            catch (Exception ex)
            {

                return null;
            }

        }

        // Main Thread
        public void Run()
        {
            try
            {
                server.OpenServer();

                //Thread main = new Thread(MainThreadProcess);
                //main.Start();
                //Thread.Sleep(WaitTime);
                //Log("Main Thread started!", " FaxService.Main()");
                MainThreadProcess();



            }
            catch (Exception ex)
            {
                //server.CloseServer();
                Log("Error occured!. Message: " + ex.Message, "FaxService.Run()");

            }
            finally
            {
                server.CloseServer();
            }
        }



        public void MainThreadProcess()
        {
            int count = 0;
            int elapsed = 0;
            while (CheckStopCondition())
            {
                try
                {
                    // Testing purpose
                    /**
                     * DateTime now = DateTime.Now;
                    if (now.Hour == 15 && now.Minute == 30)
                        Stop();
                     * */
                    if (DelayTime >= elapsed)
                    {
                        elapsed = 0;
                        CheckForNewFax();
                    }

                    Thread.Sleep(WaitTime);
                    elapsed += WaitTime;


                }
                catch (Exception ex)
                {
                    Log("Exception Occured! Message: " + ex.Message, "FaxService.MainThreadProcess()");

                }
            }
            Console.WriteLine("Closing connection . . .");
            Log("Main Thread stopped!", "FaxService.MainThreadProcess()");

        }

        public void SubThreadProcess()
        {
            try
            {
                if (_stopper.WaitOne(WaitTime, false))
                {
                    //Log("Child Thread stopped by main Thread stop signal!", "FaxService.SubThreadProcess()");
                    // Main Thread Stopped
                    return;
                }
                CheckForNewFax();
                //Log("Child Thread stopped normally!", "FaxService.MainThreadProcess()");
            }
            catch (Exception ex)
            {
                Log("Exception Occured! Message: " + ex.Message, "FaxService.SubThreadProcess()");
                return;
            }
        }

        private void Log(String message, String location)
        {
            Mutex objMutex = new Mutex(false, "ThreadLock");
            objMutex.WaitOne();
            System.IO.File.AppendAllText(LogPath, message + " at " + DateTime.Now.ToString() + " at " + location + Environment.NewLine);
            objMutex.ReleaseMutex();
            objMutex.Close();
        }

        public bool CheckStopCondition()
        {
            return running;
        }



        private void CheckForNewFax()
        {
            try
            {
                RFCOMAPILib.Fax newFax = server.User.CheckForNewFaxes;
                if (newFax == null)
                {
                    Console.WriteLine("No new fax! {0}", DateTime.Now.ToString());
                    //Log("Checked to fax server. No fax received!", "FaxService.CheckForNewFax");
                }
                else
                {
                    Console.WriteLine("Fax Received!");
                    Log("Checked to server. New fax received! Uid: " + newFax.UniqueID + " Handle : " + newFax.Handle, "FaxService.CheckForNewFax");
                    Thread.Sleep(DelayTime);
                    Domain.FaxObject faxObj = RetreiveFax(newFax);
                    if (faxObj != null)
                    {
                        InsertFax(faxObj);
                        Console.WriteLine("Fax data successfully inserted!");
                    }
                    else
                    {
                        Console.WriteLine("Fax data failed to insert!");
                    }
                }
            }
            catch (Exception ex)
            {
                Log("Exception Occured! Message: " + ex.Message, "FaxService.CheckForNewFax()");
                Log("Exception Occured! Stack Trace: " + ex.StackTrace, "FaxService.CheckForNewFax()");
            }
            finally
            {

            }
        }

        private Domain.FaxObject RetreiveFax(Fax fax)
        {
            try
            {
                String remotePath = Configuration.ConfigurationSetting.Instance.RemoteFolderPath + "\\" + fax.UniqueID + "\\";
                String localPath = Configuration.ConfigurationSetting.Instance.LocalFolderPath + "\\" + fax.UniqueID + "\\";
                String remoteUrl = Configuration.ConfigurationSetting.Instance.RemoteUrlPath + "/" + fax.UniqueID + "/";
                if (!System.IO.Directory.Exists(localPath))
                {
                    System.IO.Directory.CreateDirectory(localPath);
                }

                if (!System.IO.Directory.Exists(remotePath))
                {
                    System.IO.Directory.CreateDirectory(remotePath);
                }
                String xmlFile = localPath + fax.UniqueID + ".xml";
                System.IO.File.WriteAllText(xmlFile, fax.XML);
                Log("Fax XML saved!", "FaxService.RetreiveFax");
                // Upload to remote folder
                Utils.FileUploader.LocalFileUpload(xmlFile, remotePath + fax.UniqueID + "_" + DateTime.Now.ToShortDateString().Replace("/", "-") + ".xml");
                Log("Fax XML uploaded!", "FaxService.RetreiveFax");
                String[] faxImageFilenames = null;

                foreach (Attachment attachment in fax.Attachments)
                {
                    String attachmentFilePath = attachment.FileName;
                    Thread.Sleep(WaitTime);
                    int index = attachmentFilePath.LastIndexOf('\\');
                    String attachMentFileName = attachmentFilePath.Substring(index + 1);
                    index = attachMentFileName.LastIndexOf('.');
                    String extension = attachMentFileName.Substring(index + 1);
                    String desiredFileName = fax.UniqueID + ".jpg";
                    Thread.Sleep(WaitTime);
                    System.IO.File.Copy(attachmentFilePath, localPath + fax.UniqueID + "." + extension);
                    //System.Drawing.Bitmap src = new System.Drawing.Bitmap(attachmentFilePath);
                    //src.Save(localPath + fax.UniqueID + "." + extension);

                    String[] jpegs = Utils.FileUploader.ConvertTiffToJpeg(localPath + fax.UniqueID + "." + extension);
                    int saved = 0;
                    int total = jpegs.Length;
                    faxImageFilenames = new String[total];
                    foreach (String jpg in jpegs)
                    {

                        int _index = jpg.LastIndexOf('\\');
                        String _filename = jpg.Substring(_index + 1);
                        faxImageFilenames[saved] = remoteUrl + _filename;
                        Console.WriteLine("Filename: {0}", faxImageFilenames[saved]);
                        Log("Fax image file saved! " + (saved + 1) + " of " + total, "FaxService.RetreiveFax");
                        Thread.Sleep(WaitTime);
                        // Upload to remote folder 
                        Utils.FileUploader.LocalFileUpload(jpg, remotePath + _filename);
                        Log("Fax image file uploaded! " + (saved + 1) + " of " + total, "FaxService.RetreiveFax");
                        Thread.Sleep(WaitTime);
                        saved++;
                    }
                }
                Thread.Sleep(DelayTime);
                Domain.FaxObject obj = Domain.FaxObject.Create(xmlFile, faxImageFilenames);
                return obj;
            }
            catch (Exception ex)
            {
                Log("Exception Occured! Message: " + ex.Message, "FaxService.RetreiveFax()");
                return null;

            }

        }

        private void InsertFax(Domain.FaxObject fax)
        {
            try
            {
                if (ServiceUtils.Database.ConnectionManager.Instance.OpenConnection(Configuration.ApplicationSetting.Instance.AuthorizedDbUser))
                {
                    String phone = fax.Properties.Phone;
                    String[] paths = fax.Path;
                    String state = "opened";
                    String locked = "false";
                    String flagActive = "1";
                    String sentTime = fax.Properties.SentTime.ToString();
                    int totalPage = fax.Properties.TotalPage;
                    String formattedPath = String.Empty;
                    StringBuilder sb = new StringBuilder();
                    foreach (String s in paths)
                        sb.Append(s).Append(";"); // ; as separator
                    formattedPath = sb.ToString(0, sb.Length - 1);
                    String sql = String.Format("insert into cti_fax (phone_num, path, flag_active, created_at, updated_at, state, send_time, lock, total_pages) values('{0}', '{1}', {2}, now()::TIMESTAMP, now()::TIMESTAMP, '{3}', '{4}', {5}, {6})", phone, formattedPath, flagActive, state, sentTime, locked, totalPage);
                    int affected = ServiceUtils.Database.ConnectionManager.Instance.ExecuteNonQuery(sql);
                    Log(String.Format("Command finished! Affected row: {0}", affected), "FaxService.InsertFax()");
                }
                else
                    Log(String.Format("Cannot connect database!"), "FaxService.InsertFax()");
            }
            catch (Exception ex)
            {
                Log("Exception Occured! Message: " + ex.Message, "FaxService.InsertFax()");
                Log("Exception Occured! Stack Trace: " + ex.StackTrace, "FaxService.InsertFax()");
            }
            finally
            {
                Database.ConnectionManager.Instance.CloseConnection();
            }



        }


        public void Stop()
        {
            running = false;
        }




        public FaxServer Server
        {
            private set { server = value; }
            get { return server; }
        }

        public String LogPath
        {
            private set { logPath = value; }
            get { return logPath; }
        }

        public short WaitTime
        {
            private set { waitTime = value; }
            get { return waitTime; }
        }

        public short DelayTime
        {
            private set { delayTime = value; }
            get { return delayTime; }
        }
    }
}
