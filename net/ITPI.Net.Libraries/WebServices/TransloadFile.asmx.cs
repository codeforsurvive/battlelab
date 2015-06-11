using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Net;
using System.Web.Hosting;

namespace WebServices
{
    /// <summary>
    /// Summary description for TransloadFile
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class TransloadFile : System.Web.Services.WebService
    {

        [WebMethod]
        public string Download(String targetUrl)
        {
            String directPath = String.Empty;
            try
            {
                String filename = targetUrl.Substring(targetUrl.LastIndexOf('/') + 1);
                WebClient client = new WebClient();
                String rootDirectory = HostingEnvironment.ApplicationPhysicalPath;
                client.DownloadFile(targetUrl, rootDirectory + "\\files\\" + filename);

                return HttpContext.Current.Request.Url.Scheme + "://" + HttpContext.Current.Request.Url.Authority + HttpContext.Current.Request.ApplicationPath.TrimEnd('/') + "/" + "/files/" + filename;
            }
            catch (Exception ex)
            {
                return ResponseMessage.GetResponseXml(ex);
            }

            return directPath;
        }

    }
}
