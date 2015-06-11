using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

using ITPI.Net.Utils.Domain;

namespace WebServices.ExternalServices
{
    public class AxEmployeeService
    {
        public List<Employee> Select()
        {

            return null;
        }

        public List<Employee> Select(Dictionary<String, String> criteria)
        {
            return null;
        }

        public Employee FindById(String id)
        {
            return null;
        }

        public List<Employee> FindByDepartement(Department department)
        {
            Employee employee = new Employee();
            Dictionary<String, String> criteria = new Dictionary<string,string>();
            criteria.Add(employee.ColumnName(Employee.Columns.Department), department.Id.ToString());

            return Select(criteria);
        }


    }
}