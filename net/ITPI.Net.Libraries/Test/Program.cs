using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Text;

namespace Test
{
    class Program
    {
        static void Main(string[] args)
        {
            String[,] data = new String[,]
            {
              //{ id, label, level, parent}
                {"1", "Elektronik", "1", "0"},
                {"2", "Alat Berat", "1", "0"},
                {"3", "Kendaraan", "1", "0"},
                {"4", "TV", "2", "1"},
                {"5", "PC", "2", "1"},
                {"6", "Kulkas", "2", "1"},
                {"7", "LG", "3", "4"},
                {"8", "Sony", "3", "4"},
                {"9", "Notebook", "4", "5"},
                {"10", "Desktop", "4", "5"},
                {"11", "Mobil", "1", "0"}
            };
            /**List<Node> dataTable = new List<Node>();
            for(int i = 0; i < data.GetLength(0); i++)
            {
                Node node = new Node();
                node.Id = Convert.ToInt32(data[i, 0]);
                node.Label = data[i, 1];
                node.Level = Convert.ToInt32(data[i, 2]);
                node.Parent = Convert.ToInt32(data[i, 3]);
                //Console.WriteLine(node.Json);
                dataTable.Add(node);

            }

            int maxLevel = dataTable.Max(x => x.Level);
            Console.WriteLine("Max Level: {0}", maxLevel);
            **/

            WebClient client = new WebClient();
            client.DownloadFile("http://localhost:8888/Test.docx", @"D:/Test.docx");
            Console.WriteLine("Download completed!");

            Console.ReadKey();

        }

        class Node
        {
            private int id;
            private int level;
            private String label;
            private int parent;
            private List<Node> children;

            public Node()
            {
                children = new List<Node>();
            }

            public void AddChild(Node child)
            {
                children.Add(child);
            }

            public int Id
            {
                set { id = value; }
                get { return id; }
            }

            public int Level
            {
                set { level = value; }
                get { return level; }
            }

            public String Label
            {
                set { label = value; }
                get { return label; }
            }

            public int Parent
            {
                set { parent = value; }
                get { return parent; }
            }

            public List<Node> Children
            {
                get { return children; }
            }


            public String Json
            {
                get
                {
                    StringBuilder sb = new StringBuilder();

                    sb.Append("{");
                    sb.Append(String.Format("id: {0},", id));
                    sb.Append(String.Format("level: {0},", level));
                    sb.Append(String.Format("label: '{0}',", label));
                    sb.Append("children: [");
                    StringBuilder sb2 = new StringBuilder();
                    foreach (Node n in children)
                    {
                        sb2.Append(String.Format("{0},", n.Json));
                    }
                    if (children.Count > 0)
                    {
                        sb2.Remove(sb2.Length - 1, 1);
                        sb.Append(sb2.ToString());
                    }
                    sb.Append("]");
                    sb.Append("}");

                    return Newtonsoft.Json.Linq.JObject.Parse(sb.ToString()).ToString();
                }
            }
        }

        class Tree
        {
            Node root;
            List<Node> topLevel = new List<Node>();

            public Tree()
            {
                root = new Node();
                topLevel = new List<Node>();
            }



        }
    }
}