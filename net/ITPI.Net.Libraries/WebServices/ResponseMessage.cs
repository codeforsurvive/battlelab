using System;
using System.Collections.Generic;
using System.Linq;
using System.Xml;
using System.Xml.Linq;
using System.Web;

namespace WebServices
{
    public class ResponseMessage
    {
        public enum ResponseType
        { 
            Success,
            Error,
            Warning
        }

        public static String GetResponseXml(ResponseType type, String message, Object data)
        {
            XElement xml = new XElement("response",
                new XElement("type", type.ToString()),
                new XElement("message", message),
                new XElement("data", data));

            return xml.ToString();
        }

        public static String GetResponseXml(Exception ex)
        {
            return ResponseMessage.GetResponseXml(ResponseType.Error, ex.Message, ex.StackTrace);
        }
    }
}