<?php 
/*
 * @author Vladu Emilian Sorin - vladuemilian@gmail.com
 * 
 * @version 1.0
 * 
 * @license Feel free to use this classe :)
 * 
 */

class authentication{	
	/*
	 * 
	 * @param string $username - string with username
	 * @param string $password - string with password (not-encoded!)
	 * 
	 * @return bool true - if the login was successfuly 
	 * @return bool false - if there was an error at register: username/password are missmatch
	 */
	function login($username, $password){
		$username = mysql_real_escape_string($username);
		$password = md5($password);
		//$query = "SELECT ".$this->db_data['uniqueID']." FROM `".$this->db_data['tablename']."` WHERE ".$this->db_data['userfield']."='$username' AND ".$this->db_data['passfield']."='$password'";
		$query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
		
		$sql = mysql_query($query);
		if($row=mysql_fetch_array($sql)){
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $row['ID'];
			$_SESSION['username'] = $username;
			$this->username = $username;
			return true;
		} else {
			return false;
		}
		
	}
	
	/*
	 * login_by_custom_field is a method that used to logging a user by email for example, just username
	 *
	 * @param string $field_name
	 * @param string $field_value
	 * @param string $password
	 *
	 * @return bool true - if the login was successfuly, otherwise bool false
	*/ 
	function login_by_custom_field($field_name, $field_value, $password){
		$password = md5($password);
		$mb_tb = $this->db_data['tablename'];
		$mt_tb = $this->db_data['meta_table'];
		
		$query =  "SELECT * FROM `$mt_tb` INNER JOIN `$mb_tb` ON $mt_tb.user_id=$mb_tb.ID WHERE $mt_tb.index='$field_name' AND $mt_tb.value='$field_value' AND $mb_tb.password='$password'";
		$sql = mysql_query($query);
		$sql = mysql_fetch_array($sql);
		
		if($sql!=false){
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $sql['ID'];
			$_SESSION['username'] = $sql['value'];

			
			$this->username = $sql['value'];
			return true;
		} else {
			return false;
		}
		
	}
	
	/*
	 * @param string $username - the username which will be inserted in database
	 * @param string $password - the password will be inserted in database. Note: the password will be encoded in md5 in the function!
	 * 
	 * @return bool false - return false if the user already exists 
	 * @return bool true - if the query was ran and the username was registered
	 */
	function register($username, $password){
		$username = mysql_real_escape_string($username);
		$password = md5($password);
		
		$user_exists = $this->user_exists($username);
		if($user_exists){
			return false;
		} else {
			$sql = mysql_query("INSERT INTO ".$this->db_data['tablename']." (".$this->db_data['userfield'].", ".$this->db_data['passfield'].") VALUES ('$username', '$password')");
			return mysql_insert_id();
		}

		
	}
	
	/*
	 * 
	 * Logout function - destroy al session
	 * 
	 */
	function logout(){
		$_SESSION['auth'] = false;
		$_SESSION['id'] = false;
		session_destroy();
	}
	
	
	/*
	 * Check if the user is authenticated
	 * 
	 * @return true - if there was identified a session 'auth' defined as true and 'id' with a numeric value
	 * @return false - if these sessions are not defined
	 */
	function is_auth(){
		if(isset($_SESSION['auth'])){
			if($_SESSION['auth'] == true && is_numeric($_SESSION['id'])){
				return true;
			}
		} else {
			return false;
		}
	}
	
	/*
	 * 
	 * @param string $username - check that $username are registered
	 * 
	 * @return bool true - if the $username was found
	 * @return bool false - if the $username was not found
	 * 
	 */
	function user_exists($username){
		$query = "SELECT COUNT(".$this->db_data['uniqueID'].") FROM `".$this->db_data['tablename']."` WHERE `".$this->db_data['userfield']."` = '$username'";
		$sql = mysql_fetch_array(mysql_query($query));
		if($sql[0] == true){
			return true;
		} else {
			return false;
		}
	}
	
	
	
}
