using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics;
using System.Linq;
using System.ServiceProcess;
using System.Text;
using ServiceUtils.Service;
using ServiceUtils.Configuration;

namespace RightFaxService
{
    partial class RFService : ServiceBase
    {
        private List<FaxService> services;
        private String mainServicePath;
        public RFService()
        {
            InitializeComponent();
            services = new List<FaxService>();
        }

        protected override void OnStart(string[] args)
        {
            // TODO: Add code here to start your service.
            try
            {
                ApplicationSetting.Instance.Initialize();
                mainServicePath = ConfigurationSetting.Instance.LocalFolderPath + "Service.log";
                System.IO.File.AppendAllText(mainServicePath, String.Format("Service started at {0}", DateTime.Now.ToString()));
                int id = 1;
                foreach (var user in ServiceUtils.Configuration.ApplicationSetting.Instance.FaxUsers)
                {
                    services.Add(ServiceUtils.Service.FaxService.Create(user));
                    System.Threading.Thread.Sleep(1000); // Make sure all data prepared
                    System.Threading.Thread startThread = new System.Threading.Thread(StartFaxService);
                    startThread.Start(id);
                    System.IO.File.AppendAllText(mainServicePath, String.Format("Service {0} for user {1} started at {2}", id + 1, user.Username, DateTime.Now.ToString()));

                }
                Console.WriteLine("All services started!");
            }
            catch (Exception ex)
            {
                System.IO.File.AppendAllText(mainServicePath, String.Format("Exception Occured: OnStart() at {0}{1}Message: {2}{3}", DateTime.Now.ToString(), Environment.NewLine, ex.Message, Environment.NewLine));
                System.IO.File.AppendAllText(mainServicePath, String.Format("Exception Occured: OnStart() at {0}{1}Stack Trace: {2}{3}", DateTime.Now.ToString(), Environment.NewLine, ex.StackTrace, Environment.NewLine));
            }


        }

        protected override void OnStop()
        {
            // TODO: Add code here to perform any tear-down necessary to stop your service.
            try
            {
                // Send signal to abort all services
                foreach (var serv in services)
                    serv.Stop();
                System.IO.File.AppendAllText(mainServicePath, String.Format("All services stopped at {0}", DateTime.Now.ToString()));
            }
            catch (Exception ex)
            {
                System.IO.File.AppendAllText(mainServicePath, String.Format("Exception Occured: OnStop() at {0}{1}Message: {2}{3}", DateTime.Now.ToString(), Environment.NewLine, ex.Message, Environment.NewLine));
                System.IO.File.AppendAllText(mainServicePath, String.Format("Exception Occured: OnStop() at {0}{1}Stack Trace: {2}{3}", DateTime.Now.ToString(), Environment.NewLine, ex.StackTrace, Environment.NewLine));
            }
        }

        private void StartFaxService(object id)
        {
            try
            {
                services[(int)id].Run();
            }
            catch (Exception ex)
            {
                System.IO.File.AppendAllText(mainServicePath, String.Format("Exception Occured: StartFaxService() at {0}{1}Message: {2}{3}", DateTime.Now.ToString(), Environment.NewLine, ex.Message, Environment.NewLine));
                System.IO.File.AppendAllText(mainServicePath, String.Format("Exception Occured: StartFaxService() at {0}{1}Stack Trace: {2}{3}", DateTime.Now.ToString(), Environment.NewLine, ex.StackTrace, Environment.NewLine));

            }
        }

    }
}
