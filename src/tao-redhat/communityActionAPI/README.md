# Community Action App API V1

API for this plugin has POST, PUT, and no DELETE or GET at this time.

WP 4.4 or higher is required

An API key is generated and is required on every call.

No other fields are required.

Each field is passed via the request headers.



Endpoints:

/wp-json/wp_red_caps/v1/incident POST - Report and add a new incident.


API header keys:

apikey - String. found in options page of plugin.
id - INTEGER(10) UNSIGNED AUTO_INCREMENT,

issue_id - INTEGER(10),

reporter_id - INTEGER(10),

date - TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

report_time - TIMESTAMP,

lat - DECIMAL(18,12),

lng - DECIMAL(18,12),

type - VARCHAR(255),

business_name - VARCHAR(255),

notes - VARCHAR(255),

images - VARCHAR(255),

police_contacted - BOOLEAN




Return:

When a new incident is added (POSTed) the API will return the new incident ID

Return Example:

{
  'incident'=>'added'

}
