<?php

function categories_linkage($data){
	$output = '';
	foreach($data as $cat){
		$output .= '<li><a href="'.SITE_URL.'/cat/'.$cat['ID'].'/'.$cat['slug'].'">'.$cat['title'].'</a></li>';
		
	}
	
	return $output;
}
