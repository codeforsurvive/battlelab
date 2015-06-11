using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class PrLineEproc : PurchaseRequisitionLine
    {
        public PrLineEproc()
            : base()
        {
            autoIncrement = true;
            tableName = "purchase_requisition_line";
            IdColumn = PurchaseRequisitionLine.Columns.Id;
            Id = 0;
            Active = true;
        }

        public static List<PrLineEproc> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);
            String[] columns = new String[] { 
                "prl_id", "prl_nomor", "prl_deskripsi", "prl_quantity", "prl_order_unit","prl_unit_cost",
                "prl_line_cost", "prl_tax", "prl_flag", "pr_id", "prl_line", "site"
            };

            var result = (
                from x in root.Elements(rootElement)
                select new PrLineEproc
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
                    PR = PrEproc.ParseFirst(new PrEproc().Get((String)x.Element("pr_id"))),
                    LineNumber = Convert.ToInt32((String)x.Element("prl_line") ?? "0"),
                    Site = (String)x.Element("site") ?? String.Empty
                }).ToList();
            return result;

        }

        public static PrLineEproc ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new PrLineEproc() : result[0];
        }

        public static List<PrLineEproc> ParseDataSet(System.Data.DataSet ds)
        {
            return PrLineEproc.ParseXml(ds.GetXml(), "Table");
        }

        public static PrLineEproc ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new PrLineEproc() : result[0];
        }

        


    }
}
