<?php


$cache_functions = array(0		=> array('Cache Side Menu - top categories'		,'cache_side_menu'),
						 1		=> array('Something Other'						,'something_other'),
						 2		=> array('Top Menu'								,'top_menu'),
						 3 		=> array('User panel menu'						,'user_panel_menu'),
						 4		=> array('All categories cache'					,'all_categories_cache')		
						 );


/*
 * Description: create a file in CACHE_DIR with top categories content 
 *
 * File Generated: side_menu.cache.php
 *
*/


function cache_side_menu(){
	
	global $mysql;
	
	$file = new cache;
	$file->set_filename('side_menu');
	
	//content prepairing for this file
	
	$sql = $mysql->query("SELECT * FROM `categories` WHERE parent = 0");
	
	$data = '';
	while($row = mysql_fetch_array($sql)){
		$data .= '<li><a href="'.SITE_URL.'/cat/'.$row['ID'].'/'.$row['slug'].'">'.$row['title'].'</a></li>';
		$data .= "\n";
	}
	
	$file->data = $data;

	$file->data_write();
	

}

/*
 * Description: top menu creation <li>menu-name</li>
 *
 * File Generated: top_menu.cache.php
 *
*/ 


function top_menu(){
	global $mysql;
	$file = new cache;
	$file->set_filename('top_menu');
	
	//content prepairing for this file
	
	$sql = $mysql->query("SELECT * FROM `topmenu` ORDER BY `order` ASC");
	
	$data = '';
	while($row = mysql_fetch_array($sql)){
		if($row['local']==1){
			$data .= '<li><a href="'.SITE_URL.$row['link'].'">'.$row['title'].'</a></li>';
		} else {
			$data .= '<li><a href="'.$row['link'].'">'.$row['title'].'</a></li>';
		}
		$data .= "\n";
	}
	
	$file->data = $data;
	$file->data_write();

}

/*
 * Description: create panel menu for users - included in /user/panel - pattern: <li>menu-name</li>
 *
 * File Generated: user_panel_menu.cache.php
 *
*/ 

function user_panel_menu(){
	global $mysql;
	$file = new cache;
	$file->set_filename('user_panel_menu');
	
	//content prepairing for this file
	
	$sql = $mysql->query("SELECT * FROM `user_menu` ORDER BY `order` ASC");
	
	$data = '';
	while($row = mysql_fetch_array($sql)){
		if($row['default']==1){
			$data .= '<li><a href="'.SITE_URL.$row['link'].'">'.$row['title'].'</a></li>';
		} else {
			$data .= '<li><a href="'.$row['link'].'">'.$row['title'].'</a></li>';
		}
		$data .= "\n";
	}
	
	$file->data = $data;
	$file->data_write();
	
}


/*
 * Description: generate cache for all categories and subcategories
 *				each category will have a dedicated file in CACHE_DIR/categories with this parrent: {ID}.cache.php
 *				in this file will be details like: subcategories ID's, slug and title
 *
 * Files Generated in CACHE_DIR/categories: {ID}.cache.php
 *
*/ 

function all_categories_cache(){
	global $mysql;
	$sql = $mysql->query("SELECT * FROM `categories`");
	
	while($row = mysql_fetch_assoc($sql)){
		$subids = array();
		$id = $row['ID'];
		$first_id = $id;
		$subids['current'] = $row;
		
		$sql2 = $mysql->query("SELECT * FROM `categories` WHERE parent='$id'");
		
		while($row2 = mysql_fetch_assoc($sql2)){
			$subids['subcats'][] = $row2;
		}
		$parent = $row['parent'];
		$i=0;
		while($parent!=0){
			$sql3 = $mysql->query("SELECT * FROM `categories` WHERE ID='$id'");
			$row3 = mysql_fetch_array($sql3);		
			$subids['topcats'][] = $row3;
			$parent = $row3['ID'];
			$id = $row3['parent'];
			if($row3['parent']==0){
				break;
			}	
		}
		$data = serialize($subids);
		$file = new cache;
		$file->set_filename('/categories/'.$first_id);
		$file->data = $data;
		$file->data_write();
	}	
}



function something_other(){
	echo 'dumping works';
}	
