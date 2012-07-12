<?php
/* Class Comment
/
/
*/

class Comment {
	
	public $id;
	public $user_id;
	public $video_id;
	public $text;
	public $time;
	
	function __construct(){

			
	}
	
	
	/*=======================
	 * function sanitize_all()
	 *
	 * Description: This private method is called in methods like insert() or update()
	 *				and prepare all class attributes to be inserted in database.
	 *				It prevents SQL Injection and Cross Site Scripting (XSS)
	*/
	private function sanitize_all(){
		
		foreach( get_object_vars($this) as $var => $val )
			$this->$var = mysql_real_escape_string(strip_tags(htmlspecialchars($val,ENT_QUOTES,'UTF-8')));
			
	}
	
	/*===============
	 * function date()
	 *
	 * Parameters: (optionally) string $format -> the date format that will be displayed
	 *
	 * Returns: a date formated according with given $format and object $time
	 *			With default $format the date will be returned like this: Jun 16, 2010 23:12)
	*/
	public function date( $format = 'M d, Y H:i' ){
		
		return date( $format, $this->time() );	
		
	}
	
	/*=================
	 * function insert()
	 *
	 * Description: this method inserts into database a new comment
	 *				after the coment class's attributes was setted
	 *
	*/
	public function insert(){
		
		global $mysql;
		$insert = ''; $values = '';
		//escape the values
		$this->sanitize_all();
		//create the query by class attributes
		//remember that the class attributes are the same with comment table in db
		foreach( get_object_vars($this) as $var => $val ){
			if( !empty($val) && $var !='id' ){
				$insert .= "`$var`,"; 
				$values .= "'$val',";
			}
		}
		
		$mysql->query("INERT INTO `comments` (".trim($insert,',').") VALUES (".trim($values,',').")");
	}
		
}
?>