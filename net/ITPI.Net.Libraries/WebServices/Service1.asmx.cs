using ITPI.Net.Utils;
using ITPI.Net.Utils.Configuration;
using ITPI.Net.Utils.Database;
using ITPI.Net.Utils.Domain;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Services;

namespace WebServices
{
    /// <summary>
    /// Summary description for Service1
    /// </summary>
    [WebService(Namespace = "http://localhost:8888/Services/ITPI/Service1.asmx")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class Service1 : System.Web.Services.WebService
    {

        [WebMethod]
        public String Message(String request)
        {
            return ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Success, "Get message request", request);
        }

        [WebMethod]
        public String InsertDepartment(Department departemen)
        {
            return Insert(departemen);
        }

        [WebMethod]
        public String InsertEmployee(Employee employee)
        {
            return Insert(employee);
        }

        [WebMethod]
        public String InsertVendor(Vendor vendor)
        {
            return Insert(vendor);
        }

        [WebMethod]
        public String InsertCity(City city)
        {
            return Insert(city);
        }

        [WebMethod]
        public String InsertProvince(Province prov)
        {
            return Insert(prov);
        }

        [WebMethod]
        public String InsertPR(PurchaseRequisition pr)
        {
            return Insert(pr);
        }

        [WebMethod]
        public String InsertPrLine(PurchaseRequisitionLine prl)
        {
            return Insert(prl);
        }


        private String Insert(BaseModel model)
        {

            ConfigurationSetting.Instance.MapValues(Helper.AssemblyDirectory + @"\setting.xml");
            DbAuthentication auth = ConfigurationSetting.Instance.Authenticaton;
            SQLServerProvider dataProvider = new SQLServerProvider();
            if (dataProvider.OpenConnection(auth))
            {
                //Console.WriteLine("Conencted!");
                int affected = model.Save();

                dataProvider.CloseConnection();
                return (affected > 0 ) 
                    ? ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Success, String.Format("Insert to table {0} success, affected row : {1}", model.TableName, affected), System.Xml.Linq.XElement.Parse(model.InnerXml))
                    : ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Warning, String.Format("Insert to table {0} failed, affected row : {1}", model.TableName, affected), System.Xml.Linq.XElement.Parse(model.InnerXml));
            }
            return ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Error, "Cannot to connect database!", "");
        }

        [WebMethod]
        public String Get(BaseModel model)
        {
            ConfigurationSetting.Instance.MapValues(Helper.AssemblyDirectory + @"\setting.xml");
            DbAuthentication auth = ConfigurationSetting.Instance.Authenticaton;
            SQLServerProvider dataProvider = new SQLServerProvider();
            if (dataProvider.OpenConnection(auth))
            {
                //Console.WriteLine("Conencted!");
                DataSet ds = model.Get();
                dataProvider.CloseConnection();
                return (ds.Tables[0].Rows.Count > 0)
                    ? ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Success, String.Format("{0} rows retreived from table: {1}", ds.Tables[0].Rows.Count, model.TableName), System.Xml.Linq.XElement.Parse(ds.GetXml()))
                    : ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Warning, String.Format("{0} rows retreived from table: {1}", ds.Tables[0].Rows.Count, model.TableName), "");
            }
            return ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Error, "Cannot to connect database!", "");
            
        }


    }
}