package com.example.tour;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.text.Editable;
import android.view.View;
import android.view.Window;
import android.view.View.OnClickListener;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioGroup;
import android.widget.Spinner;

public class Tour extends Activity {

  String country,startDate,endDate,members,res;
    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
      //  requestWindowFeature(Window.FEATURE_CUSTOM_TITLE);
      //  getWindow().setFeatureInt(Window.FEATURE_CUSTOM_TITLE, R.drawable.title);
        setContentView(R.layout.tour);
      
        // define 
        EditText ed1 = (EditText) findViewById(R.id.editText1);
        EditText ed2 = (EditText) findViewById(R.id.editText2);
       // RadioGroup rg = (RadioGroup) findViewById(R.id.radioGroup1); 
        Button b1= (Button) findViewById(R.id.button1);
     
        // spinner 
         Spinner spinner = (Spinner) findViewById(R.id.spinner1);
         
        String[] countries = {"Sri Lanka","India","China","Japan","Korea","Vietnam","Bangladesh","Pakistan"};
        ArrayAdapter<String> adapter= new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item,countries);
        adapter.setDropDownViewResource(android.R.layout.simple_dropdown_item_1line);
        spinner.setAdapter(adapter);
      //  spinner1.setOnItemSelectedListener((OnItemSelectedListener) new Tour());
       
     // getting data  
        
   startDate = ed1.getText().toString();
     endDate = ed2.getText().toString();
       
    
     
        // define Intent
        final Intent intent = new Intent(Tour.this,Locations.class);
      
        // button Action
        b1.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				
				
	Mytask1  Mk1 = new Mytask1();
	Mk1.execute("http://traveller-viento.rhcloud.com/users/add");
				    // Start intent
				  
				startActivity(intent);
				
			}
		});	
        
			
			   
        
     
        
    }

   

		
    private class Mytask1 extends AsyncTask<String, Void, String>{

		@Override
		protected String doInBackground(String... url) {
			// TODO Auto-generated method stub
			

			  HttpClient httpclient = new DefaultHttpClient();
			    HttpPost httppost = new HttpPost(url[0]);
	          
			    try {
			        // Add Application data
			        List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(2);
			        nameValuePairs.add(new BasicNameValuePair("urN","chan"));
			        nameValuePairs.add(new BasicNameValuePair("scrn", startDate));
			        nameValuePairs.add(new BasicNameValuePair("mail", endDate));
			        nameValuePairs.add(new BasicNameValuePair("UrTy",members));
			        nameValuePairs.add(new BasicNameValuePair("submit","1"));
			        
			        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

			        // Execute HTTP Post Request
			        HttpResponse response = httpclient.execute(httppost);
			        res = response.toString();
			        
			  //   System.out.print(response);
			        
			    } catch (ClientProtocolException e) {
			        // TODO Auto-generated catch block
			    } catch (IOException e) {
			        // TODO Auto-generated catch block
			    } 
			return res;
		}
    	
    	@Override
    	protected void onPostExecute(String result) {
    		// TODO Auto-generated method stub
    		super.onPostExecute(result);
    	}
		
    }
    
}

