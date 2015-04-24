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


namespace ConsoleAppClient
{
    class Program
    {
        static void Main(string[] args)
        {
            try
            {

                ITPIService.Service1Soap client = new ITPIService.Service1SoapClient("Service1Soap");
                Console.WriteLine(client.Message("Hello World!"));

                Console.ReadKey();


                /**
                ITPIService.Department dept = new ITPIService.Department();
                dept.Id = 1;
                dept.Name = "HRD";
                dept.Active = true;
                dept.Description = "Human Resource";

                ITPIService.Roles role = new ITPIService.Roles();
                role.Id = 1;
                role.Authority = "operator";
                role.Active = true;
                role.Type = "back end";

                ITPIService.Employee emp = new ITPIService.Employee();
                emp.Id = 1;
                emp.Name = "Employee 2";
                emp.NIK = "83214214962148";
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

                Console.WriteLine(client.InsertEmployee(emp));
                **/

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

                PurchaseRequisition pr = new PurchaseRequisition();
                pr.Id = 1;
                pr.Code = "PR0001";
                pr.Name = "Perbaikan Kabel PJU";
                pr.Confirmed = false;
                pr.Created = false;

                PurchaseRequisitionLine prl = new PurchaseRequisitionLine();
                prl.PR = pr;

                prl.Save();

                //Console.WriteLine(client.InsertPrLine(prl));
                               
            }
            catch (Exception ex)
            {
                ITPI.Net.Utils.Logger.LogToConsole(ex);
            }

            Console.ReadKey();
        }
    }
}
