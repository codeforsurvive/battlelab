using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class PrDocument : BaseModel
    {
        public enum Columns
        {
            Id,
            Code,
            PR,
            Url
        };

        public PrDocument()
            : base()
        {
            tableName = "tmp_dokumen_pr";
            IdColumn = PrDocument.Columns.Id;
            autoIncrement = true;
            Id = 0;

        }


        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "id_dokumen", "kode_dokumen", "pr_id", "url_dokumen"
            };

            int count = 0;
            foreach (PrDocument.Columns col in Enum.GetValues(typeof(PrDocument.Columns)))
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

            //this.Code = String.Format("PR-DOC-{0}-{1}");
        }

        public static List<PrDocument> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new PrDocument
                {
                    Id = Convert.ToInt32((String)x.Element("id_dokumen") ?? "0"),
                    Code = (String)x.Element("kode_dokumen") ?? String.Empty,
                    UrlDocument = (String)x.Element("url_dokumen") ?? String.Empty,
                    PR = PurchaseRequisition.ParseFirst(new PurchaseRequisition().Get((String)x.Element("pr_id")))
                }).ToList();
            return result;

        }

        public static PrDocument ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new PrDocument() : result[0];
        }

        public static List<PrDocument> ParseDataSet(System.Data.DataSet ds)
        {
            return PrDocument.ParseXml(ds.GetXml(), "Table");
        }

        public static PrDocument ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new PrDocument() : result[0];
        }

        public override bool Exist()
        {
            Dictionary<String, String> criteria = new Dictionary<string, string>();
            criteria.Add("id_dokumen", Code);
            System.Data.DataSet ds = Get(criteria);
            bool state = !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);
            if (state)
            {
                PrDocument temp = PrDocument.ParseFirst(ds);
                Id = temp.Id;
                Code = String.IsNullOrEmpty(Code) ? temp.Code : Code;
                UrlDocument = String.IsNullOrEmpty(UrlDocument) ? temp.UrlDocument : UrlDocument;
                PR = (PR.Id == 0) ? temp.PR : PR;
            }

            return state;
        }


        public int Id
        {
            set
            {
                fields[columnsMap[PrDocument.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[PrDocument.Columns.Id]];
            }

        }

        public String Code
        {
            set
            {
                fields[columnsMap[PrDocument.Columns.Code]] = value;
            }
            get
            {
                return (fields[columnsMap[PrDocument.Columns.Code]] == null) ? String.Empty : fields[columnsMap[PrDocument.Columns.Code]].ToString();
            }

        }

        public String UrlDocument
        {
            set
            {
                fields[columnsMap[PrDocument.Columns.Url]] = value;
            }
            get
            {
                return (fields[columnsMap[PrDocument.Columns.Url]] == null) ? String.Empty : fields[columnsMap[PrDocument.Columns.Url]].ToString();
            }

        }

        public PurchaseRequisition PR
        {
            set
            {
                fields[columnsMap[PrDocument.Columns.PR]] = value;
            }
            get
            {
                return (fields[columnsMap[PrDocument.Columns.PR]] == null) ? new PurchaseRequisition() : (PurchaseRequisition)fields[columnsMap[PrDocument.Columns.PR]];
            }

        }



    }
}
