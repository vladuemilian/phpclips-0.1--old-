<?php

/*
 * Controller for viewing a user
 *
 * Match: /user/view/:user
 *
*/
function to_user(){
	$id = params('id');
	include MODEL_DIR.'/users/view/user.php';
	return render('/users/view/user.tpl.php');
}



/*
 * Controller for user register
 *
 * Match: /user/register
 *
*/
function user_register(){
	//echo 'sss';
	include MODEL_DIR.'/users/actions/register.php';
	return render('/users/actions/register.tpl.php');
}

/*
 * Controller for user loging
 *
 * Match: /user/login
 *
*/
function user_login(){
	include MODEL_DIR.'/users/actions/login.php';
	return render('/users/actions/login.tpl.php');
}

/*
 * Controller for user logout
 *
 * Match: /user/logout
 *
*/
function user_logout(){
	include MODEL_DIR.'/users/actions/logout.php';
}	

/*
 * Controller for viewing private messages
 *
 * Match: /user/panel/private-messages
 *
*/
function user_panel_pm(){
	return 'view my P.Ms here';
}

/*
 * Controller for viewing the playlist
 *
 * Match: /user/panel/playlists
 *
*/
function user_panel_playlists(){
	return 'this is my playlists';
}

/*
 * Controller for viewing the profile
 *
 * Match: /user/panel/profile
 *
*/
function user_panel_profile(){
	return 'this is my profile - here you can change details about this profile!';
}

/*
 * Controller for video uploading
 *
 * Match: /upload
 *
*/

function user_upload(){
	include MODEL_DIR.'/users/actions/user_upload.php';
	return render('/users/actions/user_upload.tpl.php');
}

/*
 * Controller for video uploading
 *
 * Match: /upload/video
 *
*/

function user_upload_video(){
	include MODEL_DIR.'/users/actions/user_upload_video.php';
	return render('/users/actions/user_upload_video.tpl.php');
}

/*
 *  Controller for video uploading remote
 *  
 *  Match: /upload/remote-video
 *  
 */
function user_upload_remote_video(){
	include MODEL_DIR.'/users/actions/user_upload_remote_video.php';
	return render('users/actions/user_upload_remote_video.tpl.php');
}


//Controller for user logged panel - Match: /user/panel/*

function user_panel_index(){
	include MODEL_DIR.'/users/panel_index.php';
	return render('/users/panel_index.tpl.php');
	
}

//Controller for user logged panel - Match: /user/settings
function user_settings(){
	include MODEL_DIR.'/users/settings/settings.php';
	return render('/users/settings/settings.tpl.php');
}						
