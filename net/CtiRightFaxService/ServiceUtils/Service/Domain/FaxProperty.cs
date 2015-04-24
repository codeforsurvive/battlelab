using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml;
using System.Xml.Linq;

namespace ServiceUtils.Service.Domain
{
    public class FaxProperty
    {
        private String uniqueId;
        private int id;
        private String handle;
        private String faxFileName;
        private String owner;
        private DateTime sentDate;
        private DateTime lastChangedDate;
        private int totalPage;
        private bool received;
        private bool delayed;
        private bool forwarded;
        private bool printed;
        private bool viewed;
        private bool deleted;
        private bool approved;
        private bool needApproval;
        private bool hasPdf;
        private String xml;
        private String phone;


        public FaxProperty(String xmlFile)
        {
            Parse(xmlFile);
        }

        private void Parse(String xml)
        {
            try
            {
                IEnumerable<XElement> elements = XDocument.Load(xml).Root.Elements();
                this.xml = XDocument.Load(xml).ToString();
                foreach (var fax in elements)
                {
                    this.id = Convert.ToInt32(fax.Element("FaxID").Value);
                    this.uniqueId = fax.Element("UniqueID").Value;
                    this.handle = fax.Element("Handle").Value;
                    this.faxFileName = fax.Element("FaxFilename").Value;
                    this.owner = fax.Element("OwnerID").Value;
                    this.sentDate = DateTime.Parse(fax.Element("FaxRecordDateTime").Value);
                    this.lastChangedDate = DateTime.Parse(fax.Element("LastHistoryChangeDateTime").Value);
                    this.phone = fax.Element("RemoteID").Value;
                    this.totalPage = Convert.ToInt32(fax.Element("TotalPages").Value);
                    this.received = Convert.ToInt32(fax.Element("IsReceived").Value) == 1;
                    this.delayed = Convert.ToInt32(fax.Element("IsInDelaySend").Value) == 1;
                    this.forwarded = Convert.ToInt32(fax.Element("IsForwarded").Value) == 1;
                    this.printed = Convert.ToInt32(fax.Element("IsPrinted").Value) == 1;
                    this.approved = Convert.ToInt32(fax.Element("IsApproved").Value) == 1;
                    this.needApproval = Convert.ToInt32(fax.Element("IsNeedingApproval").Value) == 1;
                    this.hasPdf = Convert.ToInt32(fax.Element("HasPDF").Value) == 1;
                    this.viewed = Convert.ToInt32(fax.Element("IsViewed").Value) == 1;
                    this.deleted = Convert.ToInt32(fax.Element("IsDeleted").Value) == 1;
                    
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }

        }

       
        public String UniqueId
        {
            get { return uniqueId; }
        }

        public String Handle
        {
            get { return handle; }
        }

        public String FaxFilename
        {
            get { return faxFileName; }
        }

        public String Owner
        {
            get { return owner; }
        }

        public DateTime SentTime
        {
            get { return sentDate; }
        }

        public DateTime LastChangedDate
        {
            get { return lastChangedDate; }
        }

        public int TotalPage
        {
            get { return totalPage; }
        }

        public bool IsApproved
        {
            get { return approved; }
        }

        public bool IsDelayed
        {
            get { return delayed; }
        }

        public bool IsDeleted
        {
            get { return deleted; }
        }

        public bool IsForwarded
        {
            get { return forwarded; }
        }

        public bool IsNeedApproval
        {
            get { return needApproval; }
        }

        public bool IsPrinted
        {
            get { return printed; }
        }

        public bool IsReceived
        {
            get { return received; }
        }

        public bool IsViewed
        {
            get { return viewed; }
        }

        public bool HasPdf
        {
            get { return hasPdf; }
        }

        public String Phone
        {
            get { return phone; }
        }

        public String Xml
        {
            get { return xml; }
        }
    }
}
