# tao-redhat
Community Notification Application

iHeartRedCaps – Readme

	This project supports real-time issue reporting, in-depth analytics, and information sharing for the Downtown Guides aka ‘red caps’ of Eugene, Oregon. 

The primary components of this project include: 
-Marketing site
-Back end databases
-Mobile app

	Marketing site:
The public facing website prompt engagement and community awareness by prominently displaying pertinent information about the organization’s role within the community. The site is built on the WordPress platform which is familiar to the organization. The flexible design allows for and expanding to list of news, safety resources, community partners, and plans for the future.


	Databases:
The back end MySQL databases provide a secure location for storing reports and their related details. Issues are categorized by type and severity, and include dimensions for date, time, geolocation, reporter, businesses affected, as well as notes, images, and information about whether or not police contact initiated. All of this stored data can be segmented for various analytics and reporting purposes.

	WordPress Plugin:
This fully custom PHP and MYSQL plugin provides REST API for the app-to-database connection. The specified API endpoints could be expanded to allow for open data sharing in the future. The plugin also adds a reporting page within the manager-level WordPress Dashboard to chart and visualize the data collected from app users in the field. 


	Mobile App:
This is a realtime data reporting tool for users in the field. Effectively creates real-time reports to inform the database. Captures the most important information quickly on-site. Open for the Red Caps and can be expanded for community use.
