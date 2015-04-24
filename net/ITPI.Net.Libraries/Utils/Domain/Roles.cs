using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class Roles : BaseModel
    {
        public enum Columns
        {
            Id,
            Authority,
            Active,
            Type
        };

        public Roles()
            : base()
        {
            tableName = "tmp_roles";
            autoIncrement = true;
            IdColumn = Columns.Id;
            Id = 0;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { "role_id", "authority", "is_active", "jenis_role" };
            int count = 0;
            foreach (Roles.Columns col in Enum.GetValues(typeof(Roles.Columns)))
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
            // Do Nothing
        }

        public static List<Roles> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new Roles
                {
                    Id = Convert.ToInt32((String)x.Element("role_id") ?? "0"),
                    Authority = (String)x.Element("authority") ?? String.Empty,
                    Active = ((String)x.Element("is_active") ?? "0") == "true",
                    Type = (String)x.Element("jenis_role") ?? String.Empty
                }).ToList();
            return result;

        }

        public static Roles ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new Roles() : result[0];
        }

        public static List<Roles> ParseDataSet(System.Data.DataSet ds)
        {
            return Roles.ParseXml(ds.GetXml(), "Table");
        }

        public static Roles ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new Roles() : result[0];
        }



        public int Id
        {
            set
            {
                fields[columnsMap[Roles.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Roles.Columns.Id]];
            }

        }

        public String Authority
        {
            set
            {
                fields[columnsMap[Roles.Columns.Authority]] = value;
            }
            get
            {
                return fields[columnsMap[Roles.Columns.Authority]].ToString();
            }
        }

        public bool Active
        {
            set
            {
                fields[columnsMap[Roles.Columns.Active]] = Convert.ToInt32(value);
            }
            get
            {
                return (int)fields[columnsMap[Roles.Columns.Active]] == 1;
            }
        }

        public String Type
        {
            set
            {
                fields[columnsMap[Roles.Columns.Type]] = value;
            }
            get
            {
                return fields[columnsMap[Roles.Columns.Type]].ToString();
            }
        }

        public override bool Equals(object obj)
        {
            return this.Id == ((Roles)obj).Id;
        }

        public override int GetHashCode()
        {
            return base.GetHashCode();
        }


    }
}
