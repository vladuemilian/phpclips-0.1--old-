<?php

/*
 * Description: redirect to the perfect slug, ex: site.com/video/2/a-broken-slug, this function turns
 * into site.com/video/2/my-good-title-defined-in-database. With strict parameter defined as true, 
 * this function will halt an 404 error.
 *
 * Parameters string $input, string $slug, string $path, [$strict]
 *
 * Signature: void perfect_slug($input, $slug, $path)
 *
*/ 

function perfect_slug($input, $slug, $path, $strict = false){
	global $lang;
	if($input == $slug){
		return;
	} else {
		if($strict == false){
			redirect_to($path.'/'.$slug);	
		} else {
			halt(NOT_FOUND,$lang['not_found']);
		}
	}		
}

/*
 * Description: get categories from MySQL with all details
 *
 * Parameters: all - list all categories, top - only parent categories
 *
 * Signature array list_categories(string $param)
 *
*/
  
function list_categories($param = 'all'){
	global $mysql;
	$data = array();
	switch($param){
		case 'all':
			$qry = $mysql->query("SELECT * FROM categories");
			while($sql = mysql_fetch_assoc($qry)){
				$data[] = $sql;
			}
			return $data;
			break;
		case 'top':
			$qry = $mysql->query("SELECT * FROM categories WHERE parent=0");
			while($row = mysql_fetch_assoc($qry)){
				$data[] = $row;
			}
			return $data;
			break;		
	}
}

/*
 * Description: get details of child categories of a parent category with id $id
 *
 * Parameters: int $id
 *
 * Signature: array list_child_cats(int $id)
 *
*/ 

function list_child_cats($id){
	global $mysql;
	$id = (int) $id; //validation of $id;
	$data = array();
	$sql = $mysql->query("SELECT * FROM categories WHERE parent='$id'");
	while($row = mysql_fetch_assoc($sql)){
		$data[] = $row;
	}		
	return $data;
}		

/*
 * Description: get current url
 *
 * Parameters: -
 *
 * Signature: string current_url()
 *
*/ 

function current_url() {
 $pageURL = 'http';
 
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

/*
 * Description: get category url
 *
 * Parameters: - (int) $id
 *
 * Signature: string get_category_url(int $id)
 *
*/ 		

function get_category_url($id){
	$data = unserialize(file_get_contents(CACHE_DIR.'/categories/'.$id.'.cache.php'));
	
	if(empty($data['topcats'])){
		$output = SITE_URL.'/cat/'.$data['current']['ID'].'/'.$data['current']['slug'];
	} else {
		$slug = '';
		$data['topcats'] = array_reverse($data['topcats']);
		foreach($data['topcats'] as $topcat){
			$slug .= '/'.$topcat['slug']; 
		}
		$output = SITE_URL.'/cat/'.$data['current']['ID'].$slug;
	}
	return $output;
}
