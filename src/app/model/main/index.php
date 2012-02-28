<?php

global $mysql;

require_once MODEL_LAYOUTS.'/general.php';

//var_dump($cached->get_cached());

//$movie = new ffmpeg_movie(TMP_DIR.'/videos/vtest.AVI');

//echo $movie->getDuration();

$latest_videos = array();

$sql = $mysql->query("SELECT * FROM `videos` ORDER BY ID DESC LIMIT 12");

while($row = mysql_fetch_array($sql)){
	$latest_videos[] = $row;
}

$featured_videos = array();

$sql = $mysql->query("SELECT * FROM `videos` WHERE featured=1 ORDER BY ID DESC LIMIT 3");

while($row = mysql_fetch_array($sql)){
	$featured_videos[] = $row;	
}	


set('latest_videos', $latest_videos);
set('featured_videos', $featured_videos);
