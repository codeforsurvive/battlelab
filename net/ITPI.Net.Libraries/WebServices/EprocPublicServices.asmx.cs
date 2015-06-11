using ITPI.Net.Utils.Domain;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using System.Net;
using System.Text;
using System.Web;
using System.Web.Services;
using System.Xml.Linq;

namespace WebServices
{
    /// <summary>
    /// Summary description for EprocPublicServices
    /// </summary>
    [WebService(Namespace = "http://localhost:8888/Services/EprocPublicServices.asmx/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class EprocPublicServices : System.Web.Services.WebService
    {

        [WebMethod]
        public string HelloWorld()
        {
            return "Hello World";
        }

        [WebMethod]
        public string GetPengumumanPengadaan(int start, int limit)
        {
            try
            {
                List<ViewPengumumanPengadaan> dataList = new ViewPengumumanPengadaan().Select(start, limit);
                WebClient client = new WebClient();
                String message = String.Empty;
                String baseUrl = ConfigurationManager.AppSettings["frontend_base"];
                StringBuilder sb = new StringBuilder("<query>");
                foreach (var data in dataList)
                {
                    XElement xml = new XElement("pengumuman_pengadaan",
                        new XElement("id", data.Id),
                        new XElement("judul", data.NamaPaket),
                        new XElement("url", String.Format("{0}/{1}", baseUrl, data.Id)));
                    sb.Append(xml.ToString());
                    
                }
                sb.Append("</query>");

                return ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Success, "Data query completed!", XElement.Parse(sb.ToString()));

            }
            catch (Exception ex)
            {
                return ResponseMessage.GetResponseXml(ex);
            }
        }

        [WebMethod]
        public String GetTotalPengumuman()
        {
            List<ViewPengumumanPengadaan> dataList = new ViewPengumumanPengadaan().Select();
            XElement xml = new XElement("total", dataList.Count);

            return ResponseMessage.GetResponseXml(ResponseMessage.ResponseType.Success, "Data query completed!", xml);
        }
    }
}
