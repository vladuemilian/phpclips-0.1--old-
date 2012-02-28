<?php

$validation = new validation;

if(isset($_POST['submit_register'])){
	$user = $_POST['username'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];
	$email = $_POST['email'];
	
	if($password == $rpassword){
		global $mysql;
		$password = md5($password);
		$mysql->query("INSERT INTO `users` (username, password, email) VALUES ('$user', '$password', '$email')");
	} else {
		echo 'some error has ocurred';
	}	


}	
