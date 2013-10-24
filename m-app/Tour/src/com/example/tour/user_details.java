package com.example.tour;

import android.app.Activity;
import android.os.AsyncTask;
import android.os.Bundle;

public class user_details extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		//setContentView(R.layout.user_details);
		
		MyTask myTask = new MyTask();
		myTask.execute();
		
	}
	
	private class MyTask extends AsyncTask<String, Void, String>{

		@Override
		protected String doInBackground(String... arg0) {
			// TODO Auto-generated method stub
			return null;
		}
		
		@Override
		protected void onPostExecute(String result) {
			// TODO Auto-generated method stub
			super.onPostExecute(result);
		}
		
	}

}

