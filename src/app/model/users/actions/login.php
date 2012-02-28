<?php

//session_destroy();

if(isset($_POST['submit_login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user = new users;
	if($user->authenticate($username, $password)){
		redirect(SITE_URL);
	} 
}
