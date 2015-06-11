using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class Vendor : BaseModel
    {
        public enum Columns
        { 
            Id,
            Name,
            NPWP,
            Address,
            Phone,
            Fax,
            Email,
            Website,
            PostalCode,
            City,
            Province,
            BankAccount, 
            BankAccountNumber,
            AxId,
            OnHold
        }

        public Vendor()
            : base()
        {
            tableName = "tmp_rekanan";
            autoIncrement = true;
            IdColumn = Vendor.Columns.Id;
            Id = 0;
            OnHold = false;
            
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "rekanan_id", "nama_perusahaan", "npwp", "alamat", "telepon", "fax", "email", "website", 
                "kodepos", "kota_id", "provinsi_id", "bank_account_name", "bank_account_no", "kode_rekanan", "flag_blacklist"
            };

            int count = 0;
            foreach (Vendor.Columns col in Enum.GetValues(typeof(Vendor.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            this.Province = (this.Province == null) ? new Province() : this.Province;
            this.City = (this.City == null) ? new City() : this.City;
        }

        protected override void PrepareSave()
        {
            this.Province.Save();
            this.City.Save();

        }

        public override bool Exist()
        {
            Dictionary<String, String> criteria = new Dictionary<string, string>();
            criteria.Add("kode_rekanan", AxId);
            System.Data.DataSet ds = Get(criteria);
            bool state =  !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);
            if (state)
            {
                Vendor temp = Vendor.ParseFirst(ds);
                Id = temp.Id;
                Name = String.IsNullOrEmpty(Name) ? temp.Name : Name;
                NPWP = String.IsNullOrEmpty(NPWP) ? temp.NPWP : NPWP;
                Address = String.IsNullOrEmpty(Address) ? temp.Address : Address;
                Fax = String.IsNullOrEmpty(Fax) ? temp.Fax : Fax;
                Phone = String.IsNullOrEmpty(Phone) ? temp.Phone : Phone;
                Email = String.IsNullOrEmpty(Email) ? temp.Email : Email;
                Website = String.IsNullOrEmpty(Website) ? temp.Website : Website;
                PostalCode = String.IsNullOrEmpty(PostalCode) ? temp.PostalCode : PostalCode;
                City = (City.Id == 0) ? temp.City : City;
                OnHold = (!OnHold) ? temp.OnHold : OnHold;
                //Active = (!Active) ? emp.Active : Active;
                Province = (Province.Id == 0) ? temp.Province : Province;
                BankAccountName = String.IsNullOrEmpty(BankAccountName) ? temp.BankAccountName : BankAccountName;
                BankAccountNumber = String.IsNullOrEmpty(BankAccountNumber) ? temp.BankAccountNumber : BankAccountNumber;
                AxId = String.IsNullOrEmpty(AxId) ? temp.AxId : AxId;
            }

            return state;
        }

        public static List<Vendor> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);
            var result = (
                from x in root.Elements(rootElement)
                select new Vendor
                {
                    Id = Convert.ToInt32((String)x.Element("rekanan_id") ?? "0"),
                    Name = (String)x.Element("nama_perusahaan") ?? String.Empty,
                    NPWP = (String)x.Element("npwp") ?? String.Empty,
                    Address = (String)x.Element("alamat") ?? String.Empty,
                    Phone = (String)x.Element("telepon") ?? String.Empty,
                    Fax = (String)x.Element("fax") ?? String.Empty,
                    Email = (String)x.Element("email") ?? String.Empty,
                    Website = (String)x.Element("website") ?? String.Empty,
                    PostalCode = (String)x.Element("kodepos") ?? String.Empty,
                    City = City.ParseFirst(new City().Get((String)x.Element("kota_id"))),
                    Province = Province.ParseFirst(new Province().Get((String)x.Element("provinsi_id"))),
                    BankAccountName = (String)x.Element("bank_account_name") ?? String.Empty,
                    BankAccountNumber = (String)x.Element("bank_account_no") ?? String.Empty,
                    AxId = (String)x.Element("rekanan_kode") ?? String.Empty,
                    OnHold = ((String)x.Element("flag_blacklist") ?? "0") == "true"
                    
                }).ToList();
            return result;

        }

        public static Vendor ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new Vendor() : result[0];
        }

        public static List<Vendor> ParseDataSet(System.Data.DataSet ds)
        {
            return Vendor.ParseXml(ds.GetXml(), "Table");
        }

        public static Vendor ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new Vendor() : result[0];
        }

        public int Id
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Vendor.Columns.Id]];
            }

        }

        public String Name
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Name]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.Name]] == null) ?  String.Empty : fields[columnsMap[Vendor.Columns.Name]].ToString();
            }
        }

        public String NPWP
        {
            set
            {
                fields[columnsMap[Vendor.Columns.NPWP]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.NPWP]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.NPWP]].ToString();
            }
        }

        public String Address
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Address]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.Address]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.Address]].ToString(); 
            }
        }

        public String Phone
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Phone]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.Phone]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.Phone]].ToString(); 
            }
        }

        public String Fax
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Fax]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.Fax]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.Fax]].ToString(); 
            }
        }

        public String Email
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Email]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.Email]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.Email]].ToString(); 
            }
        }

        public String Website
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Website]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.Website]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.Website]].ToString(); 
            }
        }

        public String PostalCode
        {
            set
            {
                fields[columnsMap[Vendor.Columns.PostalCode]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.PostalCode]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.PostalCode]].ToString(); 
            }
        }


        public City City
        {
            set
            {
                fields[columnsMap[Vendor.Columns.City]] = value;
            }
            get
            {
                return (City)fields[columnsMap[Vendor.Columns.City]];
            }
        }

        public Province Province
        {
            set
            {
                fields[columnsMap[Vendor.Columns.Province]] = value;
            }
            get
            {
                return (Province)fields[columnsMap[Vendor.Columns.Province]];
            }
        }

        public String BankAccountName
        {
            set
            {
                fields[columnsMap[Vendor.Columns.BankAccount]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.BankAccount]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.BankAccount]].ToString(); 
            }
        }

        public String BankAccountNumber
        {
            set
            {
                fields[columnsMap[Vendor.Columns.BankAccountNumber]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.BankAccountNumber]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.BankAccountNumber]].ToString(); 
            }
        }

        public String AxId
        {
            set
            {
                fields[columnsMap[Vendor.Columns.AxId]] = value;
            }
            get
            {
                return (fields[columnsMap[Vendor.Columns.AxId]] == null) ? String.Empty : fields[columnsMap[Vendor.Columns.AxId]].ToString(); 
            }
        }

        public bool OnHold
        {
            set
            {
                fields[columnsMap[Vendor.Columns.OnHold]] = (value) ? 1 : 0;
            }
            get
            {
                return ((int)fields[columnsMap[Vendor.Columns.OnHold]]) == 1;
            }
        }


        public override bool Equals(object obj)
        {
            return this.Id == ((Vendor)obj).Id;
        }

        public override int GetHashCode()
        {
            return base.GetHashCode();
        }


    }
}
