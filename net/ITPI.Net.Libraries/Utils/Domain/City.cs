using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class City : BaseModel
    {
        public enum Columns
        {
            Id,
            Name,
            Province
        };

        public City()
            : base()
        {
            autoIncrement = true;
            IdColumn = City.Columns.Id;
            tableName = "tmp_mst_kota";
            Id = 0;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { "kota_id", "kota_nama", "provinsi_id"};
            int count = 0;
            foreach (City.Columns col in Enum.GetValues(typeof(City.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            this.Province = (this.Province == null) ? new Province() : this.Province;
        }

        protected override void PrepareSave()
        {
            this.Province.Save();
        }

        public static List<City> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new City
                {
                    Id = Convert.ToInt32((String)x.Element("kota_id") ?? "0"),
                    Province = Province.ParseFirst(new Province().Get((String)x.Element("provinsi_id"))),
                    Name = (String)x.Element("kota_nama") ?? String.Empty
                }).ToList();
            return result;

        }

        public static City ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new City() : result[0];
        }

        public static List<City> ParseDataSet(System.Data.DataSet ds)
        {
            return City.ParseXml(ds.GetXml(), "Table");
        }

        public static City ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new City() : result[0];
        }

        public override bool Exist()
        {
            Dictionary<String, String> criteria = new Dictionary<string, string>();
            criteria.Add("kota_nama", Name);
            System.Data.DataSet ds = Get(criteria);
            bool state = !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);
            if (state)
            {
                City temp = City.ParseFirst(ds);
                Id = temp.Id;
                Name = temp.Name;
                Province = (Province.Id == 0) ? temp.Province : Province;
            }
            return state;
        }



        public int Id
        {
            set
            {
                fields[columnsMap[City.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[City.Columns.Id]];
            }

        }

        public Province Province
        {
            set
            {
                fields[columnsMap[City.Columns.Province]] = value;
            }
            get
            {
                return (Province)fields[columnsMap[City.Columns.Province]];
            }
        }

        public String Name
        {
            set
            {
                fields[columnsMap[City.Columns.Name]] = value;
            }
            get
            {
                return (fields[columnsMap[City.Columns.Name]] == null) ? String.Empty : fields[columnsMap[City.Columns.Name]].ToString();
            }
        }


        public override bool Equals(object obj)
        {
            return this.Id == ((City)obj).Id;
        }

        public override int GetHashCode()
        {
            return base.GetHashCode();
        }
    }
}
