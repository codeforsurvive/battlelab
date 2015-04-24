using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Drawing;

namespace ServiceUtils.Service.Domain
{
    public class FaxObject
    {
        private String [] paths;
        private String xmlPath;
        private FaxProperty property;

        // Restrict constuctor call outside class
        private FaxObject()
        { 
        
        }

        public static FaxObject Create(String xmlPath, String [] faxPath)
        {
            try
            {
                FaxObject instance = new FaxObject();
                instance.Path = faxPath;
                instance.XmlPath = xmlPath;
                instance.Properties = new FaxProperty(xmlPath);


                return instance;
            }
            catch (Exception ex)
            {
                Console.WriteLine("Fax Object Exception: Params [XML: {0}, FAX:{1}]", xmlPath, faxPath);
                Console.WriteLine(ex.Message);
                Console.WriteLine(ex.StackTrace);
                throw;
            }
            
        }


        public String[] Path
        {
            private set { paths = value; }
            get { return paths; }
        }

        public String XmlPath
        {
            private set { xmlPath = value; }
            get { return xmlPath; }
        }


        public FaxProperty Properties
        {
            private set { property = value; }
            get { return property; }
        }
    }
}

