using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml;
using System.Xml.Linq;

namespace ServiceUtils.Configuration
{
    public class ConfigurationSetting
    {
        private String db;
        private String local;
        private String remote;
        private String remoteUrl;
        private String fax;

        private static ConfigurationSetting instance = new ConfigurationSetting();

        private ConfigurationSetting()
        {

        }

        public Dictionary<String, String> LoadConfiguration(String xmlFile)
        {
            try
            {
                XDocument doc = XDocument.Load(xmlFile);
                var config = doc.Root.Elements("Property").Select(x => new AppSetting
                                  {
                                      Name = (string)x.Attribute(AppSetting.NameAttribute),
                                      Value = (string)x.Attribute(AppSetting.ValueAttribute)
                                  }).ToList();

                Dictionary<String, String> result = new Dictionary<string, string>();
                foreach (var data in config)
                {
                    result.Add(data.Name, data.Value);
                }

                return result;
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
                return null;
            }

        }


        public void MapValues(String xmlFile)
        {
            Dictionary<String, String> result = LoadConfiguration(xmlFile);
            this.db = result[DbConfig];
            this.local = result[LocalFolder];
            this.remote = result[RemoteFolder];
            this.fax = result[FaxConfig];
            this.remoteUrl = result[RemoteUrl];
        }

        public String DbConfigPath
        {
            get { return db; }
        }

        public String LocalFolderPath
        {
            get { return local; }
        }

        public String RemoteFolderPath
        {
            get { return remote; }
        }

        public String RemoteUrlPath
        {
            get { return remoteUrl; }
        }

        public String FaxUserPath
        {
            get { return fax; }
        }

        public static String DbConfig
        {
            get { return "dbconfig"; }
        }

        public static String LocalFolder
        {
            get { return "local-folder"; }
        }

        public static String RemoteFolder
        {
            get { return "remote-folder"; }
        }

        public static String RemoteUrl
        {
            get { return "remote-url"; }
        }


        public static String FaxConfig
        {
            get { return "faxconfig"; }
        }

        public static ConfigurationSetting Instance
        {
            get { return instance; }
        }

    }
}
