using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace ServiceUtils.Database
{
    public partial class DbConfigForm : Form
    {
        private bool saved = false;
        private bool connectionValid = false;
        private Dictionary<String, DbProvider> providerMap;

        public DbConfigForm()
        {
            InitializeComponent();
        }

        private void ShowInfoMessage(String title, String message)
        {
            MessageBox.Show(message, title, MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void ShowErrorMessage(String title, String message)
        {
            MessageBox.Show(message, title, MessageBoxButtons.OK, MessageBoxIcon.Error);
        }

        private void DbConfigForm_Load(object sender, EventArgs e)
        {
            providerMap = new Dictionary<string, DbProvider>();
            providerMap.Add("", DbProvider.Unregistered);
            providerMap.Add("MySQL", DbProvider.MySQL);
            providerMap.Add("PostgreSQL", DbProvider.PostgreSQL);
            providerMap.Add("Oracle", DbProvider.Oracle);
            providerMap.Add("SQL Server", DbProvider.SQLServer);
            providerMap.Add("NoSQL", DbProvider.NoSQL);

        }

        private void TestConnection_Click(object sender, EventArgs e)
        {
            try
            {
                DbAuthentication auth = new DbAuthentication(
                    hostText.Text,
                    usernameText.Text,
                    passwordText.Text,
                    dbNameText.Text,
                    Convert.ToInt16(portText.Text),
                    providerMap[providerSelector.SelectedItem.ToString().Trim()]);

                if (ConnectionManager.Instance.OpenConnection(auth))
                {
                    connectionValid = true;
                    ShowInfoMessage("Operation Success!", "Connection to database host successful!");
                    if (MessageBox.Show("Do you want to save this connection setting?", "Confirm Save", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
                    {
                        auth.Save();
                        ShowInfoMessage("Operation Success!", "Saving database setting successful!");
                    }
                    ConnectionManager.Instance.CloseConnection();
                    saved = true;
                    this.Close();
                }
                else
                {
                    ShowInfoMessage("Operation Failed!", "Connection to database host failed!");
                }
            }
            catch (Exception ex)
            {
                ShowErrorMessage(ex.Message, ex.StackTrace);
            }

        }

        private void DbConfig_OnClosing(object sender, FormClosingEventArgs e)
        {
            if (!connectionValid)
            {
                if (MessageBox.Show("You don't have any valid connection setting. Do you still want to close the dialog?", "Confirm Close", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.No)
                {
                    e.Cancel = true;
                    return;
                }
            }
            else
            {
                if (!saved)
                {
                    if (MessageBox.Show("Your connection setting is a valid setting but it haven't saved yet. Do you still want to close the dialog?", "Confirm Close", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.No)
                    {
                        e.Cancel = true;
                        return;
                    }
                }
            }
        }

    }
}
