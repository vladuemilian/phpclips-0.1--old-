<?php 
/*
 * @author Vladu Emilian Sorin - vladuemilian@gmail.com
 * 
 * @version 1.0
 * 
 * @license Feel free to use this class :)
 * 
 */

class members extends users implements userfunctions{

	public $data;

	/*
	 * This method is used to get the field data from database.
	 * 
	 * @param int $userid 		- the ID of the user
	 * @param string $index 	- the index value name
	 * 
	 * @return array $data 		- contains the values of this field;
	 * @return bool false 		- if this field was not found in database
	 */
	public function get_field($userid, $index){
		$query = "SELECT `value` FROM `".$this->db_data['meta_table']."` WHERE `".$this->db_data['meta_id']."`=$userid AND `".$this->db_data['meta_index']."` = '$index'";
		$data = mysql_fetch_array(mysql_query($query));
		if($data != false){
			return $data[0];
		} else {
			return false;
		}
	}
	
	/*
	 * This method is used to add a field in database
	 * 
	 * @param int $userid 		- the id of the user
	 * @param string $index 	- the name of the index
	 * @param string $value 	- the value of the index
	 * 
	 * @return bool true		- if the data was introducted
	 * @return bool false 		- if there was an error and the data was not introducted
	 * 
	 */
	public function add_field($userid, $index, $value){
		if($this->index_exists($userid, $index) == false){
			$query = "INSERT INTO `".$this->db_data['meta_table']."` (`".$this->db_data['meta_id']."`, `".$this->db_data['meta_index']."`, `".$this->db_data['meta_value']."`) VALUES ($userid, '$index', '$value')";
			$sql = mysql_query($query);
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 *
	 * This method is used to change the value of a field
	 *
	 * @param int $userid 		- the id of the user
	 * @param string $index 	- the name of the index which we want to change the value
	 * @param string $value 	- the new value that will be replaced 
	 * 
	 * @return bool true 		- if the data was introducted
	 * @return bool false 		- if there was an error and the data was not introducted 
	*/ 
	 public function change_field($userid, $index, $value){
		$query = "UPDATE `".$this->db_data['meta_table']."` SET `".$this->db_data['meta_value']."`='$value' WHERE `".$this->db_data['meta_id']."`=$userid AND `".$this->db_data['meta_index']."`='$index'";
		$sql = mysql_query($query);
		if($sql){
			return true;
		} else {
			return false;
		}
	
	}

	
	/*
	 * 
	 * Check if the index(field) exists in database
	 * 
	 * @param int $user_id 		- the ID of the user from which we search for $index value
	 * @param string $index 	- the name of the index which we want to check if it's exists
	 * 
	 * @return bool true 		- if the index was found
	 * @return bool false 		- if the index was not found
	 * 
	 */
	public function index_exists($user_id, $index){
		$query = "SELECT COUNT(".$this->db_data['meta_uniqueID'].") FROM `".$this->db_data['meta_table']."` WHERE `".$this->db_data['meta_id']."`= $user_id AND `".$this->db_data['meta_index']."` = '$index'";
		$sql = mysql_fetch_array(mysql_query($query));
		$sql = $sql[0];
		if($sql == 0){
			return false;
		} else {
			return true;
		}
	}
	
	
	/*
	 * 
	 * Check if the value exists in all indexes of all users
	 * 
	 * @param string $value 	- the value for we whill search in database 
	 *
	 * @return bool true 		- if the index was found
	 * @return bool false 		- if the index was not found
	 * 
	 */
	public function value_exists($value){
		$query = "SELECT COUNT(".$this->db_data['meta_uniqueID'].") FROM `".$this->db_data['meta_table']."` WHERE `".$this->db_data['meta_value']."` = '$value'";
		$sql = mysql_fetch_array(mysql_query($query));
		$sql = $sql[0];
		if($sql == 0){
			return false;
		} else {
			return true;
		}
		
		
	}
	
	/*
	 * Get all fields defined for the user in user_meta
	 * 
	 * @param int $userid 		- the id of the user
	 * 
	 * @return array $fields 	- an array with data of the fields
	 * @return bool false 		- if the user has not defined any fields in database
	 */
	public function get_all_fields($userid){
		$fields = array();
		$query = "SELECT * FROM `".$this->db_data['meta_table']."` WHERE `".$this->db_data['meta_id']."` = $userid";
		$sql = mysql_query($query);
		while($row = mysql_fetch_array($sql)){
			$fields[] = $row;
		}
		if(!empty($fields)){
			return $fields;
		} else {
			return false;
		}
	}
	
	/*
	 * Descriptions: check if the user is admin
	 *
	 * Note: if a user is admin he is registered too!
	 *
	 *
	*/  
	public function is_admin(){
		if($_SESSION['auth'] == true){
			$id = (int) $_SESSION['id'];
			$sql = mysql_query("SELECT `admin` FROM `users` WHERE `ID`=$id");
			$row = mysql_fetch_array($sql);
			if($row['admin'] == 1){
				return true;
			} else {
				return false;
			}
		}
	}
	
		
	/*
	 * Description: this method will be called when user successfuly login
	 * It will populate $data property with user details in an array
	 *
	*/  
	public function data($id){
		$id = (int) $id;
		$sql = mysql_query("SELECT `ID`, `username`, `email`, `date`, `name`, `years`, `IM`, `interest`, `location`, `avatar` FROM `users` WHERE `ID` = $id");
		$data = mysql_fetch_array($sql);
		return $this->data = $data;
	}	
	
	
}
