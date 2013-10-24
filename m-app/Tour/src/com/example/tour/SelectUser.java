package com.example.tour;


import java.util.zip.Inflater;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.view.View.OnClickListener;
import android.widget.ImageButton;
import android.widget.TextView;

public class SelectUser extends Activity {

	
	
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		this.requestWindowFeature(Window.FEATURE_NO_TITLE);
		setContentView(R.layout.select_user);
		
		
		
		
		
		ImageButton ServiceProvider = (ImageButton) findViewById(R.id.imageButton1);
		ImageButton Traveller = (ImageButton) findViewById(R.id.imageButton2);
		
		final Intent intent = new Intent(SelectUser.this,UserMenu.class);
		Traveller.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				
				startActivity(intent);
			}
		});
		
		final Intent intent2 = new Intent(SelectUser.this,ServieProvider_menu.class);
		ServiceProvider.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				startActivity(intent2);
			}
		});
		
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// TODO Auto-generated method stub
	 MenuInflater inflater = getMenuInflater();
	 inflater.inflate(R.menu.menu1, menu);
		return true;
	}
	
	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// TODO Auto-generated method stub
		if(item.getItemId() == R.id.exit){
			
			AlertDialog.Builder builder = new AlertDialog.Builder(SelectUser.this);
			builder.setMessage("Are you sure you want to exit ?");
			builder.setCancelable(false);
			
			builder.setPositiveButton("yes", new DialogInterface.OnClickListener() {
				
				@Override
				public void onClick(DialogInterface dialog, int which) {
					// TODO Auto-generated method stub
					
					Intent intent = new Intent(Intent.ACTION_MAIN);
					intent.addCategory(Intent.CATEGORY_HOME);
					intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
					startActivity(intent);
					
				}
			});
			
			builder.setNegativeButton("No",new DialogInterface.OnClickListener() {
				
				@Override
				public void onClick(DialogInterface dialog, int which) {
					// TODO Auto-generated method stub
					
				}
			});
			
			
			AlertDialog  alet = builder.create();
			alet.show();
			
		}
		return super.onOptionsItemSelected(item);
	}

    
}
