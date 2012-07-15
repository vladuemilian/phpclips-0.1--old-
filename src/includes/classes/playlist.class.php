<?php

class Playlist {
	
	public $id;
	public $title;
	public $user_id;
	public $videos_id;
	public $public;
	
	function __construct( $id = false ){
		
		if( $id !== false ){
			global $mysql;
			$id = mysql_real_escape_string($id);
			$q = $mysql->query("SELECT * FROM `playlists` WHERE `id`='$id'");
			if( $q ){
				$q = mysql_fetch_assoc($q);
				foreach($q as $key => $val)
					$this->$key = $val;	
				
			}
			$this->videos_id = json_decode($this->videos_id);
		}
			
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
			if(is_string($val))
				$this->$var = mysql_real_escape_string(strip_tags(htmlspecialchars($val,ENT_QUOTES,'UTF-8')));
			
	}
	
	public function videos(){
		
		$videos = array();
		$in = '';
		foreach($this->videos_id as $id)
			$in.=$id.',';
		$in = trim($in,',');
		$q = $mysql->query("SELECT * FROM `videos` WHERE `ID` IN $in");
		
		while($a = mysql_fetch_assoc($q)){
			$video = new video;
			foreach($a as $var => $val)
				$video->$var = $val;
			$videos[$a['ID']] = $video;
			}
		return $videos;
	}
	
	public function insert(){
		
		$this->sanitize_all();
			
	}
		
}

?>