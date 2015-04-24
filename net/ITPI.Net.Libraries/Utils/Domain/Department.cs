using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public sealed class Department : BaseModel
    {
        public enum Columns
        {
            Id,
            Name,
            Active,
            Description
        };


        public Department()
            : base()
        {

            tableName = "tmp_departemen2";
            autoIncrement = true;
            IdColumn = Columns.Id;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { "departemen_id", "departemen_nama", "flag_active", "keterangan" };
            int count = 0;
            foreach (Department.Columns col in Enum.GetValues(typeof(Department.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            // Do Nothing
        }

        protected override void PrepareSave()
        {
            // Do nothing
        }

        public static List<Department> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new Department
                {
                    Id = Convert.ToInt32((String)x.Element("departemen_id") ?? "0"),
                    Name = (String)x.Element("departemen_nama") ?? String.Empty,
                    Active = ((String)x.Element("flag_active") ?? "0") == "true",
                    Description = (String)x.Element("keterangan") ?? String.Empty
                }).ToList();
            return result;

        }

        public static Department ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new Department() : result[0];
        }

        public static List<Department> ParseDataSet(System.Data.DataSet ds)
        {
            return Department.ParseXml(ds.GetXml(), "Table");
        }

        public static Department ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new Department() : result[0];
        }

        public int Id
        {
            set
            {
                fields[columnsMap[Department.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Department.Columns.Id]];
            }

        }

        public String Name
        {
            set
            {
                fields[columnsMap[Department.Columns.Name]] = value;
            }
            get
            {
                return fields[columnsMap[Department.Columns.Name]].ToString();
            }
        }

        public bool Active
        {
            set
            {
                fields[columnsMap[Department.Columns.Active]] = Convert.ToInt32(value);
            }
            get
            {
                return (int)fields[columnsMap[Department.Columns.Active]] == 1;
            }
        }

        public String Description
        {
            set
            {
                fields[columnsMap[Department.Columns.Description]] = value;
            }
            get
            {
                return fields[columnsMap[Department.Columns.Description]].ToString();
            }
        }

        public override bool Equals(object obj)
        {
            return this.Id == ((Department)obj).Id;
        }

        public override int GetHashCode()
        {
            return base.GetHashCode();
        }
    }
}
