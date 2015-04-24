using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ITPI.Net.Utils.Domain
{
    public sealed class Test : BaseModel
    {
        public enum Columns
        {
            Id,
            Name
        };

        public Test()
            : base()
        {
            this.tableName = "test";

        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { "id", "name"};
            int count = 0;
            foreach (Test.Columns col in Enum.GetValues(typeof(Test.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        public int Id
        {
            set
            {
                fields[columnsMap[Test.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Test.Columns.Id]];
            }

        }

        public String Name
        {
            set
            {
                fields[columnsMap[Test.Columns.Name]] = value;
            }
            get
            {
                return fields[columnsMap[Test.Columns.Name]].ToString();
            }
        }
    }
}
