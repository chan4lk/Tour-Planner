package com.example.tour;

import com.example.tour.list_view.ListActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.Window;
import android.widget.ImageButton;

public class UserMenu extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
	//	requestWindowFeature(Window.FEATURE_CUSTOM_TITLE);
	//	getWindow().setFeatureInt(Window.FEATURE_CUSTOM_TITLE, R.drawable.title);
		
		setContentView(R.layout.user_menu);
		
		ImageButton im1 = (ImageButton) findViewById(R.id.imageButton3);
		ImageButton im2 = (ImageButton) findViewById(R.id.imageButton4);
		ImageButton im3 = (ImageButton) findViewById(R.id.imageButton2);
		
		im1.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				Intent myintent = new Intent(UserMenu.this,Tour.class);
				
				startActivity(myintent);
				
			}
		});
		
		im2.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				Intent myintent2 = new Intent(UserMenu.this,ListActivity.class);
				startActivity(myintent2);
			}
		});
		
		im3.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				Intent myintent3 = new Intent(UserMenu.this,Map.class);
				startActivity(myintent3);
				
			}
		});
		
	}
}
