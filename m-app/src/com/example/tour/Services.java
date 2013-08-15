package com.example.tour;

import android.app.Activity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.GridView;

public class Services extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.services);
		
		GridView grid1 = (GridView) findViewById(R.id.gridView1);
		
		String[] service = new String[]{"Hotels","Car & Gas","Banks",
				                        "Shoping","Restaurants","Helth Care",
				                        "Entertainment","Food & Drink","Local Services"};
		
		ArrayAdapter<String> adapter2 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_multiple_choice,android.R.id.text1,service);
		
		grid1.setAdapter(adapter2);
		
		
		
		
	}

	
	
}
