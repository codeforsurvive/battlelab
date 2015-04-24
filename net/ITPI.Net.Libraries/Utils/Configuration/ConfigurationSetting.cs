using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Configuration
{
    public sealed class ConfigurationSetting
    {
        private String db;
        private String user;
        private String log;
        private Database.DbAuthentication auth;
       
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
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
                return null;
            }
        }


        public void MapValues(String xmlFile)
        {
            //Console.WriteLine(xmlFile);
            Dictionary<String, String> result = LoadConfiguration(xmlFile);
            this.db = result[DbConfig];
            this.user = result[UserSetting];
            this.log = result[LogFile];
            
            if (!System.IO.File.Exists(this.db))
            {
                System.IO.File.Copy("dbconfig.xml", this.db);
            }

            result = LoadConfiguration(this.db);
            auth = new Database.DbAuthentication(result[Database.DbAuthentication.HostElement],
                result[Database.DbAuthentication.UsernameElement],
                result[Database.DbAuthentication.PasswordElement],
                result[Database.DbAuthentication.DatabaseElement],
                Convert.ToInt16(result[Database.DbAuthentication.PortElement]), 
                (DbProvider)Enum.Parse(typeof(DbProvider), result[Database.DbAuthentication.ProviderElement]));
        }

        public Database.DbAuthentication Authenticaton
        {
            get
            {
                return auth;
            }
        }

        public String DbConfigPath
        {
            get { return db; }
        }

        public String UserSettingPath
        {
            get { return user; }
        }

        public String LogFilePath
        {
            get { return log; }
        }

        public static String DbConfig
        {
            get { return "dbconfig"; }
        }

        public static String UserSetting
        {
            get { return "user"; }
        }

        public static String LogFile
        {
            get { return "log"; }
        }

        
        public static ConfigurationSetting Instance
        {
            get { return instance; }
        }

    }
}
