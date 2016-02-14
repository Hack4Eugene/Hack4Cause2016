package com.example.redcap.redcap;
    import java.io.BufferedReader;
    import java.io.DataOutputStream;
    import java.io.InputStreamReader;
    import java.net.HttpURLConnection;
    import java.net.URL;
    import java.net.URLEncoder;
    import javax.net.ssl.HttpsURLConnection;

public class HttpRequest {

    private final String USER_AGENT = "Mozilla/5.0";

    // HTTP GET request
    private void sendGet() throws Exception {

        String url = "http://www.google.com/search?q=mkyong";

        URL obj = new URL(url);
        HttpURLConnection con = (HttpURLConnection) obj.openConnection();

        // optional default is GET
        con.setRequestMethod("GET");

        //add request header
        con.setRequestProperty("User-Agent", USER_AGENT);

        int responseCode = con.getResponseCode();
        System.out.println("\nSending 'GET' request to URL : " + url);
        System.out.println("Response Code : " + responseCode);

        BufferedReader in = new BufferedReader(
                new InputStreamReader(con.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();

        //print result
        System.out.println(response.toString());

    }

    // HTTP POST request
    protected int sendPost(	String name, String cat, String type,
                             String bus, String com, String pol)
            throws Exception {

        String url = "https://docs.google.com/forms/d/1vSbL7ERKmNGs11Y_gfUNfGp8hAePbIU0HbDiPUQBBgA/formResponse";
        URL obj = new URL(url);
        HttpsURLConnection con = (HttpsURLConnection) obj.openConnection();

        //add request header
        con.setRequestMethod("POST");
        con.setRequestProperty("User-Agent", USER_AGENT);
        con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");

        //	String urlParameters = "sn=C02G8416DRJM&cn=&locale=&caller=&num=12345";
        String urlParameters =	"entry.805224102=" + URLEncoder.encode(name, "UTF-8") + "&" +
                "entry.1869128952=" + URLEncoder.encode(cat, "UTF-8") + "&" +
                "entry.103633465=" + URLEncoder.encode(type, "UTF-8") + "&" +
                "entry.1603012942=" + URLEncoder.encode(bus, "UTF-8") + "&" +
                "entry.35040509=" + URLEncoder.encode(com, "UTF-8")   + "&" +
                "entry.1619563378=" + URLEncoder.encode(pol, "UTF-8");

        // Send post request
        con.setDoOutput(true);
        DataOutputStream wr = new DataOutputStream(con.getOutputStream());
        wr.writeBytes(urlParameters);
        wr.flush();
        wr.close();

        int responseCode = con.getResponseCode();
        // System.out.println("\nSending 'POST' request to URL : " + url);
        // System.out.println("Post parameters : " + urlParameters);
        // System.out.println("Response Code : " + responseCode);

        BufferedReader in = new BufferedReader(
                new InputStreamReader(con.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();

        //print result
        // System.out.println(response.toString());

        return responseCode;
    }

}
