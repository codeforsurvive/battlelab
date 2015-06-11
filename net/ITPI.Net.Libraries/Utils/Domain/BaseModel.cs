using ITPI.Net.Utils.Database;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Xml;
using System.Xml.Linq;
using System.Text;


namespace ITPI.Net.Utils.Domain
{
    [Serializable]
    public class BaseModel
    {
        // override this attibute on subclasses
        protected String tableName = "dual";
        protected Enum IdColumn;
        protected bool autoIncrement;

        // column definitions
        protected Dictionary<Enum, String> columnsMap;
        protected Dictionary<String, object> fields;
        protected SQLServerProvider dataProvider = new SQLServerProvider();

        public BaseModel()
        {
            fields = new Dictionary<string, object>();
            columnsMap = new Dictionary<Enum, string>();
            MapFields();
            InitializeChildren();
        }


        protected void MapFields()
        {
            Configuration.ConfigurationSetting.Instance.MapValues(Utils.Helper.AssemblyDirectory + @"\setting.xml");
            GenerateColumns();
            foreach (var pair in columnsMap)
                this.fields.Add(pair.Value, null);

        }

        protected virtual void GenerateColumns()
        {
            throw new NotImplementedException("Not supported, has not been implemented yet!");
        }

        protected virtual void InitializeChildren()
        {
            throw new NotImplementedException("Not supported, has not been implemented yet!");
        }

        protected virtual void PrepareSave()
        {
            throw new NotImplementedException("Not supported, has not been implemented yet!");
        }

        public virtual bool Exist()
        {
            System.Data.DataSet ds = Get(GetId());
            return !(ds.Tables.Count <= 0 || ds.Tables[0].Rows.Count <= 0);

        }


        public int Save()
        {
            int affected = 0;
            try
            {
                dataProvider.OpenConnection(Configuration.ConfigurationSetting.Instance.Authenticaton);
                PrepareSave();

                if (!Exist())
                {
                    dataProvider.OpenConnection(Configuration.ConfigurationSetting.Instance.Authenticaton);
                    affected = dataProvider.ExecuteNonQuery(this.SqlInsert);
                    Logger.LogToConsole("Operation success!", "Insert command completed!");
                    Logger.LogToDefaultFile("Debug: ", String.Format("Sql Query: {0}", this.SqlInsert));
                    Logger.LogToDefaultFile("Operation success!", String.Format("Insert command at table {0} completed!", tableName));
                }
                else
                {
                    dataProvider.OpenConnection(Configuration.ConfigurationSetting.Instance.Authenticaton);
                    affected = dataProvider.ExecuteNonQuery(this.SqlUpdate);
                    Logger.LogToConsole("Operation success!", "Update command completed!");
                    Logger.LogToDefaultFile("Debug: ", String.Format("Sql Query: {0}", this.SqlUpdate));
                    Logger.LogToDefaultFile("Operation success!", String.Format("Update command at table {0} completed!", tableName));
                }
            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
            }
            return affected;
        }



        public System.Data.DataSet Get()
        {
            System.Data.DataSet ds = new System.Data.DataSet("ResultSet");
            try
            {
                dataProvider.OpenConnection(Configuration.ConfigurationSetting.Instance.Authenticaton);
                String sql = String.Format("select top 1000 * from {0}", tableName);
                ds = dataProvider.ExecuteQuery(sql);
            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
            }
            return ds;
        }

        public virtual object Select()
        {
            throw new NotImplementedException("Not supported, has not been implemented yet!");

        }

        public virtual Object Select(String id)
        {
            throw new NotImplementedException("Not supported, has not been implemented yet!");
        }

        public virtual Object Select(Dictionary<String, String> criteria)
        {
            throw new NotImplementedException("Not supported, has not been implemented yet!");
        }

        

        public System.Data.DataSet Get(String id)
        {
            System.Data.DataSet ds = new System.Data.DataSet("ResultSet");
            try
            {

                String sql = String.Format("select top 1000 * from {0} where {1} = '{2}'", tableName, columnsMap[IdColumn], id);
                dataProvider.OpenConnection(Configuration.ConfigurationSetting.Instance.Authenticaton);
                ds = dataProvider.ExecuteQuery(sql);

            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
            }

            return ds;
        }

        public System.Data.DataSet Find(List<String[]> criteria)
        {
            Dictionary<String, String> criteriaList = new Dictionary<string, string>();
            foreach (String[] item in criteria)
            {
                criteriaList.Add(item[0], item[1]);
            }

            return Get(criteriaList);
        }

        public System.Data.DataSet Get(Dictionary<String, String> criteria)
        {
            System.Data.DataSet ds = new System.Data.DataSet("ResultSet");
            try
            {
                String criteriaString = "";
                int count = 0;
                StringBuilder sb = new StringBuilder();
                foreach (var pair in criteria)
                { 
                    
                    sb.Append(String.Format("{0} = '{1}'", pair.Key, pair.Value));
                    if (count++ < criteria.Count - 1)
                        sb.Append(" and ");
                }
                criteriaString = sb.ToString();
                String sql = String.Format("select top 1000 * from {0} where {1}", tableName, criteriaString);
                dataProvider.OpenConnection(Configuration.ConfigurationSetting.Instance.Authenticaton);
                ds = dataProvider.ExecuteQuery(sql);

            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
            }

            return ds;
        }


