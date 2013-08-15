package com.example.tour;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class Tour extends Activity {

	
	
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.tour);
        
        
        Button b1= (Button) findViewById(R.id.button1);
        final Intent intent = new Intent(Tour.this,Locations.class);
        
        b1.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				startActivity(intent);
				
			}
		});	
        
			
			   
        
     
        
    }

    
}
