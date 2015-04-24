using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Net;
using System.IO;
using System.Collections.Specialized;
using System.Drawing;
using System.Drawing.Imaging;

namespace ServiceUtils.Utils
{
    public class FileUploader
    {
        private String uri;
        private String sourceFilePath;


        public FileUploader(string targetUri)
        {
            using (WebClient client = new WebClient())
            {
                try
                {
                    uri = targetUri;
                    client.DownloadString(targetUri);
                    Console.WriteLine("Successfully connected to target Uri!");

                }
                catch (Exception ex)
                {
                    Console.WriteLine("Connection to target Uri throws an exception. {0}", ex.Message);
                }
            }
        }

        public static void LocalFileUpload(String source, String destination)
        {
            try
            {

                File.Copy(source, destination, true);
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }

        public static string[] ConvertTiffToJpeg(string fileName)
        {
            using (Image imageFile = Image.FromFile(fileName))
            {
                FrameDimension frameDimensions = new FrameDimension(
                    imageFile.FrameDimensionsList[0]);

                // Gets the number of pages from the tiff image (if multipage) 
                int frameNum = imageFile.GetFrameCount(frameDimensions);
                string[] jpegPaths = new string[frameNum];

                for (int frame = 0; frame < frameNum; frame++)
                {
                    // Selects one frame at a time and save as jpeg. 
                    imageFile.SelectActiveFrame(frameDimensions, frame);
                    using (Bitmap bmp = new Bitmap(imageFile))
                    {
                        jpegPaths[frame] = String.Format("{0}\\{1}_{2}.jpg",
                            Path.GetDirectoryName(fileName),
                            Path.GetFileNameWithoutExtension(fileName),
                            frame);
                        bmp.Save(jpegPaths[frame], ImageFormat.Jpeg);
                    }
                }

                return jpegPaths;
            }
        } 

        public bool HttpUploadFile(String file, String uniqueID)
        {
            Console.WriteLine("Unique ID : {0}", uniqueID);
            try
            {
                NameValueCollection nvc = new NameValueCollection();
                nvc.Add("uniqueid", uniqueID);
                nvc.Add("submit-button", "Upload");
                

                // Header request definition
                string boundary = "----------------------------" + DateTime.Now.Ticks.ToString("x");
                byte[] boundaryBytes = System.Text.Encoding.ASCII.GetBytes("\r\n--" + boundary + "\r\n");

                HttpWebRequest request = (HttpWebRequest)WebRequest.Create(uri);
                request.ContentType = "multipart/form-data; boundary=" + boundary;
                request.Method = "POST";
                request.KeepAlive = true;
                request.Credentials = CredentialCache.DefaultCredentials;

                // Get stream tunnel
                Stream memoryStream = new MemoryStream();
                

                // Form data definition
                String formDataTemplate = "Content-Disposition: form-data; name=\"{0}\"\r\n\r\n{1}";
                foreach (string key in nvc.Keys)
                {
                    Console.WriteLine("nvc[{0}] : {1}", key, nvc[key]);
                    memoryStream.Write(boundaryBytes, 0, boundaryBytes.Length);
                    string formItem = string.Format(formDataTemplate, key, nvc[key]);
                    byte[] formItemBytes = System.Text.Encoding.UTF8.GetBytes(formItem);
                    memoryStream.Write(formItemBytes, 0, formItemBytes.Length);
                }
                memoryStream.Write(boundaryBytes, 0, boundaryBytes.Length);

                // Request header data
                string headerTemplate = "Content-Disposition: form-data; name=\"{0}\"; filename=\"{1}\"\r\nContent-Type: {2}\r\n\r\n";
                string header = string.Format(headerTemplate, "file", file, "image/tiff");
                byte[] headerBytes = System.Text.Encoding.UTF8.GetBytes(header);
                memoryStream.Write(headerBytes, 0, headerBytes.Length);

                // Upload transfer operation
                FileStream fileStream = new FileStream(file, FileMode.Open, FileAccess.Read);
                byte[] buffer = new byte[8192]; // Limit to 8 MBs
                int bytesRead = 0;
                while ((bytesRead = fileStream.Read(buffer, 0, buffer.Length)) != 0)
                {
                    memoryStream.Write(buffer, 0, bytesRead);
                }

                fileStream.Close();
                request.ContentLength = memoryStream.Length;
                Stream requestStream = request.GetRequestStream();
                // Cleanup  
                memoryStream.Position = 0;
                byte[] trailer = System.Text.Encoding.ASCII.GetBytes("\r\n--" + boundary + "--\r\n");
                memoryStream.Write(trailer, 0, trailer.Length);
                byte[] tempBuffer = new byte[memoryStream.Length];
                memoryStream.Read(tempBuffer, 0, tempBuffer.Length);
                memoryStream.Close();
                requestStream.Write(tempBuffer, 0, tempBuffer.Length);
                requestStream.Close();
                WebResponse response = null;
                try
                {
                    // Retreive response
                    response = request.GetResponse();
                    Stream responseStream = response.GetResponseStream();
                    StreamReader reader = new StreamReader(responseStream);
                    //Console.WriteLine("Upload succeed! {0} bytes uploaded!", responseArray.Length);
                    Console.WriteLine("\nResponse Received.The contents of the file uploaded are:\n{0}", reader.ReadToEnd());

                }
                catch (Exception ex)
                {
                    Console.WriteLine("Response throws an exception. {0}", ex.Message);
                    response.Close();
                    response = null;
                    return false;
                }
                finally
                {
                    request = null;
                }



            }
            catch (Exception ex)
            {
                Console.WriteLine("Uploading file to target Uri throws an exception. {0}\n{1}", ex.Message, ex.StackTrace);
                return false;
            }
            

            return true;
        }

        public bool Upload(String file)
        {

            try
            {
                sourceFilePath = file;
                if (!System.IO.File.Exists(file))
                {
                    Console.WriteLine("File not found! Exiting.");
                    return false;
                }
                WebClient client = new WebClient();
                byte[] responseArray = client.UploadFile(uri, "post", file);
                Console.WriteLine("Response Header:\n{0}", client.ResponseHeaders);
                //Console.WriteLine("Upload succeed! {0} bytes uploaded!", responseArray.Length);
                Console.WriteLine("\nResponse Received.The contents of the file uploaded are:\n{0}", System.Text.Encoding.ASCII.GetString(responseArray));

            }
            catch (Exception ex)
            {
                Console.WriteLine("Uploading file to target Uri throws an exception. {0}", ex.Message);
                return false;
            }
            return true;
        }

        public String Uri
        {
            get { return uri; }
        }

    }
}