        /*public static virtual BaseModel ParseXml(String xml)
        {
            throw new NotImplementedException("Not supported, not been implemented yet!");
        }

        public static virtual BaseModel ParseDataSet(System.Data.DataSet ds)
        {
            throw new NotImplementedException("Not supported, not been implemented yet!");
        }*/





        public object this[String column]
        {
            get
            {
                return (fields.ContainsKey(column)) ? this.fields[column] : null;
            }
        }

        public String SqlInsert
        {
            get
            {
                StringBuilder sb = new StringBuilder();
                StringBuilder sb2 = new StringBuilder();
                StringBuilder sb3 = new StringBuilder();
                sb.Append(String.Format("insert into {0}", tableName));
                sb2.Append("(");
                sb3.Append("Values (");
                int count = 0;
                foreach (var pair in this.fields)
                {
                    if (autoIncrement && count == 0)
                    {
                        count++;
                        continue;
                    }
                    sb2.Append(String.Format("{0}, ", pair.Key));
                    if (pair.Value is BaseModel)
                    {
                        sb3.Append(String.Format("'{0}', ", (pair.Value as BaseModel).GetId()));
                    }
                    else
                    {
                        sb3.Append(String.Format("'{0}', ", pair.Value));
                    }

                }
                sb2.Remove(sb2.Length - 2, 2);
                sb3.Remove(sb3.Length - 2, 2);
                sb2.Append(")");
                sb3.Append(")");
                return String.Format("{0} {1} {2}", sb.ToString(), sb2.ToString(), sb3.ToString());
            }
        }

        public String SqlUpdate
        {
            get
            {
                String sql = String.Format("update {0} set ", tableName);
                StringBuilder sb = new StringBuilder();

                int count = 0;
                foreach (var pair in this.fields)
                {
                    if (autoIncrement && count == 0)
                    {
                        count++;
                        continue;
                    }

                    if (pair.Value is BaseModel)
                    {
                        sb.Append(String.Format("{0} = '{1}', ", pair.Key, (pair.Value as BaseModel).GetId()));
                    }
                    else
                    {
                        sb.Append(String.Format("{0} = '{1}', ", pair.Key, pair.Value));
                    }

                }
                sb.Remove(sb.Length - 2, 2);
                return String.Format("{0} {1} where {2} = {3}", sql, sb.ToString(), columnsMap[IdColumn], GetId());
            }
        }

        public String SqlDelete
        {
            get
            {
                String sql = String.Format("delete from {0} where {1} = {2}", tableName, columnsMap[IdColumn], fields[columnsMap[IdColumn]]).ToString();

                return sql;
            }
        }

        public String TableName
        {
            get
            {
                return tableName;
            }
        }

        public override string ToString()
        {

            StringBuilder sb = new StringBuilder();
            foreach (var pair in this.fields)
            {
                sb.Append(String.Format("{0}, ", pair.Key));
            }
            sb.Remove(sb.Length - 2, 2);
            return String.Format("{0}[{1}]", tableName, sb.ToString());
        }

        public Dictionary<String, String> ToDictionary()
        {
            Dictionary<String, String> result = new Dictionary<string, string>();
            foreach (var pair in this.fields)
            {
                if (pair.Value is BaseModel)
                    result.Add(pair.Key, (pair.Value as BaseModel).InnerXml);
                else
                    result.Add(pair.Key, pair.Value.ToString());
            }
            return result;
        }

        public String InnerXml
        {
            get
            {
                XElement xml = new XElement(tableName);
                foreach (var pair in fields)
                {
                    if (pair.Value == null)
                        xml.Add(new XElement(pair.Key, ""));
                    else if (pair.Value is BaseModel)
                        xml.Add(XElement.Parse((pair.Value as BaseModel).InnerXml));
                    else
                        xml.Add(new XElement(pair.Key, pair.Value.ToString()));

                }

                return xml.ToString();
            }
        }

        public String Json
        {
            get
            {
                StringBuilder sb = new StringBuilder();
                foreach (var pair in this.fields)
                {
                    if (pair.Value == null)
                        sb.Append(String.Format("\"{0}\":\"{1}\",", pair.Key, string.Empty));
                    else if (pair.Value is BaseModel)
                        sb.Append(String.Format("\"{0}\":{1},", pair.Key, (pair.Value as BaseModel).Json));
                    else
                        sb.Append(String.Format("\"{0}\":\"{1}\",", pair.Key, pair.Value.ToString()));
                }
                sb.Remove(sb.Length - 1, 1);
                return String.Format("{{{0}}}", sb.ToString());
            }
        }

        public virtual String GetId()
        {
            return fields[columnsMap[IdColumn]].ToString();
        }

        public String ColumnName(Enum columnIdentifier)
        {
            return columnsMap[columnIdentifier];
        }


    }
}
