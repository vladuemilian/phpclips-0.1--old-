<?php


/*
 * Predefined functions by the limonade library - load model before, and before exit of the execution
*/

/*
 * Before loading of any model
*/

function before(){
	require MODEL_LAYOUTS.'/before.php';
	require MODEL_LAYOUTS.'/general.php';
	require VIEW_HELPERS.'/html.helpers.php'; //general helpers ex: needed to design categories from data array
	
}

/*
 * Before render this code will ran
*/ 

function before_render($content_or_func, $layout, $locals, $view_path){
	require MODEL_LAYOUTS.'/before_exit.php';
    return array($content_or_func, $layout, $locals, $view_path);
}

/*
 * Main page controller - index controller
 *
 * Match: /
 *
*/

function index(){

	include MODEL_DIR.'/main/index.php';
	return render('index.tpl.php');

}



/* ---- videos controllers ----- */

/*
 * Controller for the video page
 *
 * Match: /video/:id/:video_title
 *
*/
 
function to_video(){
	include MODEL_DIR.'/main/video/video.php';
	return render('/video/video.tpl.php');
}

/*
 * Controller for video streaming
 *
 * Match: /video/streaming/:id
 *
*/
 
function video_streaming(){
	$id = params('id');
	include MODEL_DIR.'/main/video/video-streaming.php';
	//return render('video.tpl.php');
}

/*
 *
 *
 *
 *
 *
*/ 

function videos(){
	include MODEL_DIR.'/main/video/videos.php';
	return render('/video/videos.tpl.php');

}

/*---- categories controllers-----*/

/*
 * Controller for viewing a category
 *
 * Match: /cat/:id/:cat_title
 *
*/

function to_cat(){
	$cat_id = params('id');
	if(is_numeric($cat_id)){
		$cat_id = (int) params('id');
	} else {
		halt(NOT_FOUND, "This category id doesn't exists!");
	}
	$cache = unserialize(file_get_contents(CACHE_DIR.'/categories/'.$cat_id.'.cache.php'));
	include MODEL_DIR.'/main/categories/category.php';
	
	return render('/categories/category.tpl.php');
}		

/*
 * Controller for categories
 *
 * Match: /categories
 *
*/

function to_categories(){
	include MODEL_DIR.'/main/categories/categories.php';
	return render('/categories/categories.tpl.php');
}

/*
 * Controller for channels
 *
 * Match: /channels
 *
*/

function channels(){
	include MODEL_DIR.'/main/channels/channels.php';
	return render('/channels/channels.tpl.php');

}

/*
 * Controller for community
 *
 * Match: /community
 *
*/

function community(){
	include MODEL_DIR.'/main/community/community.php';
	return render('/community/community.tpl.php');
}

/*
 * Controller for community users list
 *
 * Match: /community/users
 *
*/

function community_users(){
	include MODEL_DIR.'/main/community/users.php';
	return render('/community/users.tpl.php');

}

/*
 * Controller for community latest playlists
 *
 * Match: /community/playlists
 *
*/

function community_playlists(){
	include MODEL_DIR.'/main/community/playlists.php';
	return render('/community/playlists.tpl.php');
}
