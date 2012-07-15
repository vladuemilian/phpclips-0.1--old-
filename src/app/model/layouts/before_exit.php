<?php

global $mysql, $load, $user, $template, $errors, $warnings;




if($mysql->queries()!=0){
	set('queries',$mysql->queries());
} else {
	set('queries',0);
}
set('loadtime',$load->getLoadTime());


if($user->is_auth()){
	set('is_auth',true);
	if($user->is_admin()){
		set('is_admin',true);
	} else {
		set('is_admin',false);
	}
	$avatar = $user->data['avatar'];
	if($avatar=='0'){
		$avatar_link = AVATARS_DIR.'/default.jpg';
	} else {
		$avatar_link = AVATARS_DIR.'/'.$user->data['ID'].'-'.$avatar;
	}
	set('avatar_link',	$avatar_link);		

} else {
	set('is_auth',false);
}



set('username',		$user->data['username']);	
set('UID',			$user->data['ID']);
set('user_data',	$user->data);

//temp values


//end temp values

set('template',		$template);	
set('errors', $errors);
set('warnings', $warnings);	


