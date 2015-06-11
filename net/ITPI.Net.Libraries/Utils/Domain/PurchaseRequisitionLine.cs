using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class PurchaseRequisitionLine : BaseModel
    {
        public enum Columns
        {
            Id,
            Number,
            Description,
            Quantity,
            Unit,
            UnitCost,
            LineCost,
            Tax,
            Flag,
            PurchaseRequisition,
            Line,
            Site
        };

        public PurchaseRequisitionLine()
            : base()
        {
            autoIncrement = true;
            tableName = "tmp_purchase_requisition_line";
            IdColumn = PurchaseRequisitionLine.Columns.Id;
            Id = 0;
            Active = true;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "prl_id", "prl_nomor", "prl_deskripsi", "prl_quantity", "prl_order_unit","prl_unit_cost",
                "prl_line_cost", "prl_tax", "prl_flag", "pr_id", "prl_line", "site"
            };
            int count = 0;
            foreach (PurchaseRequisitionLine.Columns col in Enum.GetValues(typeof(PurchaseRequisitionLine.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            this.PR = (this.PR == null) ? new PurchaseRequisition() : this.PR;
        }

        protected override void PrepareSave()
        {
            this.PR.Save();
        }

        public static List<PurchaseRequisitionLine> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);
            String[] columns = new String[] { 
                "prl_id", "prl_nomor", "prl_deskripsi", "prl_quantity", "prl_order_unit","prl_unit_cost",
                "prl_line_cost", "prl_tax", "prl_flag", "pr_id", "prl_line", "site"
            };

            var result = (
                from x in root.Elements(rootElement)
                select new PurchaseRequisitionLine
                {
                    Id = Convert.ToInt32((String)x.Element("pr_id") ?? "0"),
                    Number = Convert.ToInt32((String)x.Element("prl_nomor") ?? "0"),
                    Description = (String)x.Element("prl_deskripsi") ?? String.Empty,
                    Quantity = Convert.ToInt32((String)x.Element("prl_quantity") ?? "0"),
                    Unit = (String)x.Element("prl_order_unit") ?? "0",
                    UnitCost = Convert.ToDouble((String)x.Element("prl_unit_cost") ?? "0"),
                    LineCost = Convert.ToDouble((String)x.Element("prl_line_cost") ?? "0"),
                    Tax = Convert.ToDouble((String)x.Element("prl_tax") ?? "0"),
                    Active = ((String)x.Element("prl_order_unit") ?? "0") == "1",
                    PR = PurchaseRequisition.ParseFirst(new PurchaseRequisition().Get((String)x.Element("pr_id"))),
                    LineNumber = Convert.ToInt32((String)x.Element("prl_line") ?? "0"),
                    Site = (String)x.Element("site") ?? String.Empty
                }).ToList();
            return result;

        }

        public static PurchaseRequisitionLine ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new PurchaseRequisitionLine() : result[0];
        }

        public static List<PurchaseRequisitionLine> ParseDataSet(System.Data.DataSet ds)
        {
            return PurchaseRequisitionLine.ParseXml(ds.GetXml(), "Table");
        }

        public static PurchaseRequisitionLine ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new PurchaseRequisitionLine() : result[0];
        }




        public override bool Exist()
        {
            Dictionary<String, String> criteria = new Dictionary<string, string>();
            criteria.Add("prl_line", Number.ToString());
            criteria.Add("pr_id", PR.Id.ToString());
            System.Data.DataSet ds = Get(criteria);
            bool state = !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);

            if (state)
            {
                PurchaseRequisitionLine temp = PurchaseRequisitionLine.ParseFirst(ds);
                Id = temp.Id;
                Number = (Number == 0) ? temp.Number : Number;
                Description = String.IsNullOrEmpty(Description) ? temp.Description : Description;
                Quantity = (Quantity == 0) ? temp.Quantity : Quantity;
                Unit = String.IsNullOrEmpty(Unit) ? temp.Unit : Unit;
                UnitCost = (UnitCost - Double.Epsilon <= 0) ? temp.UnitCost : UnitCost;
                LineCost = (LineCost - Double.Epsilon <= 0) ? temp.LineCost : LineCost;
                Tax = (Tax - Double.Epsilon <= 0) ? temp.Tax : Tax;
                PR = (PR.Id == 0) ? temp.PR : PR;
                LineNumber = (LineNumber == 0) ? temp.LineNumber : LineNumber;
                Site = String.IsNullOrEmpty(Site) ? temp.Site : Site;
            }

            return state;
        }



        public override object Select()
        {
            String xml = Get().GetXml();
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements("ResultSet")
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


        public int Id
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[PurchaseRequisitionLine.Columns.Id]];
            }

        }

        public int Number
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Number]] = value;
            }
            get
            {
                return (int)fields[columnsMap[PurchaseRequisitionLine.Columns.Number]];
            }
        }

        public String Description
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Description]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.Description]] == null) ? String.Empty : fields[columnsMap[PurchaseRequisitionLine.Columns.Description]].ToString();
            }
        }

        public int Quantity
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Quantity]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.Quantity]] == null) ? 0 : (int)fields[columnsMap[PurchaseRequisitionLine.Columns.Quantity]];
            }
        }

        public String Unit
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Unit]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.Unit]] == null) ? String.Empty : fields[columnsMap[PurchaseRequisitionLine.Columns.Unit]].ToString();
            }
        }

        public Double UnitCost
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.UnitCost]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.UnitCost]] == null) ? 0 : (Double)fields[columnsMap[PurchaseRequisitionLine.Columns.UnitCost]];
            }
        }

        public Double LineCost
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.LineCost]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.LineCost]] == null) ? 0 : (Double)fields[columnsMap[PurchaseRequisitionLine.Columns.LineCost]];
            }
        }

        public Double Tax
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Tax]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.Tax]] == null) ? 0 : (Double)fields[columnsMap[PurchaseRequisitionLine.Columns.Tax]];
            }
        }

        public Boolean Active
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Flag]] = value;
            }
            get
            {
                return Convert.ToInt32(fields[columnsMap[PurchaseRequisitionLine.Columns.Flag]]) == 1;
            }

        }

        public PurchaseRequisition PR
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.PurchaseRequisition]] = value;
            }
            get
            {
                return (PurchaseRequisition)fields[columnsMap[PurchaseRequisitionLine.Columns.PurchaseRequisition]];
            }
        }

        public int LineNumber
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Line]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.Line]] == null) ? 0 : (int)fields[columnsMap[PurchaseRequisitionLine.Columns.Line]];
            }

        }

        public String Site
        {
            set
            {
                fields[columnsMap[PurchaseRequisitionLine.Columns.Site]] = value;
            }
            get
            {
                return (fields[columnsMap[PurchaseRequisitionLine.Columns.Site]] == null) ? String.Empty : fields[columnsMap[PurchaseRequisitionLine.Columns.Site]].ToString();
            }
        }

        public override bool Equals(object obj)
        {
            return this.Id == ((PurchaseRequisitionLine)obj).Id;
        }

        public override int GetHashCode()
        {
            return base.GetHashCode();
        }

    }
}
