using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ITPI.Net.Utils.Configuration
{
    public class AppSetting
    {
        public AppSetting()
        {

        }

        public AppSetting(String name, String value)
        {
            this.Name = name;
            this.Value = value;
        }

        public static String NameAttribute
        {
            get { return "name"; }
        }

        public static String ValueAttribute
        {
            get { return "value"; }
        }

        public String Name
        {
            get;
            set;
        }

        public String Value
        {
            get;
            set;
        }

    }
}
