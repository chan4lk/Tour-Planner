package com.example.tour.list_view;

import com.example.tour.R;

import android.content.Context;
import android.content.ClipData.Item;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class ListViewAdapter extends BaseAdapter {

	
	Context context;
	String[] rank;
	//String[] country;
	//String[] population;
	int[] flag;
	LayoutInflater inflater;


	public ListViewAdapter(ListActivity listActivity, String[] rank2,
			String[] country, String[] population, int[] flag2, int[] arrow) {
		// TODO Auto-generated constructor stub
	}


	@Override
	public View getView(int position, View convertView, ViewGroup parent) {
		// TODO Auto-generated method stub
		
	
			
			// Declare Variables
			TextView txtrank;
			TextView txtcountry;
			TextView txtpopulation;
			ImageView imgflag;

			inflater = (LayoutInflater) context
					.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
				
			View itemView = inflater.inflate(R.layout.custom_single_item, parent, false);
			
			// Locate the TextViews in listview_item.xml
			txtrank = (TextView) itemView.findViewById(R.id.single_textView1);
			//txtcountry = (TextView) itemView.findViewById(R.id.country);
			//txtpopulation = (TextView) itemView.findViewById(R.id.population);
			// Locate the ImageView in listview_item.xml
		//	imgflag = (ImageView) itemView.findViewById(R.id.flag);

			// Capture position and set to the TextViews
			txtrank.setText(rank[position]);
		//	txtcountry.setText(country[position]);
			//txtpopulation.setText(population[position]);
			
			// Capture position and set to the ImageView
			
		
		return itemView;
	}


	@Override
	public int getCount() {
		// TODO Auto-generated method stub
		return 0;
	}


	@Override
	public Object getItem(int arg0) {
		// TODO Auto-generated method stub
		return null;
	}


	@Override
	public long getItemId(int arg0) {
		// TODO Auto-generated method stub
		return 0;
	}

}
