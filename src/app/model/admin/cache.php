<?php

require_once 'includes/cache_functions.php';

if(isset($_POST['send_data'])){
	$cache_data = $_POST['cache_func'];
	foreach($cache_data as $cache){
		$cache();
	}
	set('message','You cleared the cache from your site. Please check the front-end, some data may be shown different!');
}	



set('cache_functions',$cache_functions);


