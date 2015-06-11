using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class PrVendor : Vendor
    {
        public PrVendor()
            : base()
        {
            autoIncrement = true;
            tableName = "rekanan";
            IdColumn = Vendor.Columns.Id;
            Id = 0;
        }

        public static List<PrVendor> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);
            var result = (
                from x in root.Elements(rootElement)
                select new PrVendor
                {
                    Id = Convert.ToInt32((String)x.Element("rekanan_id") ?? "0"),
                    Name = (String)x.Element("nama_perusahaan") ?? String.Empty,
                    NPWP = (String)x.Element("npwp") ?? String.Empty,
                    Address = (String)x.Element("alamat") ?? String.Empty,
                    Phone = (String)x.Element("telepon") ?? String.Empty,
                    Fax = (String)x.Element("fax") ?? String.Empty,
                    Email = (String)x.Element("email") ?? String.Empty,
                    Website = (String)x.Element("website") ?? String.Empty,
                    PostalCode = (String)x.Element("kodepos") ?? String.Empty,
                    City = City.ParseFirst(new City().Get((String)x.Element("kota_id"))),
                    Province = Province.ParseFirst(new Province().Get((String)x.Element("provinsi_id"))),
                    BankAccountName = (String)x.Element("bank_account_name") ?? String.Empty,
                    BankAccountNumber = (String)x.Element("bank_account_no") ?? String.Empty,
                    AxId = (String)x.Element("kode_rekanan") ?? String.Empty,
                    OnHold = ((String)x.Element("flag_blacklist") ?? "0") == "true"

                }).ToList();
            return result;


        }

        public static PrVendor ParseFirstXml(string xml, String rootElement)
        {

            var result = ParseXml(xml, rootElement);

            return (result == null || result.Count <= 0) ? new PrVendor() : result[0];
        }

        public static List<PrVendor> ParseDataSet(System.Data.DataSet ds)
        {
            return PrVendor.ParseXml(ds.GetXml(), "Table");
        }

        public static PrVendor ParseFirst(System.Data.DataSet ds)
        {
            var result = ParseDataSet(ds);

            return (result == null || result.Count <= 0) ? new PrVendor() : result[0];
        }
    }
}
