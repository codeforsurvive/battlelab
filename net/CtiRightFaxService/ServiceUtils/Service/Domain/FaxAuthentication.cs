using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ServiceUtils.Service.Domain
{
    public sealed class FaxAuthentication
    {
        private String host;
        private String username;
        private String password;
        private String logpath;
        private short wait;
        private short delay;

        public FaxAuthentication(String host, String username, String password, String logPath, short wait, short delay)
        {
            this.host = host;
            this.username = username;
            this.password = password;
            this.logpath = logPath;
            this.wait = wait;
            this.delay = delay;
        }

        public String Host
        {
            get { return host; }
        }

        public String Username
        {
            get { return username; }
        }

        public String Password
        {
            get { return password; }
        }

        public String Log
        {
            get { return logpath; }
        }

        public short WaitTime
        {
            get { return wait; }
        }

        public short DelayTime
        {
            get { return delay; }
        }

        public static String HostAttribute
        {
            get { return "host"; }
        }

        public static String UsernameAttribute
        {
            get { return "username"; }
        }

        public static String PasswordAttribute
        {
            get { return "password"; }
        }

        public static String LogPathAttribute
        {
            get { return "log-path"; }
        }

        public static String WaitTimeAttribute
        {
            get { return "wait-time"; }
        }

        public static String DelayTimeAttribute
        {
            get { return "delay-time"; }
        }

        public override string ToString()
        {
            return String.Format("[Host: {0}; Username: {1}; Password: {2}; LogPath: {3}; Wait: {4} ms; Delay: {5} ms]", host, username, password, logpath, wait, delay);
        }

    }
}
