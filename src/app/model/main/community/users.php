<?php

global $mysql;

require 'includes/classes/community.class.php';

$community = new community;

//$community->current_page();
//$community->users_per_page();

//$community->total_users();


$users = $community->select_users();









/* pagination initialisation and configuration */
$pagination = new pagination;
$pagination->set_current($community->current_page());
$pagination->set_per_page($community->users_per_page());
$pagination->set_values($community->total_users());
$pagination->set_url(SITE_URL.'/community/users/');
/* end pagination */

set('pagination',$pagination->show());
set('users',$community->select_users());
set('newest_member',$community->newest_user());
set('total_members',$community->total_users());


