package com.example.tour;


import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.StatusLine;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;



import android.R.color;
import android.app.Activity;
import android.content.Intent;
import android.graphics.drawable.ColorDrawable;
import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

public class Locations extends Activity {

	int count=0;
	String[] KeepLocations;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.location);
		
		String readTwitterFeed = readTwitterFeed();
		String[] jsonString = null;
		
		
try{
	    	
	    	JSONObject mainJson = new JSONObject(readTwitterFeed);
	    	JSONArray jA = mainJson.getJSONArray("Locations");
	    	jsonString = new String[jA.length()];
	    	for(int i=0; i<jA.length();i++){
	    		//tv.append(jA.getString(i));
	    		jsonString[i]= jA.getString(i);
	    	}
	    	for(int j=0; j<jsonString.length;j++){
	    	//tv.setText(jsonString[j]);
	    	}
	    	//tv.setText(mainJson.getString("Locations"));
	    }catch (Exception e) {	    
	    	//tv.setText("parsing failed");
	      e.printStackTrace();
	    }
		
		
		final ListView list = (ListView) findViewById(R.id.listView1);
		//final String[] array1 = new String[]{"Colombo","Mt.Lavinia","NuwaraEliya","Sigiriya","Bandarawela","Galle","Jaffna","Hikkaduwa","Kandy"};
		KeepLocations = new String[jsonString.length] ;
		
		ArrayAdapter<String> adapter1 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_multiple_choice,android.R.id.text1,jsonString);
		list.setAdapter(adapter1);
		list.setChoiceMode(list.CHOICE_MODE_MULTIPLE);
		list.setDivider(new ColorDrawable(color.white));
		list.setDividerHeight(5);
		list.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> arg0, View arg1, int position,
					long arg3) {
				// TODO Auto-generated method stub
				
				String itemValue = (String)list.getItemAtPosition(position);
				
				Toast.makeText(getApplicationContext(), "You have Selected :"+itemValue, Toast.LENGTH_LONG).show();
				
				KeepLocations[count]=itemValue;
				count++;	
				
			}	
		});
		
		

			
		Button b3= (Button) findViewById(R.id.button3);
		 final Intent intent = new Intent(Locations.this,Prefer.class);
		
		
		
		b3.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				String res = null;
				  HttpClient httpclient = new DefaultHttpClient();
				    HttpPost httppost = new HttpPost("http://traveller-viento.rhcloud.com/locations/find");
		          
				    try {
				        // Add your data
				        List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(2);
				        
				        for(int j=0;j<=KeepLocations.length;j++) {
				        	
				        nameValuePairs.add(new BasicNameValuePair("lname",KeepLocations[j] ));}
				        
				        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

				        // Execute HTTP Post Request
				        HttpResponse response = httpclient.execute(httppost);
				        
				        
				    //    tx.setText(response.getStatusLine().toString());
				        res = response.toString();
				      Log.i(Locations.class.getName(), res.toString());  
				  //   System.out.print(response);
				        
				    } catch (ClientProtocolException e) {
				        // TODO Auto-generated catch block
				    	Log.e(Locations.class.getName(),e.getMessage());
				    	
				    } catch (IOException e) {
				        // TODO Auto-generated catch block
				    	Log.e(Locations.class.getName(),e.getMessage());
				    }
				
				//if(!(res==null)){
				
				startActivity(intent);
				
			}
		});
		
	}
	
	 public String readTwitterFeed() {
		    StringBuilder builder = new StringBuilder();
		    HttpClient client = new DefaultHttpClient();
		    HttpGet httpGet = new HttpGet("http://traveller-viento.rhcloud.com/locations/find");
		    try {
		      HttpResponse response = client.execute(httpGet);
		      StatusLine statusLine = response.getStatusLine();
		      int statusCode = statusLine.getStatusCode();
		     // Log.i(Try_json.class.getName(), String.format("%d",statusCode));
		      //if(statusCode){
		      //tv.setText(String.format("%d",statusCode));
		     // }
		      if (statusCode == 200) {
		        HttpEntity entity = response.getEntity();
		        InputStream content = entity.getContent();
		        BufferedReader reader = new BufferedReader(new InputStreamReader(content));
		        String line;
		        while ((line = reader.readLine()) != null) {
		          builder.append(line);
		         // tv.append(line+" new \n");
		        }
		      } else {
		        Log.e(Locations.class.toString(), "Failed to download file");
		      }
		    } catch (ClientProtocolException e) {
		      e.printStackTrace();
		    } catch (IOException e) {
		      e.printStackTrace();
		    }
		    return builder.toString();
		  }
			
	
	}
