package com.example.tour.list_view;

import com.example.tour.R;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListView;

public class ListActivity extends Activity{
	ListView list;
	ListViewAdapter adapter;
	String[] rank;
	String[] country;
	String[] population;
	int[] flag;
	int[] arrow;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.custom_list1);
		
		rank = new String[] { "Add Tour","Existing Tours"};
		flag = new int[]{};
		
		list = (ListView) findViewById(R.id.listView_custom1);

		// Pass results to ListViewAdapter Class
		adapter = new ListViewAdapter(this, rank, country, population, flag,arrow);
		// Binds the Adapter to the ListView
		list.setAdapter(adapter);
	
		
		list.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> arg0, View view, int position,
					long id) {
				// TODO Auto-generated method stub
				
				
				Intent i = new Intent(ListActivity.this, SingleItemView.class);
				// Pass all data rank
			//	i.putExtra("rank", rank);
				// Pass all data country
			//	i.putExtra("country", country);
				// Pass all data population
			//	i.putExtra("population", population);
				// Pass all data flag
				//i.putExtra("flag", flag);
				// Pass a single position
			//	i.putExtra("position", position);
				// Open SingleItemView.java Activity
				startActivity(i);
				
				
			}
		});
		
	}
	 
}
