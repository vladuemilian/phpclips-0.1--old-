<?php

/*
 * Description: check if the category have subcategories
 *
 *
 *
 *
*/ 

function is_subcategories($id){
	$cache = file_get_contents(CACHE_DIR.'/categories/'.$id.'.cache.php');
	$cache = unserialize($cache);
	if(!empty($cache['subcats'])){
		return true;
	} else {
		return false;
	}		
}

function is_last_category($id){
	$cache = file_get_contents(CACHE_DIR.'/categories/'.$id.'.cache.php');
	$cache = unserialize($cache);
	if(empty($cache['subcats']) && !empty($cache['topcats'])){
		return true;
	} else {
		return false;
	}		 
}

function is_subcat_nolast($id){
	$cache = file_get_contents(CACHE_DIR.'/categories/'.$id.'.cache.php');
	$cache = unserialize($cache);
	var_dump($cache);
	if(empty($cache['subcats']) && $cache['current']['ID']==0){
		return false;
	} else {
		return true;
	}		
}
