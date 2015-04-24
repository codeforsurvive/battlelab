package org.codeforsurvive.api.twitterapi;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.InetSocketAddress;
import java.net.MalformedURLException;
import java.net.Proxy;
import java.net.URL;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.json.JSONArray;
import org.json.JSONObject;

/**
 *
 * @author Rohmad Raharjo
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       try {
            // TODO code application logic here
            Proxy proxy = new Proxy(Proxy.Type.HTTP, new InetSocketAddress("10.151.34.14", 1111));
            String mainUrl = "http://otter.topsy.com/search.js?q=jokowi&type=tweet&offset=0&perpage=10&window=a&call_timestamp=1429593056595&apikey=09C43A9B270A470B8EB8F2946A9369F3&_=1429593084262";
            URL url = new URL(mainUrl);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("GET");
            connection.connect();
            System.out.println(connection.getResponseCode());

            BufferedReader rd = new BufferedReader(new InputStreamReader(connection.getInputStream()));
            String line;
            String resString = "";
            while ((line = rd.readLine()) != null) {
                resString += line;
            }
            //System.out.println(resString);
            JSONObject response = new JSONObject(resString);
            JSONObject jsonRequest = (JSONObject) response.get("request");
            JSONObject jsonResponse = (JSONObject) response.get("response");
            
            System.out.println(jsonRequest.toString());
            
        } catch (MalformedURLException ex) {
            Logger.getLogger(Main.class.getName()).log(Level.SEVERE, null, ex);
        } catch (IOException ex) {
            Logger.getLogger(Main.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
