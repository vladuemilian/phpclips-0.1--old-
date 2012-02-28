<?php


/*
 * Description: function used to show data in settings.tpl.php, it check if the user have a value empty, and if yes, it shows a message
 *
 * Parameters: string $value, string $message
 *
*/

function show_datafield($module, $message='none'){
	if(!empty($module)){
		return $module;
	} else {
		return $message;
	}		
}			
	
	
	
	/*if(empty($value)){
		echo $message;
	} else {
		echo $value;
	}*/		



function get_userdata($module){
	if($module == 'password'){
		return 'your password';
	} else {
		return $module;
	}		

}
