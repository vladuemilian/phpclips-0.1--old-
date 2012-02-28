<?php

class cache{

	var $filename;
	var $data;
	public static $cached_files = array();
	
	/*
	 * Set filename of the file which will be generated in CACHE_DIR
	*/ 
	
	function set_filename($name){
		$name = $name.'.cache.php';
		$this->filename = $name;
		self::$cached_files[] = $name;
	}	
	
	/*
	 * Prepair data for write - writing on the $data proprieties
	*/ 
	
	function data_create_html($callback){
		$this->data = $callback;
	}
	
	/*
	 * Write data to $filename using fwrite() - latest step of the class
	 * Prepair data for writting
	 * $array - an array with elements or data which needed to be built
	 * $callback - defined in view logic which turn the array into HTML form
	 *
	*/ 
	
	function data_write(){
		if(isset($this->filename)){
			$fh = fopen(CACHE_DIR.'/'.$this->filename,'w');
			if(!$fh){
				return false;
			} else {
				fwrite($fh, $this->data);
			}	
		} else {
			return false;
		}	
	}

	 
	/*
	 * Rewrite the cache file 
	 * For example, this method will be called from admin panel when you modified 
	 * something and cache need to be re-generated
	 *
	*/ 
	
	function cache_reset(){		

	
	}
	
	/*
	 * Get filename of generated cache - it will be included in business logic and passed to view logic
	*/
	
	function get_filename(){
		return $this->filename;
	}
	
	/*
	 * Return cached files
	*/
	
	function get_cached(){
		return self::$cached_files;
	}	
	 
	
}	
