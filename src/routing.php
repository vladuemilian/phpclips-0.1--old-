<?php




/*
 * Main controller of application 
 *
 * It will check if the input are defined in 'extensions.php' - after it loads the bootstrap.php for each extension 
 *
 * Standard for bootstrap is: /extensions/$ext/bootstrap.php where $ext is the input
*/



dispatch('/','index');
dispatch('/channels','channels');
dispatch('/community','community');


dispatch('/system/streaming/:id','video_streaming');
//video routing
dispatch('/video/:id/:video_title','to_video');



dispatch('/videos/:id','videos');

//category routing
dispatch('/categories','to_categories');
dispatch('/cat/:id/**','to_cat');
dispatch('/cat/:id/:cat_title/:arg','to_cat');


//users routing

	
dispatch('/user/register','user_register');
dispatch_post('/user/register','user_register');

dispatch('/user/login','user_login');
dispatch_post('/user/login','user_login');
dispatch('/user/logout','user_logout');



dispatch('/upload','user_upload');
dispatch('/upload/video','user_upload_video');
dispatch_post('/upload/video','user_upload_video');
dispatch('/upload/remote-video','user_upload_remote_video');
dispatch_post('/upload/remote-video','user_upload_remote_video');
//user panel routing
if($user->is_auth()){
	dispatch('/user/panel','user_panel_index');
	dispatch('/user/panel/index','user_panel_index');
	dispatch('/user/panel/private-messages','user_panel_pm');
	dispatch('/user/panel/friends','user_panel_friends');
	dispatch('/user/panel/playlists','user_panel_playlists');
	dispatch('/user/panel/profile','user_panel_profile');
	
	dispatch('/user/settings','user_settings');
	dispatch_post('/user/settings','user_settings');

	
	//user admin panel routing
	if($user->is_admin()){
		dispatch('/admin','admin_index');
		dispatch('/admin/cache','admin_cache');
		dispatch_post('/admin/cache','admin_cache');
		dispatch('/admin/cache/refresh-all','admin_cache_refresh_all');
		dispatch('/admin/categories','admin_categories');
	}
	//end user admin panel routing
}

//comunity
dispatch('/community/users','community_users');
dispatch('/community/users/:id','community_users');
dispatch('/user/view/:id/:username','to_user');
dispatch('/community/playlists','community_playlists');








