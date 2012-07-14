<?php 
/*
 * @author Vladu Emilian Sorin - vladuemilian@gmail.com
 * 
 * @version 1.0
 * 
 * @license Feel free to use this classe :)
 * 
 */

abstract class users extends authentication{
	

	
	/*
	 * the database tables are defined here
	 */
	public $db_data = array('tablename'			=> 'users',
							'userfield'			=> 'username',
							'passfield'			=> 'password',
							'uniqueID'			=> 'ID',
							'meta_table'		=> 'users_meta',
							'meta_uniqueID'		=> 'ID',
							'meta_id'			=> 'user_id',
							'meta_index'		=> 'index',
							'meta_value'		=> 'value'
							);	
					
	/*
	 * Get the username from session
	 * 
	 */
	public function get_username(){
		return (string) $_SESSION['username'];
	}
	
	/*
	 * Get the id from session
	 */
	public function get_id(){
		return (int) $_SESSION['id'];
	}
	
	/*
	 * Verify that the user exists in database. The parameter int $userid verify that
	 * the user with both, $username and $userid exists.
	 *
	 * @param string $username
	 * @param int $userid
	 *
	 * @return true if there has been found a user with these details, otherwise it will return false
	*/ 
	public function user_exists($username, $userid = false){
		if($userid == false){
			$sql = "SELECT COUNT(".$this->db_data['uniqueID'].") FROM `".$this->db_data['tablename']."` WHERE `".$this->db_data['userfield']."`='$username'";
		} else {
			$sql = "SELECT COUNT(".$this->db_data['uniqueID'].") FROM `".$this->db_data['tablename']."` WHERE `".$this->db_data['userfield']."`='$username' AND ID=$userid";
		}
		$query = mysql_fetch_array(mysql_query($sql));
		$query = $query[0];
		if($query == 0){
			return false;
		} else {
			return true;
		}		
	}

	
	
}
