<?php 
/*
 * @author Vladu Emilian Sorin - vladuemilian@gmail.com
 * 
 * @version 1.0
 * 
 * @license Feel free to use this classe :)
 * 
 */


/*
 * An interface for member class - we except that in future, we will extend this user system to include more
 * ranks like: moderators, administrators and I design this structure to be included in all of these above ranks
 * 
 */
interface userfunctions{
	
	public function get_field($userid, $index);
	public function add_field($userid, $index, $value);
	public function get_id();
	public function get_username();
	public function index_exists($userid, $index);
	
}