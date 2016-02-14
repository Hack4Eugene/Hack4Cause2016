<?php
/*
Plugin Name: I 💖 Red caps
Plugin URI: http://antonioortegajr.com
Description: This plugin creates a custom REST API Endpoints for I Heart Red caps
Version: 0.0.1
Author: Team Dumpster Fire
Author URI: http://antonioortegajr.com
License: GPL2
*/




function red_caps_create_db() {

  global $wpdb;

$table_name = $wpdb->prefix . 'red_caps_data';

$sql = 'CREATE TABLE IF NOT EXISTS ' . $table_name . '(
  id INTEGER(10) UNSIGNED AUTO_INCREMENT,
  issue_id INTEGER(10),
  reporter_id INTEGER(10),
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  report_time TIMESTAMP,
  lat DECIMAL(18,12),
  lng DECIMAL(18,12),
  type VARCHAR(255),
  business_name VARCHAR(255),
  notes VARCHAR(255),
  images VARCHAR(255),
  police_contacted BOOLEAN,
  PRIMARY KEY (id) )';

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

}


register_activation_hook( __FILE__, 'red_caps_create_db' );


//add options page
include('wp_red_caps_options.php');

add_action( 'rest_api_init', function () {
  //set up routes
    register_rest_route( 'wp_red_caps/v1', '/incident', array(
        'methods' => 'POST',
        'callback' => 'wp_red_caps_func',
    ) );
    register_rest_route( 'wp_red_caps/v1', '/users', array(
        'methods' => 'GET',
        'callback' => 'wp_red_caps_func2',
    ) );
} );


//private route
function wp_red_caps_func( WP_REST_Request $request ){
//get headers to look for a key
$headers = array(getallheaders());

$api_key = $headers[0]["apikey"];
//api key from database
$stored_api_key = get_option('wp_red_caps_key');

//evaluate api key
if ($api_key == $stored_api_key) {

global $wpdb;

  $issue_id = $headers[0]["issue_id"];
  $reporter_id = $headers[0]["reporter_id"];
  $report_time = $headers[0]["report_time"];
  $lat = $headers[0]["lat"];
  $lng = $headers[0]["lng"];
  $type = $headers[0]["type"];
  $business_name = $headers[0]["business_name"];
  $notes = $headers[0]["notes"];
  $images = $headers[0]["images"];
  $police_contacted = $headers[0]["police_contacted"];

  $table_name = $wpdb->prefix . 'red_caps_data';

$wpdb->insert(
	$table_name,
	array(
        'id' => '',
	'issue_id' => $issue_id,
	'reporter_id' => $reporter_id,
	'report_time' => $report_time,
       'lat' => $lat,
      'lng' => $lng,
      'type' => $type,
      'business_name' => $business_name,
      'notes' => $notes,
      'images' => $images,
      'police_contacted' => $police_contacted

		)
	);

  $output = array('incident'=>'added');
  return $output;



}
else {
  $output = "{'api_key':'no no no'}";
}
  return $output;
}
?>
