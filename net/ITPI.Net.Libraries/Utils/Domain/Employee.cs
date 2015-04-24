using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Linq;

namespace ITPI.Net.Utils.Domain
{
    public sealed class Employee : BaseModel
    {


        // Column Definition
        public enum Columns
        {
            Id, Name, NIK, Email, Phone, DateCreated, CreatedBy, UpdatedBy, LastUpdate, Username,
            Password, Active, Position, Section, Department, Role

        };

        public Employee()
            : base()
        {
            this.tableName = "tmp_pegawai";
            autoIncrement = true;
            IdColumn = Columns.Id;
            Id = 0;

        }

        protected override void GenerateColumns()
        {
            String[] columns = new String[] { 
                "pegawai_id", "nama_pegawai", "nik", "email", "telepon", "created_date", "created_by", "updated_by", "updated_date", "username",
                "password", "flag_active", "jabatan", "bagian", "departemen", "role_id"
            };

            int count = 0;
            foreach (Employee.Columns col in Enum.GetValues(typeof(Employee.Columns)))
            {
                columnsMap.Add(col, columns[count++]);
            }
        }

        protected override void InitializeChildren()
        {
            this.Department = (this.Department == null) ? new Department() : this.Department;
            this.Role = (this.Role == null) ? new Roles() : this.Role;
        }

        protected override void PrepareSave()
        {
            this.Department.Save();
            this.Role.Save();
        }

        public static List<Employee> ParseXml(String xml, String rootElement)
        {
            XElement root = XElement.Parse(xml);

            var result = (
                from x in root.Elements(rootElement)
                select new Employee
                {
                    Id = Convert.ToInt32((String)x.Element("pegawai_id") ?? "0"),
                    Name = (String)x.Element("nama_pegawai") ?? String.Empty,
                    NIK = (String)x.Element("nik") ?? String.Empty,
                    Email = (String)x.Element("email") ?? String.Empty,
                    Phone = (String)x.Element("telepon") ?? String.Empty,
                    DateCreated = (String)x.Element("created_date") ?? String.Empty,
                    CreatedBy = Convert.ToInt32((String)x.Element("created_by") ?? "0"),
                    UpdatedBy = Convert.ToInt32((String)x.Element("updated_by") ?? "0"),
                    LastUpdate = (String)x.Element("updated_at") ?? String.Empty,
                    Active = ((String)x.Element("flag_active") ?? "0") == "true",
                    Username = (String)x.Element("username") ?? String.Empty,
                    Password = (String)x.Element("password") ?? String.Empty,
                    Section = (String)x.Element("bagian") ?? String.Empty,
                    Department = Department.ParseFirstXml((String)x.Element("departemen"), "tmp_departemen2"),
                    Role = Roles.ParseFirstXml((String)x.Element("role_id"), "tmp_roles")
                }).ToList();
            return result;

        }


        public int Id
        {
            set
            {
                fields[columnsMap[Employee.Columns.Id]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Employee.Columns.Id]];
            }

        }

        public String Name
        {
            set
            {
                fields[columnsMap[Employee.Columns.Name]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.Name]].ToString();
            }

        }

        public String NIK
        {
            set
            {
                fields[columnsMap[Employee.Columns.NIK]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.NIK]].ToString();
            }

        }

        public String Email
        {
            set
            {
                fields[columnsMap[Employee.Columns.Email]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.Email]].ToString();
            }

        }

        public String Phone
        {
            set
            {
                fields[columnsMap[Employee.Columns.Phone]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.Phone]].ToString();
            }
        }

        public String DateCreated
        {
            set
            {
                fields[columnsMap[Employee.Columns.DateCreated]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.DateCreated]].ToString();
            }
        }

        public int CreatedBy
        {
            set
            {
                fields[columnsMap[Employee.Columns.CreatedBy]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Employee.Columns.CreatedBy]];
            }
        }

        public String LastUpdate
        {
            set
            {
                fields[columnsMap[Employee.Columns.LastUpdate]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.LastUpdate]].ToString();
            }

        }

        public int UpdatedBy
        {
            set
            {
                fields[columnsMap[Employee.Columns.UpdatedBy]] = value;
            }
            get
            {
                return (int)fields[columnsMap[Employee.Columns.UpdatedBy]];
            }

        }

        public String Username
        {
            set
            {
                fields[columnsMap[Employee.Columns.Username]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.Username]].ToString();
            }
        }

        public String Password
        {
            set
            {
                fields[columnsMap[Employee.Columns.Password]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.Password]].ToString();
            }

        }

        public bool Active
        {
            set
            {
                fields[columnsMap[Employee.Columns.Active]] = (value) ? 1 : 0;
            }
            get
            {
                return ((int)fields[columnsMap[Employee.Columns.Active]]) == 1;
            }
        }

        public String Position
        {
            set
            {
                fields[columnsMap[Employee.Columns.Position]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.Position]].ToString();
            }
        }

        public String Section
        {
            set
            {
                fields[columnsMap[Employee.Columns.Section]] = value;
            }
            get
            {
                return fields[columnsMap[Employee.Columns.Section]].ToString();
            }
        }

        public Department Department
        {
            set
            {
                fields[columnsMap[Employee.Columns.Department]] = value;
            }
            get
            {
                return (Department)fields[columnsMap[Employee.Columns.Department]];
            }

        }

        public Roles Role
        {
            set
            {
                fields[columnsMap[Employee.Columns.Role]] = value;
            }
            get
            {
                return (Roles)fields[columnsMap[Employee.Columns.Role]];
            }

        }

    }
}
