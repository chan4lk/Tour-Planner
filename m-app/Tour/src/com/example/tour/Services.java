package com.example.tour;



import android.app.Activity;
import android.content.Context;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.BaseAdapter;
import android.widget.GridView;
import android.widget.ImageView;

public class Services extends Activity {
	
	Context context1;

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
		
		grid1.setAdapter(new imageAdapter(this));
		
		
		
		
	}

	public class imageAdapter extends BaseAdapter{
		
		public imageAdapter(Context c){
			
			context1  = c;
		}

		@Override
		public int getCount() {
			// TODO Auto-generated method stub
			return mThumbIds.length;
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

		@Override
		public View getView(int position,View convertView,ViewGroup parent) {
			// TODO Auto-generated method stub
			ImageView imageview1;
	    	if(convertView == null){
	    		
	    		imageview1 = new ImageView(context1);
	    		imageview1.setLayoutParams(new GridView.LayoutParams(85, 85));
	    		imageview1.setScaleType(ImageView.ScaleType.CENTER_CROP);
	    		imageview1.setPadding(8, 8, 8, 8); }
	    	
	    	else{
	    		imageview1 = (ImageView) convertView;
	    	}
	    		
	    	imageview1.setImageResource(mThumbIds[position]);
	    			                    
	        return imageview1;
		}
		
		
	}
	

private Integer[] mThumbIds = {             R.drawable.car, R.drawable.bank,
                                            R.drawable.entertaitment, R.drawable.foods,
                                            R.drawable.health, R.drawable.localservice,
                                            R.drawable.hotel, R.drawable.resturent,
                                            R.drawable.foods,R.drawable.round
                                            };
    	
    }
	

