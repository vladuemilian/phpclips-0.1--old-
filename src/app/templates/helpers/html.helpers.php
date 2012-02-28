<?php

/*
 * Description: Returns HTML with listed sub-categories - data will be readed from cache folder
 *
 * Parameters: array $data ex:
 *		 $cache['subcats_ids'] = array(array(5, 		'Title',	'slug'),
 *									   array(6, 		'Title2',	'slug2'),
 *									   array(7,			'Title3', 	'slug3')
 *							 		  );
 *
 * Signature: string listing_categories(array $data) 
 *
*/ 
function listing_data($data, $li = '<li>'){
	$output = '';
	foreach($data as $row){
		$output .= $li.'<a href="'.SITE_URL.'">'.$row[1].'</a></li>'; 
	}
	return $output;
}


/*
 * Description: List subcategories from cache
 *
 * Parameters: array $data
 *
 * $cache = array(..)
 *
 * Signature: string 
*/
function list_subcategories($data, $li = '<li>'){
	$output = '';
	$slug = '';
	
	
	if(!empty($data['topcats']) && empty($data['subcats'])) {
		//var_dump($data);
		//$output = 'topcats_exists';
		$top_size = count($data['topcats']);
		$path = CACHE_DIR.'/categories/'.$data['topcats'][$top_size-2]['ID'].'.cache.php';
		
		$data = unserialize(file_get_contents($path));
	}
	if(!empty($data['topcats'])){
		$data['topcats'] = array_reverse($data['topcats']);
	}
	
	if(!empty($data['subcats'])){
		foreach($data['subcats'] as $row){
			if(!empty($data['topcats'])){
				$slug = '';
				foreach($data['topcats'] as $top_value){
					$slug .= $top_value['slug'].'/'; 
					
				} 
			} else {
				$slug = $data['current']['slug'].'/';
			}
			
			$output .= $li.'<a href="'.SITE_URL.'/cat/'.$row['ID'].'/'.$slug.$row['slug'].'">'.$row['title'].'</a></li>';
		}
	} else {
		$output = false;
	}	
	return $output;
} 

/*
 * Description: Generate breadcrumbs of category
 *
 * Parameters: array $data - from CACHE_DIR/categories (!), $home - home title
 *
 * Return: an array with breacrumb elements
 *
 * Signature: array breadcrumb(array $data)
*/

function breadcrumb($data, $home = 'Home'){
	$breadcrumb = array();
	$breadcrumb[0] = array('title'		=> $home,
						   'slug'		=> SITE_URL
						   );
	if(empty($data['topcats'])){					   
		$breadcrumb[1] = array('title'		=> $data['current']['title'],
							   'slug'		=> SITE_URL.'/cat/'.$data['current']['ID'].'/'.$data['current']['slug']
							   );
	}		
				   
	if(!empty($data['topcats'])){
		$data['topcats'] = array_reverse($data['topcats']);
		$slug = '';
		foreach($data['topcats'] as $subcat){
			
			$slug .= '/'.$subcat['slug'];
			
			$breadcrumb[] = array('title'		=> $subcat['title'], 
								  'slug'		=> SITE_URL.'/cat/'.$subcat['ID'].$slug
								  );
								  
		}
	}
	return $breadcrumb;
}

function html_breadcrumb($data){
	$breadcrumb_array = breadcrumb($data);
	$output = '';
	$count = count($breadcrumb_array);
	$i=0;
	foreach($breadcrumb_array as $breadcrumb){
		$output .= '<li><a href="'.$breadcrumb['slug'].'">'.$breadcrumb['title'].'</a></li>';
		$i++;
		if($count!=$i){
			$output .= '<li class="separator"></li>';
		}
		
	}
	return $output;
}






