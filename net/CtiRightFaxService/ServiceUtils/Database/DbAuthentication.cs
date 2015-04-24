using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml;

namespace ServiceUtils.Database
{
    public sealed class DbAuthentication
    {
        private String host;
        private String username;
        private String password;
        private short port;
        private String dbName;
        private DbProvider provider;


        public DbAuthentication(String host, String username, String password, String dbName, short port, DbProvider provider)
        {
            this.host = host;
            this.username = username;
            this.password = password;
            this.dbName = dbName;
            this.provider = provider;
            this.port = port;
        }

        public void Save()
        {
            Dictionary<String, String> property = ToDictionary();
            try
            {
                Console.WriteLine(Configuration.ConfigurationSetting.Instance.DbConfigPath);
                using (XmlWriter writer = XmlWriter.Create(Configuration.ConfigurationSetting.Instance.DbConfigPath))
                {
                    writer.WriteStartDocument();
                    writer.WriteStartElement("DbConfig");
                    foreach (var p in property)
                    {
                        writer.WriteStartElement("Property");
                        writer.WriteAttributeString("name", p.Key);
                        writer.WriteAttributeString("value", p.Value);
                        writer.WriteEndElement();
                    }

                    writer.WriteEndElement();
                    writer.WriteEndDocument();
                }

                StringBuilder sb = new StringBuilder();
                XmlWriterSettings settings = new XmlWriterSettings
                {
                    Indent = true,
                    IndentChars = "  ",
                    NewLineChars = "\r\n",
                    NewLineHandling = NewLineHandling.Replace
                };
                XmlDocument doc = new XmlDocument();
                doc.Load(Configuration.ConfigurationSetting.Instance.DbConfigPath);
                using (XmlTextWriter writer = new XmlTextWriter(Configuration.ConfigurationSetting.Instance.DbConfigPath, null))
                {
                    writer.Formatting = Formatting.Indented;
                    doc.Save(writer);
                }
                Console.WriteLine(sb.ToString());

            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);

            }
        }

        public static String ProviderElement
        {
            get { return "provider"; }
        }

        public static String HostElement
        {
            get { return "host"; }
        }

        public static String UsernameElement
        {
            get { return "username"; }
        }

        public static String PasswordElement
        {
            get { return "password"; }
        }

        public static String PortElement
        {
            get { return "port"; }
        }

        public static String DatabaseElement
        {
            get { return "database"; }
        }

        public String Host
        {
            get { return host; }
        }

        public String Username
        {
            get { return username; }
        }

        public String Password
        {
            get { return password; }
        }

        public String DbName
        {
            get { return dbName; }
        }

        public int Port
        {
            get { return port; }
        }

        public DbProvider Provider
        {
            get { return provider; }
        }

        public String ConnectionString
        {
            get
            {
                return String.Format("Server={0};Port={1};User Id={2};Password={3};Database={4};", host, port, username, password, dbName);
            }
        }

        public Dictionary<String, String> ToDictionary()
        {
            Dictionary<String, String> definition = new Dictionary<string, string>();
            definition.Add(HostElement, Security.EncryptionProvider.Encrypt(host));
            definition.Add(PortElement, Security.EncryptionProvider.Encrypt(port.ToString()));
            definition.Add(UsernameElement, Security.EncryptionProvider.Encrypt(username));
            definition.Add(PasswordElement, Security.EncryptionProvider.Encrypt(password));
            definition.Add(DatabaseElement, Security.EncryptionProvider.Encrypt(dbName));

            return definition;
        }





    }
}
