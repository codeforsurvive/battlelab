using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

using ITPI.Net.Utils.Domain;

namespace WebServices.ExternalServices
{
    public class MaximoPOService
    {
        public bool PushVendorDataMaximo(ITPI.Net.Utils.Domain.Vendor vendor, ITPI.Net.Utils.Domain.PurchaseRequisitionLine prl) 
        {
            
            return false;
        }

        public bool PushVendorDataAx(ITPI.Net.Utils.Domain.Vendor vendor) 
        {
            return false;
        
        }

        public String TestCreatePO(PrData[] prItems, String site, String dept, String agent)
        {
            TPSCPO_POType[] poSet = new TPSCPO_POType[prItems.Length];
            //PurchaseOrder[] poList = new PurchaseOrder[prItems.Length];
            int i = 0;
            foreach (PrData item in prItems)
            {
                TPSCPO_POType mxPo = new TPSCPO_POType();
                mxPo.DEPARTMENT = new MXStringType();
                mxPo.DEPARTMENT.Value = dept;
                mxPo.DESCRIPTION = new MXStringType();
                mxPo.DESCRIPTION.Value = string.Empty;
                mxPo.SITEID = new MXStringType();
                mxPo.SITEID.Value = site;
                mxPo.VENDOR = new MXStringType();
                mxPo.VENDOR.Value = "TEST01";
                mxPo.PURCHASEAGENT = new MXStringType();
                mxPo.PURCHASEAGENT.Value = agent;
                mxPo.POSCOPE = new MXStringType();
                mxPo.POSCOPE.Value = "LOCAL";
                mxPo.REVISIONNUM = new MXLongType();
                mxPo.REVISIONNUM.Value = 0;
                TPSCPO_POLINEType[] poLines = new TPSCPO_POLINEType[item.PrLines.Count()];
                int count = 0;
                foreach (int val in item.PrLines)
                {
                    PrLineEproc prl = new PrLineEproc();
                    prl = PrLineEproc.ParseFirst(prl.Get(val.ToString()));
                    TPSCPO_POLINEType mxPrl = new TPSCPO_POLINEType();
                    mxPrl.PRNUM = new MXStringType();
                    mxPrl.POLINENUM = new MXLongType();
                    mxPrl.POLINENUM.Value = prl.LineNumber;
                    mxPrl.PRNUM.Value = "PR-2023";
                    mxPrl.PRLINENUM = new MXLongType();
                    mxPrl.PRLINENUM.Value = prl.LineNumber;
                    mxPrl.TOSITEID = new MXStringType();
                    mxPrl.TOSITEID.Value = site;
                    mxPrl.UNITCOST = new MXDoubleType();
                    mxPrl.UNITCOST.Value = prl.UnitCost;

                    poLines[count++] = mxPrl;
                }

                mxPo.POLINE = poLines;
                poSet[i] = mxPo;
                i++;
            }

            //MaximoEprocService.CreateTPSCPOResponse response = new MaximoEprocService.CreateTPSCPOResponse
            //MaximoEprocService.TPSCPO_POType[] poSet = new MaximoEprocService.TPSCPO_POType[1];
            //MaximoEprocService.TPSCPO_POType mxPo = new MaximoEprocService.TPSCPO_POType();

            EPROC_TPSCPOInterfacePortTypeClient mxClient = new EPROC_TPSCPOInterfacePortTypeClient("EPROC_TPSCPOInterfaceSOAP11Port");

            //Console.WriteLine("Endpoint: {0}", mxClient.Endpoint.Name);
            //Console.WriteLine("State: {0}", mxClient.State.ToString());
            //Console.ReadKey();

            DateTime date = DateTime.Now;
            String lang = "en";
            String msgID = "";
            String version = "";
            //MaximoEprocService.CreateTPSCPORequest request = new MaximoEprocService.CreateTPSCPORequest(poSet, date, lang, lang, msgID, version
            CreateTPSCPOType type = new CreateTPSCPOType();
            type.TPSCPOSet = poSet;
            CreateTPSCPOResponseType response = mxClient.CreateTPSCPO(type);

            POKeyType[] keys = response.POMboKeySet;

            // Successfully posted to Maximo
            System.Text.StringBuilder sb = new System.Text.StringBuilder("[");
            for (int it = 0; it < keys.Length; it++)
            {
                sb.Append("{");
                sb.Append(String.Format("po_number: '{0}', revision: {1}, site: '{2}'", keys[it].PONUM.Value, keys[it].REVISIONNUM.Value, keys[it].SITEID.Value));
                sb.Append("}");
            }
            sb.Append("]");
            return Newtonsoft.Json.Linq.JArray.Parse(sb.ToString()).Root.ToString();
        }


