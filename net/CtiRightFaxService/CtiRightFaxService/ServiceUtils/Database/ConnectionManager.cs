using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Npgsql;


namespace ServiceUtils.Database
{
    public class ConnectionManager
    {
        public static ConnectionManager instance = new ConnectionManager();
        private NpgsqlConnection connection = null;
        private DbAuthentication auth = null;

        private ConnectionManager()
        {

        }

        public bool OpenConnection(DbAuthentication auth)
        {
            if (connection != null)
            {
                Console.WriteLine("Connection already open!");
                return true;
            }

            try
            {
                connection = new NpgsqlConnection(auth.ConnectionString);
                connection.Open();
                Console.WriteLine("Connection to host {0}:{1} success!", auth.Host, auth.Port);
                this.auth = auth;
                return true;
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);

            }
            return false;
        }

        public void CloseConnection()
        {
            if (connection == null)
            {
                Console.WriteLine("There's no active connection!");
            }
            try
            {
                connection.Close();

            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
            finally
            {
                connection = null;
            }

        }


        public int ExecuteNonQuery(String sql)
        { 
            int affected = 0;
            NpgsqlTransaction transaction = connection.BeginTransaction();
            try
            {
                NpgsqlCommand cmd = new NpgsqlCommand(sql, connection);
                affected = cmd.ExecuteNonQuery();

                transaction.Commit();
            }
            catch (Exception ex)
            {
                affected = 0;
                Console.WriteLine(ex.Message);
            }
            return affected;
        }

        public System.Data.DataTable ExecuteQuery(String sql)
        {
            System.Data.DataTable resultSet = new System.Data.DataTable();
            try
            {
                NpgsqlDataAdapter da = new NpgsqlDataAdapter(sql, connection);
                System.Data.DataSet ds = new System.Data.DataSet();
                ds.Reset();
                da.Fill(ds);
                resultSet = ds.Tables[0];
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }

            return resultSet;
        }

        public static ConnectionManager Instance
        {
            get { return instance; }
        }



    }
}
