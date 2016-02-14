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
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.io.IOException;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.HashMap;

public class AmbassadorService extends AppCompatActivity implements View.OnClickListener{
    private boolean logging = true;
    public String mResponse = "unitialized";
    protected String mName = "Unspecified";

    private Spinner mType;
    private EditText mBusiness;
    private EditText mComments;
    private ImageView mSubmit;



    protected void onCreate(Bundle savedInstanceState) {
        if (logging) Log.d("ambassador_service", "Start: onCreate()");//!
        super.onCreate(savedInstanceState);
        setContentView(R.layout.ambassador_service);//!

        // Initialize Widgets //
        mType = (Spinner) findViewById(R.id.am_type_spinner); //!
        mBusiness = (EditText) findViewById(R.id.am_business); //!
        mComments = (EditText) findViewById(R.id.am_comments); //!

        mSubmit = (ImageView) findViewById(R.id.am_submit); //!

        // Set Listeners
        mSubmit.setOnClickListener(this);



    }



    @Override
    protected void onResume() {
        if (logging) Log.d("ambassador_service", "Start: onResume()");//!
        super.onResume();
        mSubmit.setImageResource(R.drawable.redcapbuttonsubmit);
        // Get the game state sent from the FirstActivity
        Intent intent = getIntent();
        if (null != intent) {
            mName = intent.getStringExtra("RedCapName");
        }

    }

    public void onClick(View view)
    { if (logging) Log.d("onClick", "Start");
        if (view.getId() == R.id.am_submit) { //!
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
        // Data
        String name = mName; // red cap's name
        String category = "Ambassador Service"; //!
        String type = mType.getSelectedItem().toString();;
        String business = mBusiness.getText().toString();
        String comments = mComments.getText().toString();
        String police = "No";   //!

        HttpRequest mReq = new HttpRequest();
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
