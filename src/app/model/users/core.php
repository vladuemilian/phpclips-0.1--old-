<?php


$avatar = $user->data['avatar'];
if($avatar=='0'){
	$default_avatar = AVATARS_DIR.'/default.jpg';
	$user->data_extend('avatar_link',$default_avatar);
} else {
	$avatar = AVATARS_DIR.'/'.$user->data['ID'].'-'.$avatar;
	$user->data_extend('avatar_link',$avatar);
}



set('user_data',	$user->data);


