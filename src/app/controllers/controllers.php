<?php



require_once 'main.controller.php';

require_once 'users.controller.php';

if($user->is_admin()){
	require_once 'admin.controller.php'; 
}	
