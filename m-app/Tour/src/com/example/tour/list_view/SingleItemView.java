package com.example.tour.list_view;

import com.example.tour.R;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

public class SingleItemView extends Activity {
	
	
	// Declare Variables
	TextView txtrank;
	TextView txtcountry;
	TextView txtpopulation;
	ImageView imgflag;
	String[] rank;
	String[] country;
	String[] population;
	int[] flag;
	int position;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.custom_single_item);
		// Retrieve data from MainActivity on listview item click
			//	Intent i = getIntent();
				// Get a single position
			//	position = i.getExtras().getInt("position");
				// Get the list of rank
			//	rank = i.getStringArrayExtra("rank");
				// Get the list of country
			//	country = i.getStringArrayExtra("country");
				// Get the list of population
			//	population = i.getStringArrayExtra("population");
				// Get the list of flag
			//	flag = i.getIntArrayExtra("flag");

				// Locate the TextViews in singleitemview.xml
				txtrank = (TextView) findViewById(R.id.single_textView1);
				//txtcountry = (TextView) findViewById(R.id.country);
			//	txtpopulation = (TextView) findViewById(R.id.population);
				
				// Locate the ImageView in singleitemview.xml
			

				// Load the text into the TextViews followed by the position
				txtrank.setText(rank[position]);
			//	txtcountry.setText(country[position]);
			//	txtpopulation.setText(population[position]);
				
				// Load the image into the ImageView followed by the position
			//	imgflag.setImageResource(flag[position]);
	}
	
	

}
