using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data.SqlClient;
using System.Data;
using ITPI.Net.Utils.Configuration;
using ITPI.Net.Utils.Database;
using ITPI.Net.Utils.Domain;
using System.ServiceModel;
using System.Xml.Linq;
using System.Configuration;
using ITPI.Net.Utils;
using Newtonsoft.Json.Linq;


namespace ConsoleAppClient
{

    class Program
    {
        class PrData
        {
            int subTaskId;
            int vendorId;
            List<int> prLines;

            public PrData(int subTask, int vendor)
            {
                this.subTaskId = subTask;
                this.vendorId = vendor;
                this.prLines = new List<int>();
            }

            public void AddPrLine(int item)
            {
                this.prLines.Add(item);
            }

            public int SubtaskId
            {
                get { return subTaskId; }
            }

            public int VendorId
            {
                get { return vendorId; }
            }

            public IEnumerable<int> PrLines
            {
                get { return prLines.Distinct(); }
            }
        };

        static void Main(string[] args)
        {

            try
            {
                List<ViewPengumumanPengadaan> list = new ViewPengumumanPengadaan().Select(0, 10);
                foreach (var data in list)
                {
                    Console.WriteLine(data.InnerXml);
                }
                Console.ReadKey();

                String jsonString = "{ID_PR: 1, agent: 'Hendra', departemen: 'Pengadaan', pemenang: [{pr_subpekerjaan_id: 2, rekanan_id: 3, listIDPRLine: [1,2,3]}, {pr_subpekerjaan_id: 4, rekanan_id: 5, listIDPRLine: [4,5,6]}]}";


                ITPIService.Service1Soap client = new ITPIService.Service1SoapClient("Service1Soap");
                AxEprocService.EprocAxMaximoServiceClient axClient = new AxEprocService.EprocAxMaximoServiceClient("NetTcpBinding_EprocAxMaximoService");
                axClient.ClientCredentials.Windows.ClientCredential.Domain = ConfigurationManager.AppSettings["domain"]; //"tps.co.id";
                axClient.ClientCredentials.Windows.ClientCredential.UserName = ConfigurationManager.AppSettings["username"]; //"axadmin@tps.co.id";
                axClient.ClientCredentials.Windows.ClientCredential.Password = ConfigurationManager.AppSettings["password"];//"dynamics2012";
                Console.WriteLine(client.IsPrApproved("PR-2291"));
                Console.WriteLine("Press anykey to continue  . . . ");
                Console.ReadKey();

                
                //jsonString = "{ID_PR: 18, agent: 'MAXADMIN', departemen: 'ENG-IT', site: 'SBY', pemenang: [{pr_subpekerjaan_id: 64, rekanan_id: 97, listIDPRLine: [100, 101, 102]}]}";
                jsonString = "{ID_PR:1,agent:'MAXADMIN',departemen:'ENG-IT',site:'SBY',pemenang:[{pr_subpekerjaan_id:10,rekanan_id:97,listIDPRLine:[2,3,4,5,6,7,8,9]}]}";
               
                // Test data fom maximo
                String jsonTestString = "{ID_PR: 'PR-2023', agent: 'RIO', departemen: 'ENG-IT', site: 'SBY', pemenang: [{pr_subpekerjaan_id: 59, rekanan_id: 97, listIDPRLine: [1,2]}]}";
                var json = JObject.Parse(jsonTestString);
                String pr_id = json.Root["ID_PR"].ToString();
                String agent = json.Root["agent"].ToString();
                String department = json.Root["departemen"].ToString();
                String site = json.Root["site"].ToString();
                var pemenang = JArray.Parse(json.Root["pemenang"].ToString());
                List<PrData> prList = new List<PrData>();
                foreach (JToken token in pemenang)
                {
                    int sub = Convert.ToInt32(token["pr_subpekerjaan_id"]);
                    int vendor = Convert.ToInt32(token["rekanan_id"]);
                    PrData prData = new PrData(sub, vendor);
                    var prLines = JArray.Parse(token["listIDPRLine"].ToString());
                    foreach (int val in prLines)
                        prData.AddPrLine(val);
                    prList.Add(prData);
                }
                /**
                 * 
                Console.WriteLine("Pr Data: ");
                Console.WriteLine("Pr Id : {0}", pr_id);
                Console.WriteLine("Agent : {0}", agent);
                Console.WriteLine("Department: {0}", department);
                Console.WriteLine("Pr Sub Tasks: ");
                foreach (PrData item in prList)
                {
                    Console.WriteLine("Subtask Id: {0}", item.SubtaskId);
                    Console.WriteLine("Vendor Id: {0}", item.VendorId);
                    Console.WriteLine("Pr Lines: ");
                    foreach (int val in item.PrLines)
                        Console.WriteLine("Pr Lines Id: {0}", val);
                    Console.WriteLine();

                }
                 * */

                Console.WriteLine("Request: {0}{1}", JObject.Parse(jsonString).ToString(), Environment.NewLine);

                Console.WriteLine("Press anykey to continue . . .");
                Console.ReadKey();
                String response = client.CreatePO(jsonString);
                Console.WriteLine("Response: {0}{1}", response, Environment.NewLine);
                System.IO.File.WriteAllText("out.txt", response);

                //Console.WriteLine("Press anykey to continue  . . . ");
                //Console.ReadKey();



                /*
                ITPIService.PrEproc pr = new ITPIService.PrEproc();
                pr.Id = 12;
                List<String[]> criteria = new List<String[]>();
                criteria.Add(new String[] { "pr_id", pr.Id.ToString() });
                Console.WriteLine("PR by Id : {0}", pr.Id);
                ITPIService.FindRequest _request = new ITPIService.FindRequest(pr, criteria.ToArray());
                Console.WriteLine(client.Find(_request).FindResult);
                Console.WriteLine("Press anykey to continue  . . . ");
                Console.ReadKey();

                criteria.Clear();
                Console.WriteLine("PR Line by PR Id : {0}", pr.Id);
                criteria.Add(new String[] { "pr_id", pr.Id.ToString() });
                _request = new ITPIService.FindRequest(new ITPIService.PrLineEproc(), criteria.ToArray());
                Console.WriteLine(client.Find(_request).FindResult);
                Console.WriteLine("Press anykey to continue  . . . ");
                Console.ReadKey();



                criteria.Clear();
                criteria.Add(new String[] { "pr_subpekerjaan_id", "23" });
                _request = new ITPIService.FindRequest(new ITPIService.PrSubTask(), criteria.ToArray());
                Console.WriteLine(client.Find(_request).FindResult);
                Console.WriteLine("Press anykey to continue  . . . ");
                Console.ReadKey();
                 * */











                //MaximoEprocService.EPROC_TPSCPOInterfacePortTypeClient mxClient = new MaximoEprocService.EPROC_TPSCPOInterfacePortTypeClient("EPROC_TPSCPOInterfacePortType");
                EndpointAddress address = new EndpointAddress("http://tpsmaximo02:9086/meaweb/services/EPROC_TPSCPOInterface");
                EPROC_TPSCPOInterfacePortTypeClient mxClient = new EPROC_TPSCPOInterfacePortTypeClient("EPROC_TPSCPOInterfaceSOAP11Port", address);
                Console.WriteLine("Endpoint: {0}", mxClient.Endpoint.Name);
                Console.WriteLine("State: {0}", mxClient.State.ToString());
                Console.ReadKey();


                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.Employee()));
                Console.ReadKey();
                ITPIService.Department dept = new ITPIService.Department();
                dept.Id = 1;
                dept.Name = "Operational";
                dept.Active = true;
                dept.Description = "Human Resource";
                dept.AxId = "00000007";


