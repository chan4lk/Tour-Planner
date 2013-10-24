package com.example.tour;

import android.app.Activity;
import android.os.Bundle;
import android.view.Window;

public class ServieProvider_menu extends Activity{

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		requestWindowFeature(Window.FEATURE_CUSTOM_TITLE);
		getWindow().setFeatureInt(Window.FEATURE_CUSTOM_TITLE, R.drawable.title);
		
		setContentView(R.layout.service_provi_menu);
	}
	

}
