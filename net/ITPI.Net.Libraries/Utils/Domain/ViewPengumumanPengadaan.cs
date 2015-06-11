using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public class ViewPengumumanPengadaan : BaseModel
    {
        public enum Columns
        {
            Id,
            NamaPaket
        };

        public ViewPengumumanPengadaan()
            : base()
        {
            autoIncrement = true;
            tableName = "pengumuman_pengadaan_view";
            IdColumn = ViewPengumumanPengadaan.Columns.Id;
        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "id_pengumuman_pengadaan", "nama_paket"
            };
            int count = 0;
            foreach (ViewPengumumanPengadaan.Columns col in Enum.GetValues(typeof(ViewPengumumanPengadaan.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            // do nothing
        }

        protected override void PrepareSave()
        {
            // do nothing
        }

        public System.Data.DataSet Get(int start, int limit)
        {
            System.Data.DataSet ds = new System.Data.DataSet("ResultSet");
            try
            {
                dataProvider.OpenConnection(Configuration.ConfigurationSetting.Instance.Authenticaton);
                String sql = String.Format("select * from pengumuman_pengadaan_view order by pengumuman_pengadaan_view.tgl_mulai desc offset {0} rows FETCH  next {1} rows only", start, limit);
                ds = dataProvider.ExecuteQuery(sql);
            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
            }
            return ds;
        }

        public List<ViewPengumumanPengadaan> Select()
        {
            String xml = Get().GetXml();
            XElement root = XElement.Parse(xml);
            
            var result = (
                from x in root.Elements("Table")
                select new ViewPengumumanPengadaan
                {
                    Id = Convert.ToInt32((String)x.Element("id_pengumuman_pengadaan") ?? "0"),
                    NamaPaket = (String)x.Element("nama_paket") ?? "0"
                }).ToList();
            return result;
        }

        public List<ViewPengumumanPengadaan> Select(int start, int limit)
        {
            String xml = Get(start, limit).GetXml();
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements("Table")
                select new ViewPengumumanPengadaan
                {
                    Id = Convert.ToInt32((String)x.Element("id_pengumuman_pengadaan") ?? "0"),
                    NamaPaket = (String)x.Element("nama_paket") ?? "0"
                }).ToList();
            return result;
        }

        public int Id
        {
            set
            {
                fields[columnsMap[ViewPengumumanPengadaan.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[ViewPengumumanPengadaan.Columns.Id]];
            }

        }

        public String NamaPaket
        {
            set
            {
                fields[columnsMap[ViewPengumumanPengadaan.Columns.NamaPaket]] = value;
            }
            get
            {
                return fields[columnsMap[ViewPengumumanPengadaan.Columns.NamaPaket]].ToString();
            }
        }
    }
}
