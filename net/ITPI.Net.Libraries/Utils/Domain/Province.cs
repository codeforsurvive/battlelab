using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class Province : BaseModel
    {
        public enum Columns
        {
            Id,
            Name
        };

        public Province()
            : base()
        {
            autoIncrement = true;
            tableName = "mst_provinsi";
            IdColumn = Province.Columns.Id;
            Id = 0;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { "provinsi_id", "provinsi_nama"};
            int count = 0;
            foreach (Province.Columns col in Enum.GetValues(typeof(Province.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            // Do nothing
        }

        protected override void PrepareSave()
        {
            // Do nothing
        }

        public static List<Province> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new Province
                {
                    Id = Convert.ToInt32((String)x.Element("provinsi_id") ?? "0"),
                    Name = (String)x.Element("provinsi_nama") ?? String.Empty,
                }).ToList();
            return result;

        }

        public static Province ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new Province() : result[0];
        }

        public static List<Province> ParseDataSet(System.Data.DataSet ds)
        {
            return Province.ParseXml(ds.GetXml(), "Table");
        }

        public static Province ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new Province() : result[0];
        }



        public int Id
        {
            set
            {
                fields[columnsMap[Province.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Province.Columns.Id]];
            }

        }

        public String Name
        {
            set
            {
                fields[columnsMap[Province.Columns.Name]] = value;
            }
            get
            {
                return fields[columnsMap[Province.Columns.Name]].ToString();
            }
        }


        public override bool Equals(object obj)
        {
            return this.Id == ((Province)obj).Id;
        }

        public override int GetHashCode()
        {
            return base.GetHashCode();
        }
    }
}
