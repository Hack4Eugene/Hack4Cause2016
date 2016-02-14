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

public class Incident extends AppCompatActivity implements View.OnClickListener{
    private boolean logging = true;

    protected String mName = "Unspecified";
    protected String mResponse = "uninitialized";

    private Spinner mType;
    private EditText mBusiness;
    private CheckBox mPolice;
    private EditText mComments;
    private ImageView mSubmit;



    protected void onCreate(Bundle savedInstanceState) {
        if (logging) Log.d("incident_activity", "Start: onCreate()");//!
        super.onCreate(savedInstanceState);
        setContentView(R.layout.incident_activity);//!

        // Initialize Widgets //
        mType = (Spinner) findViewById(R.id.inc_type); //!
        mBusiness = (EditText) findViewById(R.id.inc_business); //!
        mPolice = (CheckBox) findViewById(R.id.inc_police); //!
        mComments = (EditText) findViewById(R.id.inc_comments); //!

        mSubmit = (ImageView) findViewById(R.id.inc_submit); //!

        // Set Listeners
        mSubmit.setOnClickListener(this);



    }



    @Override
    protected void onResume() {
        if (logging) Log.d("incident_activity", "Start: onResume()");//!
        super.onResume();
        mSubmit.setImageResource(R.drawable.redcapbuttonsubmit);
        // Get the game state sent from the FirstActivity
        Intent intent = getIntent();
        if (null != intent) {
            mName = intent.getStringExtra("RedCapName");
        }

    }

    public void onClick(View view) { //if (logging) Log.d("onClick", "Start");
        if (view.getId() == R.id.inc_submit) { //!
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
        String category = "Incident"; //!
        String type = mType.getSelectedItem().toString();
        String business = mBusiness.getText().toString();
        String comments = mComments.getText().toString();
        System.out.println(mPolice.isPressed());
        String police = ( mPolice.isChecked()) ? "Yes" : "No";   //!

        int returnCode = mReq.sendPost(name, category, type, business, comments, police);

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
