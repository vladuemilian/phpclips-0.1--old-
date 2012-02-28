<?php
$editables_fields = array(
						'username'		=>	array('id'			=> 'username',
												  'title' 		=> 'Username',
												  'data'		=> $user->data['username']
												  ),
						'password'		=>	array('id'			=> 'password',
										  		  'title'		=> 'Password',
										  		  'data'		=> 'your password',
										  		  'settings' 	=> array('min_lenght'	=> 4)
						  						  ),
						'email'			=>	array('id'			=> 'email',
											      'title'		=> 'Email',
											  	  'data'		=> $user->data['email']
											  	  ),
						  		
						'name'			=>  array('id'			=> 'name',
										  		  'title'			=> 'Name',
										  		  'data'			=> $user->data['name']
										  		 ),
						'years'			=>  array('id'			=> 'years',
										  		  'title'			=> 'Years',
										  		  'data'			=> $user->data['years']
										  		 ),
						'IM'			=>  array('id'			=> 'IM',
										  		  'title'			=> 'Instant messaging',
										  		  'data'			=> $user->data['IM']
										  		  ),
						'interest'		=>  array('id'			=> 'interest',
										  		  'title'			=> 'Interest',
										  		  'data'			=> $user->data['interest']
										  		  ),	
						'location'		=>  array('id'			=> 'location',
										  		  'title'			=> 'Location',
										  		  'data'			=> $user->data['location']
										  		  )
						  );										      	

						

$errors = array();
$UID = $user->data['ID'];
if(isset($_POST['send'])){
	$module = array_keys($_POST['send']);
	$module = $module[0];
	switch($module){
		case 'password':
			if($_POST['npassword'] != $_POST['rpassword']){
				$errors[] = 'Passwords must be identically!';
				
			} else {
				
				$query = $mysql->query("SELECT password FROM `users` WHERE ID='$UID'");	//get the current password
				$password = mysql_fetch_array($query);
				$password = $password[0];
				$new_password = md5($_POST['npassword']);
				if(md5($_POST['apassword']) != $password){
					$errors[] = 'Your current password are incorectly!';
				}
			}
			if(strlen($_POST['npassword']) < $editables_fields['password']['settings']['min_lenght']){
				$errors[] = 'Password must contain at least '.$editables_fields['password']['settings']['min_lenght'].' characters!';
			}
			
			
			if(empty($errors)){
				$query = $mysql->query("UPDATE `users` SET password='$new_password' WHERE ID='$UID'");
				if(!$query){
					$errors[] = 'Something happened and your password cannot be changed. Please contact urgently the administrator!';
				}
			}	
			break;
			
		case 'email':
			$email = $_POST['email'];
			if(!$validation->mail($email)){
				$errors[] = 'Your email is invalid!';
			}
			if(empty($errors)){
				$query = $mysql->query("UPDATE `users` SET email='$email' WHERE ID='$UID'");
				if(!$query){
					$errors[] = 'Something happened and your email cannot be changed. Please contact urgently the administrator!';
				}
			}
			break;
			
		case 'name':
			$name = $validation->string($_POST['name']);
			$query = $mysql->query("UPDATE `users` SET name='$name' WHERE ID='$UID'");
			if(!$query){
				$errors[] = 'Something happened and your name cannot be changed. Please contact urgently the administrator!';
				
			} else {
				$user->data_update($name,'name');
				$editables_fields['name']['data'] = $name;
			}	
			break;
		case 'years':
			$years = $validation->years($_POST['years']);
			
			$query = $mysql->query("UPDATE `users` SET years='$years' WHERE ID='$UID'");
			if(!$query){
				$errors[] = 'Something happened and your years cannot be changed. Please contact urgently the administrator!';
			} else {
				$user->data_update($years,'years');
				$editables_fields['years']['data'] = $years;
			} 
			break;
		case 'IM':
			$IM = $validation->string($_POST['IM']);
			$query = $mysql->query("UPDATE `users` SET IM='$IM' WHERE ID='$UID'");
			if(!$query){
				$errors[] = 'Something happened and your IM cannot be changed. Please contact urgently the administrator!';
			} else {
				$user->data_update($IM,'IM');
				$editables_fields['IM']['data'] = $IM;
			}
			break;
		case 'interest':
			$interest = $validation->string($_POST['interest']);
			$query = $mysql->query("UPDATE `users` SET interest='$interest' WHERE ID='$UID'");
			if(!$query){
				$errors[] = 'Something happened and your interest cannot be changed. Please contact urgently the administrator!';
			} else { 
				$user->data_update($interest,'interest');
				$editables_fields['interest']['data'] = $interest;
			}
			break;
		case 'location':
			$location = $validation->string($_POST['location']);
			$query = $mysql->query("UPDATE `users` SET location='$location' WHERE ID='$UID'");
			if(!$query){
				$errors[] = 'Something happened and your location cannot be changed. Please contact urgently the administrator!';
			} else {
				$user->data_update($location,'location');
				$editables_fields['location']['data'] = $location;
			}
			break;
		default:			
	}
	set('post_key',$module);
	set('post_data',$_POST);
	set('send',true);
	
} else {
	set('send',false);
}	





set('errors',$errors);					  
set('editables_fields',$editables_fields);
set('settings_layout','home.settings-beta.tpl.php');

