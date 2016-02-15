# Team CosmoDojo

##Specs
- Drupal 7.42
- CiviCRM 4.6.12

##Info
* site url: http://coderdojo.cordslatton.com
* 2 included MySQL databases: 
 1. `biodelic_coder_dojo_drupal`
 2. `biodelic_coder_dojo_civicrm`

##Credentials

####htaccess/apache shield
- username: coderdojo
- password: letmein

####Drupal CoderDojo Admin user credentials
- username: CoderDojo Admin
- password: WvrGM8Gfs0fb
- url: http://coderdojo.cordslatton.com/user/login

####MySQL database user credentials
- username: biodelic_dojoadm
- password: ewBZCZBIkQ3Y

##Other
You must create a `tmp` directory on the server 1 folder below the site webroot
the file `/sites/default/civicrm.settings.php` needs to be edited to reflect your file path (and db credentials if you don't use the included ones exactly)