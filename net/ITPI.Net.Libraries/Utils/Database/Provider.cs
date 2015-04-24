using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ITPI.Net.Utils.Database
{
    public class Provider
    {

        protected DbAuthentication auth;
        protected DbProvider provider;

        // Restrict constructor call outside class and its children
        protected Provider(DbProvider provider)
        {
            this.provider = provider;
        }

        public virtual bool OpenConnection(DbAuthentication auth)
        {
            return false;
        }

        public virtual void CloseConnection()
        { 
        
        }

        public virtual int ExecuteNonQuery(String sql)
        {
            return -1;
        }

        public virtual System.Data.DataSet ExecuteQuery(String sql)
        {
            return null;
        }

        public virtual String ConnectionString
        {
            get 
            {
                return String.Format("Not implementable!");
            }
        }

        public override string ToString()
        {
            return String.Format("{0}[Host: {1}:{2}; Username: {3}; Password: {4}; Database:{5}]", auth.Provider, auth.Host,auth.Port, auth.Username, auth.Password, auth.DbName);
        }
    }
}
