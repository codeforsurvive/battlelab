using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class PrSubTask : BaseModel
    {
        public enum Columns
        {
            Id,
            Name,
            PrId,
            PoNumber,
            Revision
        };

        public PrSubTask()
            : base()
        {
            tableName = "pr_subpekerjaan";
            autoIncrement = true;
            IdColumn = PrSubTask.Columns.Id;
            Id = 0;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "pr_subpekerjaan_id", "nama", "pr_id", "po_number", "revision_number"
            };

            int count = 0;
            foreach (PrSubTask.Columns col in Enum.GetValues(typeof(PrSubTask.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            this.PR = (this.PR == null) ? new PrEproc() : this.PR;
        }

        protected override void PrepareSave()
        {
            //this.PR.Save();

            //this.Code = String.Format("PR-DOC-{0}-{1}");
        }

        public static List<PrSubTask> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new PrSubTask
                {
                    Id = Convert.ToInt32((String)x.Element("pr_subpekerjaan_id") ?? "0"),
                    Name = (String)x.Element("nama") ?? String.Empty,
                    PoNumber = (String)x.Element("po_number") ?? String.Empty,
                    Revision = Convert.ToInt32((String)x.Element("revision_number") ?? "0"),
                    PR = PrEproc.ParseFirst(new PrEproc().Get((String)x.Element("pr_id")))
                }).ToList();
            return result;

        }

        public static PrSubTask ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new PrSubTask() : result[0];
        }

        public static List<PrSubTask> ParseDataSet(System.Data.DataSet ds)
        {
            return PrSubTask.ParseXml(ds.GetXml(), "Table");
        }

        public static PrSubTask ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new PrSubTask() : result[0];
        }

        public override bool Exist()
        {
            Dictionary<String, String> criteria = new Dictionary<string, string>();
            criteria.Add("pr_subpekerjaan_id", Id.ToString());
            System.Data.DataSet ds = Get(criteria);
            bool state = !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);
            if (state)
            {
                PrSubTask temp = PrSubTask.ParseFirst(ds);
                Id = temp.Id;
                Name = String.IsNullOrEmpty(Name) ? temp.Name : Name;
                Revision = (Revision == 0) ? temp.Revision : Revision;
                PR = (PR.Id == 0) ? temp.PR : PR;
            }

            return state;
        }


        public int Id
        {
            set
            {
                fields[columnsMap[PrSubTask.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[PrSubTask.Columns.Id]];
            }

        }

        public String Name
        {
            set
            {
                fields[columnsMap[PrSubTask.Columns.Name]] = value;
            }
            get
            {
                return (fields[columnsMap[PrSubTask.Columns.Name]] == null) ? String.Empty : fields[columnsMap[PrSubTask.Columns.Name]].ToString();
            }

        }

        public String PoNumber
        {
            set
            {
                fields[columnsMap[PrSubTask.Columns.PoNumber]] = value;
            }
            get
            {
                return (fields[columnsMap[PrSubTask.Columns.PoNumber]] == null) ? String.Empty : fields[columnsMap[PrSubTask.Columns.PoNumber]].ToString();
            }

        }

        public int Revision
        {
            set
            {
                fields[columnsMap[PrSubTask.Columns.Revision]] = value;
            }
            get
            {
                return (int)fields[columnsMap[PrSubTask.Columns.Revision]];
            }        
        }

        public PrEproc PR
        {
            set
            {
                fields[columnsMap[PrSubTask.Columns.PrId]] = value;
            }
            get
            {
                return (fields[columnsMap[PrSubTask.Columns.PrId]] == null) ? new PrEproc() : (PrEproc)fields[columnsMap[PrSubTask.Columns.PrId]];
            }

        }

    }
}
