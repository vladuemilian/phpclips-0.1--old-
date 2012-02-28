<?php

/*$sid = session_id();
if(isset($sid)){
	redirect_to(SITE_URL);
	die();
}*/


global $mysql;

$sql 				= $mysql->query("SELECT * FROM `videos` WHERE filename='$id'");
	
$sql 				= mysql_fetch_array($sql);

$relative_path 		= $sql['relative_path'];
$extension 			= $sql['extension'];
		
//var_dump($sql);

$file = VIDEOS_DIR.'/'.$relative_path.'/'.$id.'.'.$extension;

//echo $file;
$extension = 'flv';
switch($extension)
{
  case "flv":

    $ctype = "video/x-flv";
    break;
  case "mp4":
    $ctype = "video/mp4";
    break;
  case "wmv":
    $ctype = "video/x-ms-wmv";
    break;
  case "mov":
    $ctype = "video/quicktime";
    break;
  default:
    break;
}

header("Content-type: " . $ctype);
header("Cache-Control: no-cache, no-store, max-age=0, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Expires: Mon, 20 Dec 1980 00:00:00 GMT"); // Date dans le passé
header("Pragma: no-cache");
header("Content-Transfer-Encoding: binary");
header("Content-Description: File Transfer");
$fh = fopen($file, "rb") or die("Could not open file: " . $file . "\n");
while (!

feof($fh))
{
  print(fread($fh, 16384));
}
fclose($fh);

