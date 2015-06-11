using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class PrEproc : PurchaseRequisition
    {
        public PrEproc()
            : base()
        {
            autoIncrement = true;
            tableName = "purchase_requisition";
            IdColumn = PurchaseRequisition.Columns.Id;
            Id = 0;
            Confirmed = false;
            Created = false;
        }

        public static List<PrEproc> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new PrEproc
                {
                    Id = Convert.ToInt32((String)x.Element("pr_id") ?? "0"),
                    Code = (String)x.Element("pr_kode") ?? String.Empty,
                    Name = (String)x.Element("pr_name") ?? String.Empty,
                    Confirmed = ((String)x.Element("confirmed") ?? "0") == "true",
                    Created = ((String)x.Element("sudah_dibuat_panitia") ?? "0") == "true",
                    DocumentUrl = (String)x.Element("url_dokumen") ?? String.Empty,
                    Department = (String)x.Element("departemen") ?? String.Empty
                }).ToList();
            return result;

        }

        public override bool Exist()
        {
            Dictionary<String, String> criteria = new Dictionary<string, string>();
            criteria.Add("pr_kode", Code);
            System.Data.DataSet ds = Get(criteria);
            bool state = !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);

            if (state)
            {
                PurchaseRequisition temp = PurchaseRequisition.ParseFirst(ds);
                Id = temp.Id;
                Code = String.IsNullOrEmpty(Code) ? temp.Code : Code;
                Name = String.IsNullOrEmpty(Name) ? temp.Name : Name;
                Department = String.IsNullOrEmpty(Department) ? temp.Department : Department;
            }

            return state;
        }

        public static PrEproc ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new PrEproc() : result[0];
        }

        public static List<PrEproc> ParseDataSet(System.Data.DataSet ds)
        {
            return PrEproc.ParseXml(ds.GetXml(), "Table");
        }

        public static PrEproc ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new PrEproc() : result[0];
        }

    }
}
