package com.example.tour;

import java.text.ChoiceFormat;
import java.util.List;

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

public class Prefer extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.prefer);
		
		final ListView list2 = (ListView) findViewById(R.id.listView2);
		Button b3 = (Button) findViewById(R.id.button3);
		
		String[] ClientPreference = new String[]{"Wild Life","Traditional","Food & Dining","Adventure Tours","Beach Holidays","Shoping","Nigth Life"}; 
		
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
	
	

}
