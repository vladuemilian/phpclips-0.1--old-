<?php


/*
 * Description: Loads the new views template path for admin if the $callback match admin_ pattern
*/

function autoload_controller($callback){
	if(strpos($callback, "admin_") === 0){
		option('views_dir',          ADMIN_TEMPLATE_PATH);
	}		
}

/*
 * Description: match: /admin
*/

function admin_index(){
	
	include MODEL_DIR.'/admin/index.php';
	return render('index.tpl.php');
}

/*
 *
*/ 

function admin_cache_refresh_all(){
	require_once MODEL_DIR.'/admin/cache_refresh_all.php';
}

/*
 * Description: match: /admin/cache
*/

function admin_cache(){
	require_once MODEL_DIR.'/admin/cache.php';
	return render('cache.tpl.php');

} 

function admin_categories(){
	require_once MODEL_DIR.'/admin/categories.php';
	return render('categories.tpl.php');
}
