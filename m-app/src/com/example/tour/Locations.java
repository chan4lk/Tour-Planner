package com.example.tour;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

public class Locations extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.location);
		
		final ListView list = (ListView) findViewById(R.id.listView1);
		
		String[] array1 = new String[]{"Colombo","Mt.Lavinia","NuwaraEliya","Sigiriya","Bandarawela","Galle","Jaffna","Hikkaduwa","Kandy"};
		
		ArrayAdapter<String> adapter1 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_multiple_choice,android.R.id.text1,array1);
		list.setAdapter(adapter1);
		list.setChoiceMode(list.CHOICE_MODE_MULTIPLE);
		
		list.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> arg0, View arg1, int position,
					long arg3) {
				// TODO Auto-generated method stub
				
				String itemValue = (String)list.getItemAtPosition(position);
				
				Toast.makeText(getApplicationContext(), "You have Selected :"+itemValue, Toast.LENGTH_LONG).show();
				
				
				
			}
		});
		
		Button b3= (Button) findViewById(R.id.button3);
		 final Intent intent = new Intent(Locations.this,Prefer.class);
		
		
		
		b3.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				startActivity(intent);
				
			}
		});
		
	}
	

}
