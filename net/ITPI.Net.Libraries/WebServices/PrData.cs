using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WebServices
{
    public class PrData
    {
        int subTaskId;
        int vendorId;
        List<int> prLines;

        public PrData(int subTask, int vendor)
        {
            this.subTaskId = subTask;
            this.vendorId = vendor;
            this.prLines = new List<int>();
        }

        public void AddPrLine(int item)
        {
            this.prLines.Add(item);
        }

        public int SubtaskId
        {
            get { return subTaskId; }
        }

        public int VendorId
        {
            get { return vendorId; }
        }

        public IEnumerable<int> PrLines
        {
            get { return prLines.Distinct(); }
        }
    };

}