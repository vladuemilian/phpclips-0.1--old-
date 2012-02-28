<?php

global $mysql, $user;

//define of constants and arguments

$sortby_args = array('Views'      => 'views',
		      		 'Rate'       => 'rate',
		      		 'Date'       => 'date',
		      		 'Comments'   => 'comments'
			 		);
			 		
$timeline_args = array('All'		=> 'all',
					   'Today'		=> 'today',
					   'Weekly'		=> 'weekly',
					   'Monthly'	=> 'monthly'
					   );			 		
			 

//validating the sortby arg
if(isset($_GET['sortby'])){
	if(!in_array($_GET['sortby'],$sortby_args)){
		halt(NOT_FOUND,$lang['not_found']);
	} else {
		$current_sortby = $_GET['sortby'];
		$cat_url = get_category_url($cat_id).'&sortby='.$_GET['sortby'];
		$sortby_slug = '&sortby='.$_GET['sortby'];
	}
} else {
	$cat_url = get_category_url($cat_id);
}	



//validation the timeline
if(isset($_GET['time'])){
	if(!in_array($_GET['time'],$timeline_args)){
		halt(NOT_FOUND,$lang['not_found']);
	} else {
		$current_timeline = $_GET['time'];
		
		//$cat_url .= '&time='.$_GET['time'];
	}
} else {
	$current_timeline = '';
}			





set('cache',$cache);
set('sortby_args',$sortby_args);
set('timeline_args',$timeline_args);
set('current_timeline',$current_timeline);
set('cat_url',$cat_url);
set('cat_id',$cat_id);
