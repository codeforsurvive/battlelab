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
            Description,
            AxId
        };


        public Department()
            : base()
        {

            tableName = "tmp_departemen2";
            autoIncrement = true;
            IdColumn = Columns.Id;
            Id = 0;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { "departemen_id", "departemen_nama", "flag_active", "keterangan", "departemen_ax_id" };
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

        public override bool Exist()
        {
            Dictionary<String, String> criteria = new Dictionary<string, string>();
            criteria.Add("departemen_ax_id", AxId);
            System.Data.DataSet ds = Get(criteria);
            bool state = !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);
            if (state)
            {
                Department temp = Department.ParseFirst(ds);
                Id = temp.Id;
                Name = String.IsNullOrEmpty(Name) ? temp.Name : Name;
                Description = String.IsNullOrEmpty(Description) ? temp.Description : Description;
                AxId = String.IsNullOrEmpty(AxId) ? temp.AxId : AxId;
            }
            return state;
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
                    Description = (String)x.Element("keterangan") ?? String.Empty,
                    AxId = (String)x.Element("departemen_ax_id") ?? String.Empty
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
                return (fields[columnsMap[Department.Columns.Name]] == null) ? String.Empty : fields[columnsMap[Department.Columns.Name]].ToString();
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
                return (fields[columnsMap[Department.Columns.Description]] == null) ? String.Empty : fields[columnsMap[Department.Columns.Description]].ToString();
            }
        }

        public String AxId
        {
            set
            {
                fields[columnsMap[Department.Columns.AxId]] = value;
            }
            get
            {
                return (fields[columnsMap[Department.Columns.AxId]] == null) ? String.Empty :  fields[columnsMap[Department.Columns.AxId]].ToString();
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
