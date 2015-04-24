using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml;
using System.Xml.Linq;

namespace ServiceUtils.Configuration
{
    public class ApplicationSetting
    {
        private static ApplicationSetting instance = new ApplicationSetting();
        String AppConfigPath = Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments) + "\\RightFax\\setting.xml";



        // Db Connection
        private Database.DbAuthentication auth;

        // Fax Users 
        private List<Service.Domain.FaxAuthentication> faxUsers;

        private ApplicationSetting()
        {
            if (!System.IO.File.Exists(AppConfigPath))
            {
                if (!System.IO.Directory.Exists(Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments) + "\\RightFax\\"))
                    System.IO.Directory.CreateDirectory(Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments) + "\\RightFax\\");

                System.IO.File.Copy("setting.xml", AppConfigPath, true);
            }
            ConfigurationSetting.Instance.MapValues(AppConfigPath);
            if (!System.IO.File.Exists(ConfigurationSetting.Instance.FaxUserPath))
                System.IO.File.Copy("faxconfig.xml", ConfigurationSetting.Instance.FaxUserPath);
        }

        public void LoadDbAuthentication()
        {
            try
            {
                if (!System.IO.File.Exists(ConfigurationSetting.Instance.DbConfigPath))
                {
                    Database.DbConfigForm form = new Database.DbConfigForm();
                    form.ShowDialog();
                }
                Dictionary<String, String> dbAuth = ConfigurationSetting.Instance.LoadConfiguration(ConfigurationSetting.Instance.DbConfigPath);
                auth = new Database.DbAuthentication(
                    Security.EncryptionProvider.Decrypt(dbAuth[Database.DbAuthentication.HostElement]),
                    Security.EncryptionProvider.Decrypt(dbAuth[Database.DbAuthentication.UsernameElement]),
                    Security.EncryptionProvider.Decrypt(dbAuth[Database.DbAuthentication.PasswordElement]),
                    Security.EncryptionProvider.Decrypt(dbAuth[Database.DbAuthentication.DatabaseElement]),
                    Convert.ToInt16(Security.EncryptionProvider.Decrypt(dbAuth[Database.DbAuthentication.PortElement])),
                    Database.DbProvider.PostgreSQL);
                if (!Database.ConnectionManager.Instance.OpenConnection(auth))
                {
                    Console.WriteLine("Connection to database failed!");
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
            finally
            {
                Database.ConnectionManager.Instance.CloseConnection();
            }

        }

        public void SetupApplicationDirectories()
        {
            try
            {
                if (!System.IO.Directory.Exists(ConfigurationSetting.Instance.LocalFolderPath))
                {
                    System.IO.Directory.CreateDirectory(ConfigurationSetting.Instance.LocalFolderPath);
                }
                if (!System.IO.Directory.Exists(ConfigurationSetting.Instance.RemoteFolderPath))
                {
                    System.IO.Directory.CreateDirectory(ConfigurationSetting.Instance.RemoteFolderPath);
                }

                Console.WriteLine("All directories created!");

            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }

        public void LoadFaxUsers()
        {
            faxUsers = new List<Service.Domain.FaxAuthentication>();

            XDocument doc = XDocument.Load(ConfigurationSetting.Instance.FaxUserPath);
            //Console.WriteLine(doc.ToString());
            var users = doc.Root.Elements("User");
            foreach (var user in users)
            {
                Dictionary<String, String> propertyMap = new Dictionary<string, string>();
                var userAuth = user.Elements("Property").Select(x => new AppSetting
                {
                    Name = (string)x.Attribute(AppSetting.NameAttribute),
                    Value = (string)x.Attribute(AppSetting.ValueAttribute)
                }).ToList();
                foreach (var data in userAuth)
                {
                    propertyMap.Add(data.Name, data.Value);
                }
                faxUsers.Add(new Service.Domain.FaxAuthentication(
                    propertyMap[Service.Domain.FaxAuthentication.HostAttribute],
                    propertyMap[Service.Domain.FaxAuthentication.UsernameAttribute],
                    propertyMap[Service.Domain.FaxAuthentication.PasswordAttribute],
                    propertyMap[Service.Domain.FaxAuthentication.LogPathAttribute],
                    Convert.ToInt16(propertyMap[Service.Domain.FaxAuthentication.WaitTimeAttribute]),
                    Convert.ToInt16(propertyMap[Service.Domain.FaxAuthentication.DelayTimeAttribute])
                    ));
            }
        }

        public void Initialize()
        {
            ApplicationSetting.Instance.LoadDbAuthentication();
            ApplicationSetting.Instance.SetupApplicationDirectories();
            ApplicationSetting.Instance.LoadFaxUsers();
        }

        public Database.DbAuthentication AuthorizedDbUser
        {
            get { return auth; }
        }

        public List<Service.Domain.FaxAuthentication> FaxUsers
        {
            get { return faxUsers; }
        }

        public static ApplicationSetting Instance
        {
            get { return instance; }
        }
    }
}