                ITPIService.Roles role = new ITPIService.Roles();
                role.Id = 1;
                role.Authority = "operator";
                role.Active = true;
                role.Type = "back end";

                ITPIService.Employee emp = new ITPIService.Employee();
                emp.Id = 4;
                emp.Name = "Employee 2";
                emp.NIK = "0470453495736";
                emp.Email = "emp1@company.com";
                emp.Active = true;
                emp.CreatedBy = 0;
                emp.DateCreated = DateTime.Now.ToString();
                emp.Department = dept;
                emp.LastUpdate = DateTime.Now.ToString();
                emp.UpdatedBy = 0;
                emp.Username = "emp2";
                emp.Password = "";
                emp.Role = role;

                Console.WriteLine("Inserting Employee: ");
                Console.WriteLine(emp.ToString());
                Console.WriteLine("Result: {0}", client.InsertEmployee(emp));

                //Console.WriteLine("Select Service To Consume: ");
                //Console.WriteLine("1. Employee");
                //Console.WriteLine("2. Vendor");

                //int selection = Convert.ToInt32(Console.ReadLine());


                //Console.WriteLine(client.Get(new ITPIService.Employee()));
                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.Department()));
                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.Roles()));
                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.Province()));
                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.City()));
                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.Vendor()));
                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.PurchaseRequisition()));
                //Console.ReadKey();
                //Console.WriteLine(client.Get(new ITPIService.PurchaseRequisitionLine()));
                //Console.ReadKey();

                /**ITPIService.PurchaseRequisition pr = new ITPIService.PurchaseRequisition();
                pr.Id = 1;
                pr.Code = "PR0001";
                pr.Name = "Perbaikan Kabel PJU";
                pr.Confirmed = false;
                pr.Created = false;

                ITPIService.PurchaseRequisitionLine prl = new ITPIService.PurchaseRequisitionLine();
                prl.PR = pr;

                

                Console.WriteLine(client.InsertPrLine(prl));**/
                //ConfigurationSetting.Instance.MapValues(Helper.AssemblyDirectory + @"\setting.xml");
                //Employee emp = new Employee();
                //emp.NIK = "8606120200";
                //if (emp.Exist())
                //{
                //    Console.WriteLine(emp.InnerXml);
                //}
                //Department dept = new Department();
                //dept.AxId = "00000005";
                //if (dept.Exist())
                //{
                //    Console.WriteLine(dept.InnerXml);
                //}
                //Console.WriteLine(client.Get(new ITPIService.Employee()));
                //Console.WriteLine(client.Get(new ITPIService.PurchaseRequisitionLine()));
                //City city = new City();
                //city.Name = "Surabaya";
                //Province prov = new Province();
                //prov.Name = "Jawa Timur";
                //city.Province = prov;
                //Vendor vendor = new Vendor();
                //vendor.AxId = "VD001";
                //vendor.City = city;
                //vendor.Province = prov;
                //vendor.OnHold = true;

                //PurchaseRequisition pr = new PurchaseRequisition();
                //pr.Code = "PR0001";

                //for (int i = 0; i < 5; i++)
                //{
                //    PrDocument prDoc = new PrDocument();
                //    prDoc.Code = String.Format("PR-DOC000{0}", (i + 1));
                //    prDoc.UrlDocument = String.Format("testlink-{0}.pdf", (i + 1));
                //    prDoc.PR = pr;
                //    Console.WriteLine(prDoc.Save());
                //}

                //Console.WriteLine(client.Get( new ITPIService.Department()));

            }
            catch (Exception ex)
            {
                ITPI.Net.Utils.Logger.LogToConsole(ex);
            }

            Console.ReadKey();
        }
    }
}
