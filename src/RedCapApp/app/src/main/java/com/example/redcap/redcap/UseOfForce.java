package com.example.redcap.redcap;

/**
 * Created by joey on 2/13/2016.
 */

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.Toast;

import java.net.URLEncoder;

public class UseOfForce extends AppCompatActivity implements View.OnClickListener{
    private boolean logging = true;

    protected String mName = "Unspecified";
    protected String mResponse = "uninitialized";

    private EditText mBusiness;
    private CheckBox mPolice;
    private EditText mComments;
    private ImageView mSubmit;



    protected void onCreate(Bundle savedInstanceState) {
        if (logging) Log.d("use_of_force_report", "Start: onCreate()");//!
        super.onCreate(savedInstanceState);
        setContentView(R.layout.use_of_force_report);  //!

        // Initialize Widgets //
        mBusiness = (EditText) findViewById(R.id.uof_business); //!
        mPolice = (CheckBox) findViewById(R.id.uof_police); //!
        mComments = (EditText) findViewById(R.id.uof_comments); //!

        mSubmit = (ImageView) findViewById(R.id.uof_submit); //!

        // Set Listeners
        mSubmit.setOnClickListener(this);



    }



    @Override
    protected void onResume() {
        if (logging) Log.d("use_of_force_report", "Start: onResume()");//!
        super.onResume();
        mSubmit.setImageResource(R.drawable.redcapbuttonsubmit);
        // Get the game state sent from the FirstActivity
        Intent intent = getIntent();
        if (null != intent) {
            mName = intent.getStringExtra("RedCapName");
        }

    }

    public void onClick(View view)  { //if (logging) Log.d("onClick", "Start");
        if (view.getId() == R.id.uof_submit) { //!
            mSubmit.setImageResource(R.drawable.redcapbuttonsubmit_clicked);
            Thread t = new Thread( new Runnable() {
                @Override
                public void run() {
                    try {
                        postData();
                    }
                    catch (Exception e){
                        System.out.println("postData() FAILED; error: "+ e);
                    }
                }

            });
            t.start();
            this.finish();

            // Execute some code after 2 seconds have passed
            Handler handler = new Handler();
            handler.postDelayed(new Runnable() {
                public void run() {
                    Toast.makeText(getApplicationContext(), mResponse, Toast.LENGTH_LONG).show();
                }
            }, 1200);
        }
    }

    public void postData() throws Exception {
        HttpRequest mReq = new HttpRequest();
        // Data
        String name = mName; // red cap's name
        String category = "Use of Force"; //!
        String type = "";
        String business = mBusiness.getText().toString();
        String comments = mComments.getText().toString();
        String police = ( mPolice.isChecked() ) ? "Yes" : "No";   //!

        int returnCode = mReq.sendPost(name, category, type, business, comments, police);
        String response ="";

        switch (returnCode){
            case 200: mResponse = "Submission Complete";
                break;
            case 404: mResponse = "ERROR: Cannot Find Server";
                break;
            default: mResponse = "ERROR: Unknown Error Code";
                break;
        }
    }

}
