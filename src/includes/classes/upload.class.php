<?php

abstract class upload {
	
	
	
	/*
	 *  Check if the must fields are valid
	 */
	
	protected function check($array){
		$must_fields = array('cat', 'title', 'desc', 'from', 'author');
		foreach($must_fields as $key){
			if(!array_key_exists($key, $array)){
				return false;
				break;
			}	
		}
		return true;	
	}
	
	/*
	 * Description: make slug of a video, title will be the parametter 
	 * 
	 * Returns: string $slug
	 *
	*/ 
	
	function make_slug($str){
		$str = strtolower(trim($str));
		$str = preg_replace('/[^a-z0-9-]/', '-', $str);
		$str = preg_replace('/-+/', "-", $str);
		return $str;
	}
	
	
	
}
