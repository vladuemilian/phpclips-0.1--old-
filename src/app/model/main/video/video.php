<?php

global $mysql, $user;

$id = (int) params('id');
$title = params('video_title');

$qry = $mysql->query("SELECT * FROM videos WHERE ID='$id'");
if(mysql_num_rows($qry)!=0){
	$data = mysql_fetch_array($qry);
} else {
	halt(NOT_FOUND, $lang['not_found']);
}	

perfect_slug($title, $data['slug'], SITE_URL.'/video/'.$id); //redirect if the slug is not match with the input		



$video_player_html = video_view_helper::generate_video_player($data['filename']);



set('video_player',$video_player_html);
set('data',$data);
