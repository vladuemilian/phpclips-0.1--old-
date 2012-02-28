<?php

session_start(); //starting session

//Autoloading all classes

function __autoload($class_name) {
	if(strpos($class_name,'view_helper')!==false){
		include VIEW_HELPERS.'/'.$class_name.'.class.php';
	} else {
    	include CLASSES . $class_name . '.class.php';
	}
}

//start monitorising the page load
$load = new pageLoad;
$user = new users;
$template = new template;
