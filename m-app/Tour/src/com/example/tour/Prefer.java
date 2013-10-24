package com.example.tour;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.text.ChoiceFormat;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.StatusLine;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONObject;

import android.R.color;
import android.app.Activity;
import android.content.Intent;
import android.graphics.drawable.ColorDrawable;
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

public class Prefer extends Activity {

	String preference = getting_Preference();
	String[] ClientPreference = null;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.prefer);
		
		
		try{
			    	
			    	JSONObject JsonObject_1 = new JSONObject(preference);
			    	JSONArray JsonArray_1 = JsonObject_1.getJSONArray("Locations");
			    	
			    	ClientPreference = new String[JsonArray_1.length()];
			    	
			    	for(int i=0; i<JsonArray_1.length();i++){
			    		//tv.append(jA.getString(i));
			    		ClientPreference[i]= JsonArray_1.getString(i);
			    	}
			    	
			    	for(int j=0; j<ClientPreference.length;j++){
			    	//tv.setText(jsonString[j]);
			    	}
			    	//tv.setText(mainJson.getString("Locations"));
			    }catch (Exception e) {	    
			    	//tv.setText("parsing failed");
			      e.printStackTrace();
			    }
		
		
		final ListView list2 = (ListView) findViewById(R.id.listView2);
		list2.setDivider(new ColorDrawable(color.black));
		list2.setDividerHeight(1);
		Button b3 = (Button) findViewById(R.id.button3);
	//	String[] ClientPreference = new String[]{"Wild Life","Traditional","Food & Dining","Adventure Tours","Beach Holidays","Shoping","Nigth Life"}; 
		
		ArrayAdapter<String>adapter2 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_multiple_choice,android.R.id.text1,ClientPreference);
		
		list2.setAdapter(adapter2);
		list2.setChoiceMode(list2.CHOICE_MODE_MULTIPLE);
		
		list2.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> arg0, View arg1, int Position,
					long arg3) {
				
				String itemValue = (String) list2.getItemAtPosition(Position);
				
				Toast.makeText(getApplicationContext(), "You have selected :"+itemValue,Toast.LENGTH_LONG).show();
				
				
			}
		});
		
		b3.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				 final Intent intent = new Intent(Prefer.this,Services.class);
				 
				 startActivity(intent);
				
			}
		});
		
		
	}
	
	 public String getting_Preference() {
		    StringBuilder builder = new StringBuilder();
		    HttpClient client = new DefaultHttpClient();
		    HttpGet httpGet = new HttpGet("http://traveller-viento.rhcloud.com/preferances/find");
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
