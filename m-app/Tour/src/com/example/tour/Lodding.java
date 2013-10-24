package com.example.tour;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Window;
import android.view.WindowManager;

public class Lodding extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);

this.requestWindowFeature(Window.FEATURE_NO_TITLE);

//Remove notification bar
//this.getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
		
		setContentView(R.layout .lodding);

		
		Thread thread1 = new Thread(){
			
		 public void run(){
			 try{
				 sleep(5000);
			 }catch(InterruptedException e){
				 
				 e.printStackTrace();
			 }finally {
				 
				 Intent intent = new Intent(Lodding.this,SelectUser.class);
				 startActivity(intent);
				 
			 }
			 
			 
		 }
			
		} ; thread1.start();
		

		
	}

	
}
