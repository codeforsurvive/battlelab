using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ServiceUtils;
using ServiceUtils.Utils;
using ServiceUtils.Configuration;
using ServiceUtils.Database;

namespace TestConsoleApp
{
    class Program
    {
        

        static List<ServiceUtils.Service.FaxService> services;
        static void Main(string[] args)
        {
            try
            {
                //String[] jpegs = FileUploader.ConvertTiffToJpeg(@"D:\FX6328.TIF");
                //foreach (String jgp in jpegs)
                    //Console.WriteLine(jgp);
                //Console.ReadKey();
                
                ApplicationSetting.Instance.Initialize();
                /*DbAuthentication auth = ApplicationSetting.Instance.AuthorizedDbUser;
                if (ConnectionManager.Instance.OpenConnection(auth))
                {
                    Console.WriteLine("Connection successful!");
                    DateTime now = DateTime.Now;
                    String sql = String.Format("insert into cti_fax (phone_num, path, flag_active, created_at, updated_at, state, lock) values('78434654', 'Test3', 1, '{0}', '{1}', 'opened', false)", now.ToString(), now.ToString());
                    int affected = ConnectionManager.Instance.ExecuteNonQuery(sql);
                    Console.WriteLine("Command finished! Affected row: {0}", affected);

                    ConnectionManager.Instance.CloseConnection();
                }*/
                services = new List<ServiceUtils.Service.FaxService>();
                int id = 0;
                foreach (var user in ServiceUtils.Configuration.ApplicationSetting.Instance.FaxUsers)
                {
                    ServiceUtils.Service.Domain.FaxAuthentication auth = user;
                    services.Add(ServiceUtils.Service.FaxService.Create(auth));
                    System.Threading.Thread.Sleep(1000);
                    System.Threading.Thread t = new System.Threading.Thread(Start);
                    t.Start(id);
                    System.Threading.Thread.Sleep(1000);
                    //System.Threading.Thread t2 = new System.Threading.Thread(Stop);
                    //t2.Start(id);
                    id++;

                }
            }
            catch (Exception ex)
            {
                Console.WriteLine("Exception Occured!{0}Message: {1}{2}Stack Trace: {3}", Environment.NewLine, ex.Message, Environment.NewLine, ex.StackTrace);
            }
            finally
            {
                //foreach (var srv in services)
                    //srv.Stop();
                //Console.WriteLine("All services stopped!");
            }
            //Console.WriteLine("Exiting. . . .");

            //String filename = "app.xml.tif";
            //int index = filename.LastIndexOf('.');
            //Console.WriteLine(filename.Substring(index + 1));
            

            //ServiceUtils.Service.Domain.FaxProperty fax = new ServiceUtils.Service.Domain.FaxProperty(@"D:\RightFax\3-5-2015 10.21 AM\MWU52D7B10A9DAD\MWU52D7B10A9DAD.xml");
            //Console.WriteLine(fax.Xml);
            Console.ReadKey();
            Console.WriteLine("All services stopped!");
        }

        static void Start(object id)
        {
            Console.WriteLine("Services {0} starting . . . ", id);
            services[(int)id].Run();
        }

        static void Stop(object id)
        {
            /*int elapsed = 0;
            int limit = 60 * 1000;
            int step = 1000;
            while(elapsed < limit)
            {

                System.Threading.Thread.Sleep(step);
                elapsed += step;
                Console.WriteLine("Elapsed time: {0}", elapsed);
            }*/
            services[(int)id].Stop();
            Console.WriteLine("Service {0} stopping!", id);
            
        }

        void RunService(object id)
        {

            ServiceUtils.Service.Domain.FaxAuthentication auth = ServiceUtils.Configuration.ApplicationSetting.Instance.FaxUsers[(int)id];
            ServiceUtils.Service.FaxService service = ServiceUtils.Service.FaxService.Create(auth);
            service.Run();
        }
    }
}
