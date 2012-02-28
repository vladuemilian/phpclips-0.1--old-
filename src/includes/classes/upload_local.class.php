<?php


class upload_local extends upload{

	var $dir_path_year;
	var $dir_path;
	
	
	/*
	 *
	 * Setter of $dir_path_year and $dir_path
	 *
	*/ 
	function config_path($month,$year){
		$this->dir_path_year = VIDEOS_DIR.'/'.$year.'/';
		$this->dir_path = $this->dir_path_year.'/'.$month;
	}

	/*
	 *
	 * Description: create directories if they don't exist on this form
	 *
	 * /tmp/videos/<year>/<month>
	 *
	 * needed parameters $dir_path_year and $dir_path
    */
	function directories_validate(){
		$error = false;
		if(!is_dir($this->dir_path_year)){
			if(!mkdir($this->dir_path_year)){
				$error = true;
			}
		} 
		if(!is_dir($this->dir_path)){
			if(!mkdir($this->dir_path)){
				$error = true;
			}	 
		}
		if($error == false){
			return true;
		} else { 
			return false;
		}		
	}
	
	/*
	 * Get video types from database 
	 *
	 * Returns an array with videos types, ex: array('.avi','.3gb','.flv');
	 *
	*/ 
	
	function get_video_types(){
		global $mysql;
		$sql = $mysql->query("SELECT * FROM `settings` WHERE name='valid_types'");
		$sql = mysql_fetch_array($sql);
		$sql = unserialize($sql['data']);
		return $sql;
	}
		
		
		
}




