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
	
	/*===============
	 * function date()
	 * Parameters: (optionally) string $format -> the date format that will be displayed
	 * Returns: a date formated according with given $format and object $time
	 *			With default $format the date will be returned like this: Jun 16, 2010 23:12)
	*/
	public function date( $format = 'M d, Y H:i' ){
		return date( $format, $this->time() );		
	}
	
	/*=================
	 * function insert()
	 * Description: this method inserts into database a new comment
	 *				after the coment class's attributes was setted
	*/
	public function insert(){
		global $mysql;
		return $mysql->insert(
			'videos_comments',
			array(
				'user_id'	=>	$this->user_id,
				'video_id'	=>	$this->video_id,
				'text'		=>	$this->text,
				'time'		=>	$this->time
			)
		);
	}
		
}
?>