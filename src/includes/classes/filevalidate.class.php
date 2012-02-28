<?php


class filevalidate{

	var $valid_types; //array with valid extensions ex: array('.jpg','.png','.gif')
	
	
	/*
	 * Description: setter for $valid_types
	*/ 	
	function valid_types($array){
		$this->valid_types = unserialize(strtolower(serialize($array)));
	}
	
	/*
	 * Description: check if the file type is valid
	 *
	 * Parameters: string $name (ex. myfile.jpg)
	 *
	 * Returns true if the extension have been found in $valid_types and false if it's not founded
	 *
	*/ 	
	function is_valid($name){
		$rev_name = strrev($name);
		$pos = strpos($rev_name,'.');
		$ext = strtolower(strrev(substr($rev_name,0,$pos+1)));
		if(isset($this->valid_types)){
			if(in_array($ext,$this->valid_types)){
				return true;
			} else {
				return false;
			}	
		} else {
			return false;
		}	
				
	}
}
