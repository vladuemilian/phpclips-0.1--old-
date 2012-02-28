<?php

class community{

	public function list_members($var){
	
	
	}
	
	/*
	 * Description: get the current page - if the page is not setted, it will be initialised with 1
	 *
	 * Returns: return a number
	*/ 
	public function current_page(){
		$page = params('id');
		if(!$page){
			$page = 1;
		}
		return $page;
	}
	
	/*
	 * Description: select from `settings` table how many users will be displayed per page
	 *
	 * Returns: return a number
	 *
	*/ 
	public function users_per_page(){
		global $mysql;
		$sql = $mysql->query("SELECT * FROM `settings` WHERE `name` = 'pagination'");
		$sql = mysql_fetch_array($sql);
		$pagination = unserialize($sql['data']);
		return $pagination['users_per_page'];

	}

	/*
	 * Description: select users details from database based on the pagination input
	 *
	 * Parameters: none
	 *
	 * Returns: return an array with users
	 *
	*/  
	public function select_users(){
		global $mysql;
		$users = array();
		
		$page 		= $this->current_page();
		$per_page   = $this->users_per_page(); 
		$limit 		= $page * $per_page;
		$offset		= $limit - $per_page;
		$sql 		= $mysql->query("SELECT * FROM `users` LIMIT $offset, $per_page");
		while($row = mysql_fetch_array($sql)){
			$users[] = $row;
		}	
		return $users;	
		
	
	}
	
	/*
	 * Description: get the number of total users from database
	 *
	 * Returns: return a number
	*/
	public function total_users(){
		global $mysql;
		$sql = $mysql->query("SELECT COUNT(ID) FROM `users`");
		$sql = mysql_fetch_assoc($sql);
		return (int) $sql['COUNT(ID)'];
	}
	
	/*
	 * Description: get latest member details
	 *
	 * Returns: an array with user details
	*/ 
	public function newest_user(){
		global $mysql;
		$sql = $mysql->query("SELECT * FROM `users` ORDER BY ID DESC LIMIT 1");
		$sql = mysql_fetch_array($sql);
		return $sql;
	}

	
}
