using ITPI.Net.Utils;
using ITPI.Net.Utils.Configuration;
using ITPI.Net.Utils.Database;
using ITPI.Net.Utils.Domain;
using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Hosting;
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

        // Register Addtional Domain Object
        [WebMethod]
        public String GetPrInfo(PrEproc domain)
        {
            return domain.Json;
        }

        [WebMethod]
        public String GetPrLineInfo(PrLineEproc domain)
        {
            return domain.Json;
        }

        [WebMethod]
        public String GetPrSubtaskInfo(PrSubTask domain)
        {
            return domain.Json;
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

        [WebMethod]
        public String InsertPrDocument(PrDocument prDoc)
        {
            return Insert(prDoc);
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
                return (affected > 0) ? "1" : "0";
                /**return (affected > 0 ) 
                    ? ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Success, String.Format("Insert to table {0} success, affected row : {1}", model.TableName, affected), System.Xml.Linq.XElement.Parse(model.InnerXml))
                    : ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Warning, String.Format("Insert to table {0} failed, affected row : {1}", model.TableName, affected), System.Xml.Linq.XElement.Parse(model.InnerXml)); **/
            }
            //return ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Error, "Cannot to connect database!", "");
            return "-1";
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

        [WebMethod]
        public String Find(BaseModel model, List<String[]> criteria)
        {
            ConfigurationSetting.Instance.MapValues(Helper.AssemblyDirectory + @"\setting.xml");
            DbAuthentication auth = ConfigurationSetting.Instance.Authenticaton;
            SQLServerProvider dataProvider = new SQLServerProvider();
            if (dataProvider.OpenConnection(auth))
            {
                //Console.WriteLine("Conencted!");
                DataSet ds = model.Find(criteria);
                dataProvider.CloseConnection();
                return (ds.Tables[0].Rows.Count > 0)
                    ? ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Success, String.Format("{0} rows retreived from table: {1}", ds.Tables[0].Rows.Count, model.TableName), System.Xml.Linq.XElement.Parse(ds.GetXml()))
                    : ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Warning, String.Format("{0} rows retreived from table: {1}", ds.Tables[0].Rows.Count, model.TableName), "");
            }
            return ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Error, "Cannot to connect database!", "");
        }

        [WebMethod]
        public bool IsPrApproved(String prId)
        {

            AxEprocService.EprocAxMaximoServiceClient client = new AxEprocService.EprocAxMaximoServiceClient("NetTcpBinding_EprocAxMaximoService");
            client.ClientCredentials.Windows.ClientCredential.Domain = ConfigurationManager.AppSettings["domain"]; //"tps.co.id";
            client.ClientCredentials.Windows.ClientCredential.UserName = ConfigurationManager.AppSettings["username"]; //"axadmin@tps.co.id";
            client.ClientCredentials.Windows.ClientCredential.Password = ConfigurationManager.AppSettings["password"];//"dynamics2012";
            String response = client.checkMaximo(new AxEprocService.CallContext(), prId);

            return (response == "1");
        }

        private int GetPrStatus(String prId)
        {
            try
            {
                AxEprocService.EprocAxMaximoServiceClient client = new AxEprocService.EprocAxMaximoServiceClient("NetTcpBinding_EprocAxMaximoService");
                client.ClientCredentials.Windows.ClientCredential.Domain = ConfigurationManager.AppSettings["domain"]; //"tps.co.id";
                client.ClientCredentials.Windows.ClientCredential.UserName = ConfigurationManager.AppSettings["username"]; //"axadmin@tps.co.id";
                client.ClientCredentials.Windows.ClientCredential.Password = ConfigurationManager.AppSettings["password"];//"dynamics2012";
                String response = client.checkMaximo(new AxEprocService.CallContext(), prId);
                Logger.LogToDefaultFile("Pr Validation Info", String.Format("{0} status : {1}", prId, response));
                return Convert.ToInt32(response);
            }
            catch (Exception ex)
            {
                throw ex;
            }

        }

        [WebMethod]
        public String TestCreatePo(String jsonParameters)
        {
            try
            {
                String response = String.Empty;
                var json = JObject.Parse(jsonParameters);
                String pr_id = json.Root["ID_PR"].ToString();
                String agent = json.Root["agent"].ToString();
                String department = json.Root["departemen"].ToString();
                String site = json.Root["site"].ToString();
                var pemenang = JArray.Parse(json.Root["pemenang"].ToString());
                List<PrData> prList = new List<PrData>();
                List<PurchaseOrder> poList = new List<PurchaseOrder>();
                List<String> poNumbers = new List<string>();
                List<String> subtask = new List<String>();
                List<String> vendors = new List<String>();
                List<String> prCode = new List<String>();

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


                PrEproc pr = new PrEproc();
                Dictionary<String, String> _criteria = new Dictionary<string, string>();
                _criteria.Add("pr_id", pr_id);
                System.Data.DataSet ds = pr.Get(_criteria);
                bool state = !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);
                if (!state)
                {
                    System.Text.StringBuilder sb2 = new System.Text.StringBuilder();
                    sb2.Clear();
                    sb2.Append("{");
                    sb2.Append(String.Format("status: 'error', result: 'Data PR tidak ditemukan!'"));
                    sb2.Append("}");
                    return Newtonsoft.Json.Linq.JObject.Parse(sb2.ToString()).Root.ToString();
                }


                pr = PrEproc.ParseFirst(pr.Get(pr_id));
                int i = 0;
                String[] vendorJson = new String[prList.Count];
                List<String[]> keys = new List<string[]>();
                foreach (PrData item in prList)
                {
                    PurchaseOrder po = new PurchaseOrder();
                    List<String[]> criteria = new List<string[]>();
                    PrVendor vendor = new PrVendor();
                    vendor = PrVendor.ParseFirst(vendor.Get(item.VendorId.ToString()));
                    vendorJson[i] = vendor.Json;
                    po.Vendor = vendor;

                    po.Pr = pr;

                    PrSubTask subtaskItem = new PrSubTask();
                    subtaskItem = PrSubTask.ParseFirst(subtaskItem.Get(item.SubtaskId.ToString()));
                    po.SubTask = subtaskItem;

                    foreach (int val in item.PrLines)
                    {
                        PrLineEproc prl = new PrLineEproc();
                        prl = PrLineEproc.ParseFirst(prl.Get(val.ToString()));
                        po.AddLineItem(prl);
                    }

                    poList.Add(po);
                    poNumbers.Add(String.Format("{0}/{1}/{2}/{3}", 2015, pr_id, item.PrLines.Count(), new Random().Next(1000) + 2000));

                    i++;
                }


                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                sb.Append("[");
                for (int it = 0; it < poList.Count; it++)
                {
                    sb.Append("{");
                    sb.Append(String.Format("po_number: '{0}', revision: {1}, subpekerjaan_id: {2}, vendor: '{3}'", poNumbers[it], 0, poList[it].SubTask.Id, poList[it].Vendor.AxId));
                    sb.Append("},");
                }
                if (poList.Count > 0)
                    sb.Remove(sb.Length - 1, 1);

                sb.Append("]");

                String poData = sb.ToString();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("pr: '{0}', agent: '{1}', department: '{2}', pr_site: '{3}', po: {4}", pr.Code, agent, department, site, poData));
                sb.Append("}");

                String result = sb.ToString();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("status: 'ok', result: {0}", result));
                sb.Append("}");
                return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();

                /**
                int prStatusApproval = GetPrStatus(pr_id);
                if (prStatusApproval == 0)
                {
                    System.Text.StringBuilder sb = new System.Text.StringBuilder();
                    sb.Clear();
                    sb.Append("{");
                    sb.Append(String.Format("status: 'error', result: 'Pr not approved!'"));
                    sb.Append("}");
                    return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
                }
                else if (prStatusApproval < 0)
                {
                    System.Text.StringBuilder sb = new System.Text.StringBuilder();
                    sb.Clear();
                    sb.Append("{");
                    sb.Append(String.Format("status: 'error', result: 'Pr not found!'"));
                    sb.Append("}");
                    return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
                }
                 * **/





            }
            catch (Exception ex)
            {
                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("status: 'error', result: '{0}'", ex.Message));
                sb.Append("}");
                return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
            }
        }


        [WebMethod]
        public String CreatePO(String jsonParameters)
        {
            String response = String.Empty;
            try
            {
                var json = JObject.Parse(jsonParameters);
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
                
                int prStatusApproval = GetPrStatus(pr_id);
                if (prStatusApproval == 0)
                {
                    System.Text.StringBuilder sb = new System.Text.StringBuilder();
                    sb.Clear();
                    sb.Append("{");
                    sb.Append(String.Format("status: 'error', result: 'Pr not approved in Ax!'"));
                    sb.Append("}");
                    return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
                }
                else if(prStatusApproval < 0)
                {
                    System.Text.StringBuilder sb = new System.Text.StringBuilder();
                    sb.Clear();
                    sb.Append("{");
                    sb.Append(String.Format("status: 'error', result: 'Pr not found in Ax!'"));
                    sb.Append("}");
                    return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
                }

                ExternalServices.MaximoPOService service = new ExternalServices.MaximoPOService();
                //response = service.CreatePO(Convert.ToInt32(pr_id), prList.ToArray(), site, department, agent);

                // Test for maximo
                response = service.CreatePO(Convert.ToInt32(pr_id), prList.ToArray(), site, department, agent);

                return response;
            }
            catch (Exception ex)
            {
                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("status: 'error', result: '{0}'", ex.Message));
                sb.Append("}");
                return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
            }

        }


        [WebMethod]
        public String DownloadDocument(String targetUrl) 
        {
            String directPath = String.Empty;
            try
            {
                String filename = targetUrl.Substring(targetUrl.LastIndexOf('/') + 1);
                WebClient client = new WebClient();
                String rootDirectory = HostingEnvironment.ApplicationPhysicalPath;
                client.DownloadFile(targetUrl, rootDirectory + "\\files\\" + filename);
                String localPath = HttpContext.Current.Request.Url.Scheme + "://" + HttpContext.Current.Request.Url.Authority + HttpContext.Current.Request.ApplicationPath.TrimEnd('/') + "/files/" + filename;
                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("status: 'ok', result: '{0}'", localPath));
                sb.Append("}");
                return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
            }
            catch (Exception ex)
            {
                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("status: 'error', result: '{0}'", ex.Message));
                sb.Append("}");
                return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
            }
        }
    }
}