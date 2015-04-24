using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data.SqlClient;

namespace ITPI.Net.Utils.Database
{
    public class SQLServerProvider : Provider
    {
        private SqlConnection connection = null;
        public SQLServerProvider()
            : base(DbProvider.SQLServer)
        {

        }

        public override bool OpenConnection(DbAuthentication auth)
        {
            if (auth.Provider != this.provider)
            {
                Logger.LogToConsole("Cannot connected to database server", "Connection Setting only available for SQL Server Data Provider");
                Logger.LogToDefaultFile("Cannot connected to database server", "Connection Setting only available for SQL Server Data Provider");
                return false;
            }
            try
            {
                if (connection != null && connection.State == System.Data.ConnectionState.Open)
                {
                    Logger.LogToConsole("Success connected to database server", "Connection already open!");
                    Logger.LogToDefaultFile("Success connected to database server", "Connection already open!");
                    return true;
                }
                this.auth = auth;
                connection = new SqlConnection(this.ConnectionString);
                connection.Open();
                Logger.LogToConsole("Success connected to database server", String.Format("Connection to host {0}:{1} success!", auth.Host, auth.Port));
                Logger.LogToDefaultFile("Success connected to database server", String.Format("Connection to host {0}:{1} success!", auth.Host, auth.Port));
                
                return true;
            }

            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
            }
            return false;
        }

        public override void CloseConnection()
        {
            if (connection == null)
            {
                Logger.LogToConsole("Cannot disconnect from database server", "No open connection!");
                Logger.LogToDefaultFile("Cannot disconnect from database server", "No open connection!");
            }
            try
            {
                connection.Close();
                Logger.LogToConsole("Successful disconnect from database server", "Connection to database server closed succesfully!");
                Logger.LogToDefaultFile("Successful disconnect from database server", "Connection to database server closed succesfully!");

            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
            }
            finally
            {
                connection = null;
            }

        }


        public override int ExecuteNonQuery(string sql)
        {
               
            int affected = -1;
            SqlCommand cmd = connection.CreateCommand();
            SqlTransaction trx = connection.BeginTransaction("Execute NonQuery Transaction");
            cmd.Connection = connection;
            cmd.Transaction = trx;
            try
            {
                cmd.CommandText = sql;
                affected = cmd.ExecuteNonQuery();
                trx.Commit();
                Logger.LogToConsole("Operation Success!", "Transaction complete! committed");
                Logger.LogToDefaultFile("Operation Success!", "Transaction complete! committed");
            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                trx.Rollback();
                Logger.LogToConsole("Operation Success!", "Transaction aborted! rollback");
                Logger.LogToDefaultFile("Operation Success!", "Transaction aborted! rollback");
            }
            finally
            {
                connection.Close();
                Logger.LogToConsole("Operation Completed!", "Closing database connection");
                Logger.LogToDefaultFile("Operation Completed!", "Closing database connection");
            }

            return affected;
        }

        public override System.Data.DataSet ExecuteQuery(string sql)
        {
            System.Data.DataSet ds = new System.Data.DataSet("ResultSet");
            
            try
            {
                SqlDataAdapter da = new SqlDataAdapter();
                da.SelectCommand = new SqlCommand(sql, connection);
                da.Fill(ds);
                Logger.LogToConsole("Operation Success!", "Transaction complete! committed");
                Logger.LogToDefaultFile("Operation Success!", "Transaction complete! committed");
            }
            catch (Exception ex)
            {
                Logger.LogToConsole(ex);
                Logger.LogToDefaultFile(ex);
                Logger.LogToConsole("Operation Success!", "Transaction aborted! rollback");
                Logger.LogToDefaultFile("Operation Success!", "Transaction aborted! rollback");
            }
            finally
            {
                connection.Close();
                Logger.LogToConsole("Operation Completed!", "Closing database conncetion");
                Logger.LogToDefaultFile("Operation Completed!", "Closing database conncetion");
            }
            return ds;
        }

        public override string ConnectionString
        {
            get
            {
                return String.Format("Data Source={0},{1};Network Library=DBMSSOCN;Initial Catalog={2};User ID={3};Password={4};", auth.Host, auth.Port, auth.DbName, auth.Username, auth.Password);
            }
        }

    }
}
