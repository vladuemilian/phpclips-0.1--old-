<?php

class users{


	var $data;
	var $uid;

	
	function __construct(){
		if(isset($_SESSION['uid'])){
			$this->uid = (int) $_SESSION['uid'];
		}
		if(isset($_SESSION['data'])){
			$this->data = $_SESSION['data'];
		}	
		
	}
	
	/* 
	 *
	 * Description: authentification function
	 *
	*/ 
	function authenticate($identifier, $password, $byuser = true){
		if(isset($_SESSION['auth']) && $_SESSION['auth'] == TRUE){
			return TRUE;
		}	
		global $mysql;
		$password = md5($password);
		if($byuser == true){
			$qry = $mysql->query("SELECT * FROM `users` WHERE username='$identifier' AND password='$password'");
		} else {
			$qry = $mysql->query("SELECT * FROM `users` WHERE email='$identifier' AND password='$password'");
		}
		if(mysql_num_rows($qry)!=0){
			$_SESSION['auth'] = TRUE;
			$_SESSION['uid'] = $qry['ID'];
			$data = mysql_fetch_assoc($qry);
			$data['admin'] = (int) $data['admin'];
			unset($data['password']);
			$_SESSION['data'] = $data;
			$this->data = $_SESSION['data'];
			return true;
		} else {
			return false;
		}		
	}
	
	/*
	 * Description: used when user update something in database, e.g: name, this method will refresh the session with the new data
	 *
	 * Parameters: n/a
	 *
	 * void session_refresh();
	*/
	
	function session_refresh(){
		global $mysql;
		//$qry = $mysql->query("SELECT * FROM `users` WHERE 
	} 
	
	
	/*
	 * Description: update in $_SESSION['data'][$key] with a new value. Used for example when a user updates his information, the $_SESSION need to be refreshed
	 *
	 * Parameters: string $data, string $key
	 *
	 * void data_update($data, $key);
	*/
	
	function data_update($data, $key){
		if(isset($_SESSION['data'][$key])){
			$_SESSION['data'][$key] = $data;
			$this->data[$key] = $data;
			return true;
		} else {
			return false;
		}	
	}
	
	/*
	 *
	 * Description: extend user data array
	 *
	 *
	*/
	function data_extend($key,$value){
		$this->data[$key] = $value;
	}	
	
	/*
	 *
	 * Description: check if the user session auth is true - this method evaluate if a visitator is authenticated or not
	 *
	*/  
	function is_auth(){
		if(isset($_SESSION['auth']) && $_SESSION['auth'] == true){
			return true;
		} else {
			return false;
		}
	}			
	
	/*
	 * Description: check if the visitator is guest(non authenticated) or is authenticated 
	 *
	 * Return: true if is guest and false if is authenticated
	 *
	*/  
	function is_guest(){
		if($_SESSION['auth'] == false){
			return true;
		} else {
			return false;
		}
	}
	
	
	/*
	 * Description: used to get all Session data in a variable
	 *
	*/ 
	function get_data(){
		return $_SESSION['data'];
	}
	
	/*
	 *
	 * Description: check if the user is admin based on the session data when user authenticate
	 *
	*/ 
	function is_admin(){
		if($this->data['admin']==1){
			return true;
		} else {
			return false;
		}
	}							
	/*
	 *
	 *
	 *
	*/

	 
	
	

	
	
}
