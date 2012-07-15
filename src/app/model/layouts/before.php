<?php

global $user;

$template = new template;

$validation = new validation;

if($user->is_auth()){
	$user->data($user->get_id());
}
