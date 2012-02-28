<?php

require_once MODEL_LAYOUTS.'/general.php';

global $mysql;

$page_id = params('id');
if(isset($page_id)){
	$page_id = (int) params('id');
}

$data = array();

$qry = $mysql->query("SELECT * FROM videos");
$rows = mysql_num_rows($qry);

while($row = mysql_fetch_assoc($qry)){
	$data[] = $row;
}
	


set('page_id',$page_id);
set('data',$data);

