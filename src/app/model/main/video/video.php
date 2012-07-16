<?php
global $mysql, $user;

$id = (int) params('id');

$title = params('video_title');

$video = video::find($id);

if(!$video) halt(NOT_FOUND, $lang['not_found']);
	

perfect_slug($title, $video->slug, SITE_URL.'/video/'.$id); //redirect if the slug is not match with the input		

$video_player_html = video_view_helper::generate_video_player($video->filename);

//set variables for view logic
set('video_player',$video_player_html);
set('data',$video);
