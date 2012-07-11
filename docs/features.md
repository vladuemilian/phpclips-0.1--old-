PHPClips project
=================
 
Version 1.0
=================
 
List of features:
=================
 
 
1 Users Features
=================
* Users can register
* Users can login
 	* Each user has a channel
 		* In the channel will be displayed all videos uploaded by user
 	* Channels 
  		* Users can subscribe to others channels
  		* Subscribed channels videos will appear firstly in /videos 
 	* A user can add a video to favorite
  	* A user can create playlists
  	* Playlists can be:
  		* Public
  		* Private
 	* #TODO: options on playlists ( eg: shuffle )
  	* A user can comment on a video
  	* A user can upload videos via:
  		* embedded via:
  			* youtube
  			* #TODO: other web sites
  		* local from personal computer
  	* A user can like or dislike a video
  	* A user can change personal details
  		* password
		* name
		* email


		* interests
  	* Users can be administrators - access to the backend of the web site (/admin)
 
2 Categories Features
==================
* A category have:
	* Title
 	* Description
* A category can contain subcategories 	
 	
3 A page of viewing the video
==================
* A page of viewing the video
 	* A section for video rating ( like / dislike )
	* A section for adding video to favourite
	* A section for adding video to a specified playlist ( a list with all playlist will be showed on click )
	* A section for video commenting
	* A section with other suggested videos
	* A section with same uploader's videos

4 A page wigh category
==================	
* A page with categories within the videos belongs

5 A page with channels
==================
* A page with channels, ordered by relevance
	* Every channel will have a rating system based on videos views, subscribers number and videos rating.

6 A page with community
==================
* A page with community
	* A page with users randomly listed ( or latest registered users )
	* A page with latest playlists
 	
7 A page with videos
================== 	
* A page with videos
 	* Users which browse this page will see videos suggest by:
 		* subscribed channels
 		* tags - if a user search for "music", so the videos will be filter by this tag
 		* latest browsed categories		
 
8 Administrator Panel 
==================
* Administrator Panel features
  	* Admins can manage users
  		* Fully access to edit details
  		* Suspend, delete and lock a user
  	* Admins can fully manage videos
		* Delete videos
		* Edit videos title, description
  	* Admins can manage categories:
  		* delete
  		* add
  		* edit
  	* Admins can clear cache
	* Admins can set max size limit for uploaded videos			
 
 
Legend
==================
 
#TODO - things to do in next releases
#MORE - there are miss some things that's will be needed in current release

Notes
==================
* The priority of the features if rom top to bottom. The highest priority is 1.
