Module: Path Access
Author: Mike Carter <http://www.ixis.co.uk/contact>
D6 port: CSÉCSY László <boobaa@kybest.hu>
D7 port: Chris Burgess <http://www.giantrobot.co.nz/>

Description
===========
The path_access module gives site administrators an additional layer of access control
to all pages of a Drupal site.


Benefits
========
Although a lot of the Drupal modules provide some degree of access control permissions it
never covers all possible requirements users have. Path_access provides the means to
restrict pages based on their path alias - meaning you can lock out certain user role
groups from whole sections of a site using wildcards.


Installation
============
Simply copy path_access folder to the modules directory of your Drupal
installation, and enable it in the administration > build > modules.

Note that path_access is an extension to the path module, which must also
be enabled.


Details
=======
When access is denied to certain users they will see the 403 error 'Access Denied'
page which you have defined in the Drupal core settings.
This can be changed at ?q=admin/settings/error-reporting

By default the module will allow both anonymous and authenticated users to access pages as usual.


Settings
========
You can configure what pages are visible/not visible to each of your user roles
from the Drupal Users Administration section.

Visit ?q=admin/config/people/pathaccess to edit the settings for each role group.

Page visibility configuration is carried out in exactly the same way as block
visibility in Drupal core.


Credits
=======
This module is the work of Mike Carter <http://www.ixis.co.uk/contact>. Please use the Drupal
project issue queue for support queries on usage. http://drupal.org/project/issues/path_access
