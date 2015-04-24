using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

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
            Line
        };

        public PurchaseRequisitionLine()
            : base()
        {
            autoIncrement = true;
            tableName = "tmp_purchase_requisition_line";
            IdColumn = PurchaseRequisitionLine.Columns.Id;
            Id = 0;

        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "prl_id", "prl_nomor", "prl_deskripsi", "prl_quantity", "prl_order_unit","prl_unit_cost",
                "prl_line_cost", "prl_tax", "prl_flag", "pr_id", "prl_line"
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
                return fields[columnsMap[PurchaseRequisitionLine.Columns.Description]].ToString();
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
                return (int)fields[columnsMap[PurchaseRequisitionLine.Columns.Quantity]];
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
                return fields[columnsMap[PurchaseRequisitionLine.Columns.Unit]].ToString();
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
                return (Double)fields[columnsMap[PurchaseRequisitionLine.Columns.UnitCost]];
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
                return (Double)fields[columnsMap[PurchaseRequisitionLine.Columns.LineCost]];
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
                return (Double)fields[columnsMap[PurchaseRequisitionLine.Columns.Tax]];
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
                return (int)fields[columnsMap[PurchaseRequisitionLine.Columns.Line]];
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
