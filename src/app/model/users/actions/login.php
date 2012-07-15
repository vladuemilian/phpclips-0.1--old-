<?php

//session_destroy();

if(isset($_POST['submit_login'])){
	$username = mysql_real_escape_string($_POST['username']);
	$password = $_POST['password'];
	global $user;
	if($user->login($username, $password)){
		redirect(SITE_URL);
	} 
}
