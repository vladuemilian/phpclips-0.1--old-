<?php

define('SETTINGS_PATH',MODEL_DIR.'/users/settings');
define('SETTINGS_PATH_TEMPLATE',TEMPLATE_PATH.'/users/settings');

global $template, $user, $mysql;

$validation = new validation; //instance validation class

$template->header_extend('<link href="/templates/frontend/default/css/user.settings.css" rel="stylesheet" type="text/css" media="screen" />');
$template->header_extend('<script type="text/javascript" language="javascript" src="/js/user.settings.core.js"></script>');
$user_data_fields = $user->data;


$actions = array('profile','avatar','playlists');
if(isset($_GET['a'])){
	$action = $_GET['a'];
} else {
	$action = 'profile';
}



if(in_array($action,$actions)){
	require SETTINGS_PATH.'/settings_'.$action.'.php';
} else { 
	halt("En error occured in my app...");
} 

set('action_path',$action);
