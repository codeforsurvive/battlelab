using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ITPI.Net.Utils.Domain
{
    public sealed class Vendor : BaseModel
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
            BankAccountNumber
        }

        public Vendor()
            : base()
        {
            tableName = "tmp_rekanan";
            autoIncrement = true;
            IdColumn = Vendor.Columns.Id;
            
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "rekanan_id", "nama_perusahaan", "npwp", "alamat", "telepon", "fax", "email", "website", 
                "kodepos", "kota_id", "provinsi_id", "bank_account_name", "bank_account_no"
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
                return fields[columnsMap[Vendor.Columns.Name]].ToString();
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
                return fields[columnsMap[Vendor.Columns.NPWP]].ToString();
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
                return fields[columnsMap[Vendor.Columns.Address]].ToString();
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
                return fields[columnsMap[Vendor.Columns.Phone]].ToString();
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
                return fields[columnsMap[Vendor.Columns.Fax]].ToString();
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
                return fields[columnsMap[Vendor.Columns.Email]].ToString();
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
                return fields[columnsMap[Vendor.Columns.Website]].ToString();
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
                return fields[columnsMap[Vendor.Columns.PostalCode]].ToString();
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
                return fields[columnsMap[Vendor.Columns.BankAccount]].ToString();
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
                return fields[columnsMap[Vendor.Columns.BankAccountNumber]].ToString();
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
