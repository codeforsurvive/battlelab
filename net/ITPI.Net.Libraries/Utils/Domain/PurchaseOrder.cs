using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public sealed class PurchaseOrder
    {
        private String site;
        private PrSubTask subTask;
        private PrEproc pr;
        private PrVendor vendor;
        private Employee creator;
        private List<PrLineEproc> prLines;


        public PurchaseOrder()
        {
            site = "SBY";
            subTask = new PrSubTask();
            pr = new PrEproc();
            vendor = new PrVendor();
            creator = new Employee();
            prLines = new List<PrLineEproc>();
        }


        public void AddLineItem(PrLineEproc item)
        {
            prLines.Add(item);
        }

        public String Site
        {
            set
            {
                site = value;
            }
            get
            {
                return site;
            }

        }

        public PrVendor Vendor
        {
            set
            {
                vendor = value;
            }
            get
            {
                return vendor;
            }
        }

        public PrEproc Pr
        {
            set
            {
                pr = value;
            }
            get
            {
                return pr;
            }
        }

        public Employee Creator
        {
            set
            {
                creator = value;
            }
            get
            {
                return creator;
            }
        }

        public PrSubTask SubTask
        {
            set
            {
                subTask = value;
            }
            get
            {
                return subTask;
            }
        }

        public List<PrLineEproc> PrLines
        {
            get
            {
                return (prLines == null) ? new List<PrLineEproc>() : new List<PrLineEproc>(prLines);
            }
        }

        public String XmlSerializer(List<PrLineEproc> prLines)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<pr_lines>");
            foreach (PrLineEproc item in prLines)
            {
                sb.Append(item.InnerXml);
                sb.Append(Environment.NewLine);
            }
            sb.Append("</pr_lines>");
            return sb.ToString();
        }

        public String InnerXml
        {
            get
            {
                try
                {
                    XElement xml = new XElement("PurchaseOrder");
                    xml.Add(new XElement("site", Site));
                    xml.Add(XElement.Parse(subTask.InnerXml));
                    xml.Add(XElement.Parse(pr.InnerXml));
                    String serialized = XmlSerializer(PrLines);
                    if (String.IsNullOrEmpty(serialized))
                        xml.Add(new XElement("pr_lines", String.Empty));
                    else
                        xml.Add(XElement.Parse(serialized));

                    xml.Add(new XElement("creator", XElement.Parse(creator.InnerXml)));

                    return xml.ToString();
                }
                catch (Exception ex)
                {
                    return String.Format("<error>{0}</error>", ex.Message);
                }
            }
        }

        public String Json
        {
            get
            {
                StringBuilder sb = new StringBuilder();

                sb.Append(String.Format("\"{0}\":{1},", "site", Site));
                sb.Append(String.Format("\"{0}\":{1},", subTask.TableName, SubTask.Json));
                sb.Append(String.Format("\"{0}\":{1},", pr.TableName, Pr.Json));
                sb.Append(String.Format("\"{0}\":[", "pr_lines"));
                foreach (PrLineEproc item in prLines)
                {
                    sb.Append(String.Format("{0},", item.Json));
                }
                sb.Remove(sb.Length - 1, 1);
                sb.Append("],");

                sb.Append(String.Format("\"{0}\":{1},", "creator", Creator.Json));

                sb.Remove(sb.Length - 1, 1);
                return String.Format("{{{0}}}", sb.ToString());
            }
        }
    }
}
