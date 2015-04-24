using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class PurchaseRequisition : BaseModel
    {
        public enum Columns
        {
            Id,
            Code,
            Name,
            Confirmed,
            Created
        };

        public PurchaseRequisition()
            : base()
        {
            autoIncrement = true;
            tableName = "tmp_purchase_requisition";
            IdColumn = PurchaseRequisition.Columns.Id;
            Id = 0;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { "pr_id", "pr_kode", "pr_nama", "confirmed", "sudah_dibuat_panitia" };
            int count = 0;
            foreach (PurchaseRequisition.Columns col in Enum.GetValues(typeof(PurchaseRequisition.Columns)))
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

        public static List<PurchaseRequisition> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new PurchaseRequisition
                {
                    Id = Convert.ToInt32((String)x.Element("pr_id") ?? "0"),
                    Code = (String)x.Element("pr_kode") ?? "0",
                    Name = (String)x.Element("pr_name") ?? String.Empty,
                    Confirmed = ((String)x.Element("confirmed") ?? "0") == "true",
                    Created = ((String)x.Element("sudah_dibuat_panitia") ?? "0") == "true"
                }).ToList();
            return result;

        }

        public static PurchaseRequisition ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new PurchaseRequisition() : result[0];
        }

        public static List<PurchaseRequisition> ParseDataSet(System.Data.DataSet ds)
        {
            return PurchaseRequisition.ParseXml(ds.GetXml(), "Table");
        }

        public static PurchaseRequisition ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new PurchaseRequisition() : result[0];
        }



        public int Id
        {
            set
            {
                fields[columnsMap[PurchaseRequisition.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[PurchaseRequisition.Columns.Id]];
            }

        }

        public String Code
        {
            set
            {
                fields[columnsMap[PurchaseRequisition.Columns.Code]] = value;
            }
            get
            {
                return fields[columnsMap[PurchaseRequisition.Columns.Code]].ToString();
            }
        }

        public String Name
        {
            set
            {
                fields[columnsMap[PurchaseRequisition.Columns.Name]] = value;
            }
            get
            {
                return fields[columnsMap[PurchaseRequisition.Columns.Name]].ToString();
            }
        }


        public bool Confirmed
        {
            set
            {
                fields[columnsMap[PurchaseRequisition.Columns.Confirmed]] = Convert.ToInt32(value);
            }
            get
            {
                return (int)fields[columnsMap[PurchaseRequisition.Columns.Confirmed]] == 1;
            }
        }

        public bool Created
        {
            set
            {
                fields[columnsMap[PurchaseRequisition.Columns.Created]] = Convert.ToInt32(value);
            }
            get
            {
                return (int)fields[columnsMap[PurchaseRequisition.Columns.Created]] == 1;
            }
        }


        public override bool Equals(object obj)
        {
            return this.Id == ((PurchaseRequisition)obj).Id;
        }

        public override int GetHashCode()
        {
            return base.GetHashCode();
        }



    }
}
