package com.example.redcap.redcap;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity  implements View.OnClickListener{

    public boolean logging = true;
    //~// Widgets //~//
    protected ImageView mAmbassadorButt;
    protected ImageView mIncidentButt;
    protected ImageView mForceButt;
    protected EditText mUserNameText;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        if (logging) Log.d("OnCreate", "Start");
        //System.out.println("OnCreate . . . Start");
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        // Initialize Widgets //
        mAmbassadorButt = (ImageView) findViewById(R.id.ambassador);
        mAmbassadorButt.setOnClickListener(this);

        mIncidentButt = (ImageView) findViewById(R.id.incident);
        mIncidentButt.setOnClickListener(this);

        mForceButt = (ImageView) findViewById(R.id.use_of_force);
        mForceButt.setOnClickListener(this);

        mUserNameText = (EditText) findViewById(R.id.username);

    }

    @Override
    protected void onResume() {
        if (logging) Log.d("C2_EnterLoC", "Start: onResume()");
        super.onResume();
        mAmbassadorButt.setImageResource(R.drawable.ambassador_button);
        mIncidentButt.setImageResource(R.drawable.incident_button);
        mForceButt.setImageResource(R.drawable.use_of_force_button);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onClick(View view) {
        if (logging) Log.d("onClick", "Start");

        switch (view.getId()) {
            case R.id.ambassador:
                Log.d("Clicked", "ambassador_button");
                mAmbassadorButt.setImageResource(R.drawable.ambassador_button_clicked);
                Intent intent = new Intent(MainActivity.this, AmbassadorService.class);
                intent.putExtra("RedCapName", mUserNameText.getText().toString());
                startActivity(intent);
                break;

            case R.id.incident:
                Log.d("Clicked", "incident_button");
                mIncidentButt.setImageResource(R.drawable.incident_button_clicked);
                Intent intent2 = new Intent(MainActivity.this, Incident.class);
                intent2.putExtra("RedCapName", mUserNameText.getText().toString());
                startActivity(intent2);
                break;

            case R.id.use_of_force:
                Log.d("Clicked", "use_of_force_button");
                mForceButt.setImageResource(R.drawable.use_of_force_button_clicked);
                Intent intent3 = new Intent(MainActivity.this, UseOfForce.class);
                intent3.putExtra("RedCapName", mUserNameText.getText().toString());
                startActivity(intent3);
                break;

        }

    }
}
