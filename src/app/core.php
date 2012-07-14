<?php

session_start(); //starting session

//Autoloading all classes

function __autoload($class_name) {
	if(strpos($class_name,'view_helper')!==false){
		require_once VIEW_HELPERS.'/'.$class_name.'.class.php';
	} else {
    	require_once CLASSES . $class_name . '.class.php';
	}
}

//start monitorising the page load
$load = new pageLoad;
$user = new members;

$template = new template;