        public String CreatePO(int prId, PrData[] prItems, String site, String dept, String agent)
        {
            try
            {
                TPSCPO_POType[] poSet = new TPSCPO_POType[prItems.Length];
                PurchaseOrder[] poList = new PurchaseOrder[prItems.Length];
                PrEproc pr = new PrEproc();
                pr = PrEproc.ParseFirst(pr.Get(prId.ToString()));
                int i = 0;
                String []vendorJson = new String[prItems.Length];
                foreach (PrData item in prItems)
                {
                    PurchaseOrder po = new PurchaseOrder();
                    List<String[]> criteria = new List<string[]>();
                    PrVendor vendor = new PrVendor();
                    vendor = PrVendor.ParseFirst(vendor.Get(item.VendorId.ToString()));
                    vendorJson[i] = vendor.Json;
                    po.Vendor = vendor;

                    po.Pr = pr;

                    PrSubTask subtask = new PrSubTask();
                    subtask = PrSubTask.ParseFirst(subtask.Get(item.SubtaskId.ToString()));

                    TPSCPO_POType mxPo = new TPSCPO_POType();
                    mxPo.DEPARTMENT = new MXStringType();
                    mxPo.DEPARTMENT.Value = dept;
                    mxPo.DESCRIPTION = new MXStringType();
                    mxPo.DESCRIPTION.Value = string.Empty;
                    mxPo.SITEID = new MXStringType();
                    mxPo.SITEID.Value = site;
                    mxPo.VENDOR = new MXStringType();
                    mxPo.VENDOR.Value = vendor.AxId;
                    mxPo.PURCHASEAGENT = new MXStringType();
                    mxPo.PURCHASEAGENT.Value = agent;
                    mxPo.POSCOPE = new MXStringType();
                    mxPo.POSCOPE.Value = "LOCAL";
                    mxPo.REVISIONNUM = new MXLongType();
                    mxPo.REVISIONNUM.Value = 0;
                    TPSCPO_POLINEType[] poLines = new TPSCPO_POLINEType[item.PrLines.Count()];
                    int count = 0;
                    foreach (int val in item.PrLines)
                    {
                        PrLineEproc prl = new PrLineEproc();
                        prl = PrLineEproc.ParseFirst(prl.Get(val.ToString()));
                        po.AddLineItem(prl);
                        TPSCPO_POLINEType mxPrl = new TPSCPO_POLINEType();
                        mxPrl.PRNUM = new MXStringType();
                        mxPrl.POLINENUM = new MXLongType();
                        mxPrl.POLINENUM.Value = prl.LineNumber;
                        mxPrl.PRNUM.Value = pr.Code;
                        mxPrl.PRLINENUM = new MXLongType();
                        mxPrl.PRLINENUM.Value = prl.LineNumber;
                        mxPrl.TOSITEID = new MXStringType();
                        mxPrl.TOSITEID.Value = site;
                        mxPrl.UNITCOST = new MXDoubleType();
                        mxPrl.UNITCOST.Value = prl.UnitCost;

                        poLines[count++] = mxPrl;
                    }

                    mxPo.POLINE = poLines;
                    poSet[i] = mxPo;
                    poList[i] = po;
                    i++;
                }

                //MaximoEprocService.CreateTPSCPOResponse response = new MaximoEprocService.CreateTPSCPOResponse
                //MaximoEprocService.TPSCPO_POType[] poSet = new MaximoEprocService.TPSCPO_POType[1];
                //MaximoEprocService.TPSCPO_POType mxPo = new MaximoEprocService.TPSCPO_POType();

                EPROC_TPSCPOInterfacePortTypeClient mxClient = new EPROC_TPSCPOInterfacePortTypeClient("EPROC_TPSCPOInterfaceSOAP11Port");

                //Console.WriteLine("Endpoint: {0}", mxClient.Endpoint.Name);
                //Console.WriteLine("State: {0}", mxClient.State.ToString());
                //Console.ReadKey();

                DateTime date = DateTime.Now;
                String lang = "en";
                String msgID = "";
                String version = "";
                //MaximoEprocService.CreateTPSCPORequest request = new MaximoEprocService.CreateTPSCPORequest(poSet, date, lang, lang, msgID, version
                CreateTPSCPOType type = new CreateTPSCPOType();
                type.TPSCPOSet = poSet;
                CreateTPSCPOResponseType response = mxClient.CreateTPSCPO(type);

                POKeyType[] keys = response.POMboKeySet;

                // Successfully posted to Maximo

                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                sb.Append("[");
                for (int it = 0; it < keys.Length; it++)
                {
                    sb.Append("{");
                    sb.Append(String.Format("po_number: '{0}', revision: {1}, subpekerjaan_id: {2}, vendor: '{3}'", keys[it].PONUM.Value, keys[it].REVISIONNUM.Value, prItems[it].SubtaskId, poSet[it].VENDOR.Value));
                    sb.Append("}");
                }
                sb.Append("]");

                String poData = sb.ToString();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("pr: '{0}', agent: '{1}', department: '{2}', pr_site: '{3}', po: {4}", pr.Code, agent, dept, site, poData));
                sb.Append("}");

                String result = sb.ToString();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("status: 'ok', result: {0}", result));
                sb.Append("}");
                return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
                /**
                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                for (int it = 0; it < poList.Length; it++)
                {
                    poList[it].SubTask.PoNumber = keys[it].PONUM.Value;
                    poList[it].SubTask.Revision = (int)keys[it].REVISIONNUM.Value;

                    sb.Append(poList[it].InnerXml);
                }

                **/
            }
            catch (Exception ex)
            {
                System.Text.StringBuilder sb = new System.Text.StringBuilder();
                sb.Clear();
                sb.Append("{");
                sb.Append(String.Format("status: 'error', result: '{0}'", ex.Message));
                sb.Append("}");
                return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).Root.ToString();
            }
        }
    }
}