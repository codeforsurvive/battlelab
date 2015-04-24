using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ITPI.Net.Utils
{
    public class Logger
    {
        private static String GenerateLogMessage(String events, String message)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append(String.Format("Logging Time: {0}\n", DateTime.Now.ToString()));
            sb.Append(String.Format("Event: {0}\n", events));
            sb.Append(String.Format("Message:\n{0}\n", message));
            sb.Append(Environment.NewLine);
            return sb.ToString();
        }


        public static void LogToConsole(String logMessage)
        {
            Console.WriteLine("{0}{1}", logMessage, Environment.NewLine);
        }

        public static void LogToDefaultFile(String logMessage)
        {
            LogToFile(logMessage, ITPI.Net.Utils.Configuration.ConfigurationSetting.Instance.LogFilePath);
        }

        public static void LogToFile(String logMessage, String path)
        {
            try
            {
                System.IO.File.AppendAllText(path, logMessage);
            }
            catch (Exception ex)
            { 
                LogToConsole(ex.ToString(), String.Format("{0}\n{1}", ex.Message, ex.StackTrace));
            }
        }

        public static void LogToConsole(Exception ex)
        {
            LogToConsole(ex.ToString(), String.Format("{0}\n{1}", ex.Message, ex.StackTrace));
        }

        public static void LogToDefaultFile(Exception ex)
        {
            LogToDefaultFile(ex.ToString(), String.Format("{0}\n{1}", ex.Message, ex.StackTrace));
        }


        public static void LogToConsole(String events, String message)
        {
            LogToConsole(GenerateLogMessage(events, message));
        }

        public static void LogToDefaultFile(String events, String message)
        {
            LogToFile(GenerateLogMessage(events, message), Configuration.ConfigurationSetting.Instance.LogFilePath);
        }

        public static void LogToFile(String events, String message, String path)
        {
            LogToFile(GenerateLogMessage(events, message), path);
        }

        public static void LogToFile(Exception ex, String path)
        {
            LogToFile(ex.ToString(), String.Format("{0}\n{1}", ex.Message, ex.StackTrace), path);
        }

    }
}
