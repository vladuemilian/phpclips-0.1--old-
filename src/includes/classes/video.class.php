<?php


class video { 
	
	/*
	 * All class attributes are the same
	 * with fields in `videos` table
	 *
	*/
	
	public $ID;
	public $category;
	public $title;
	public $slug;
	public $desc;
	public $from;
	public $filename;
	public $author;
	public $relative_path;
	public $extension;
	public $embed;
	public $image;
	public $views;
	public $featured;
	
	
	/*========================
	 * static function find
	 * Parameters: int $id -> the video id
	 * Returns: a video object corresponding to given id or false if query failed
    */
	public static function find($id=false){
		
			global $mysql;
			$id = mysql_real_escape_string($id);
			$q = $mysql->query("SELECT * FROM `videos` WHERE `ID`='$id'");
			if( $q && mysql_num_rows($q) == 1){
				$video = new self;
				$q = mysql_fetch_assoc($q);
				foreach($q as $key => $val)
					$video->$key = $val;	
				return $video;
				
			} else return false;
	}
	
	/*===================
	 * function comments()
	 * Returns: an array with comments objects (class Comment) posted to this video
	 * Parameters: none
	 *
	*/
	public function comments(){
		
		$comments = array();	
		global $mysql;		
		$q = $mysql->query("SELECT * FROM `videos_comments` WHERE`video_id`='{$this->id}'");	
		if( $q ){
			while($a = mysql_fetch_assoc($q) )	{
				$comment = new Comment;
				foreach( $a as $var => $val)
					$comment->$var = $val;
				$comments[] = $comment;
			}
			return $comments;
		}
		else 
			return false;
	}
	
	//TODO
	/*=======================
	 * function author()
	 * Returns: an user object corresponding to this video's author
	*/	
	
	private function author(){
		//this function returns the user object
		//but we need user class to do this
		//so we will wait for our project-mate to finish the users system
	}
	
	/*=================
	 * function insert()
	 * Description: first set all class attributes
	 * 				than call this method to insert the new video into database
	*/
	public function insert(){
		global $mysql;
		return $mysql->insert(
			'videos',
			array(
				'cat'			=> $this->cat,
				'title'			=> $this->title,
				'slug'			=> $this->slug,
				'desc'			=> $this->desc,
				'from'			=> $this->from,
				'filename'		=> $this->filename,
				'author'		=> $this->author,
				'relative_path'	=> $this->relative_path,
				'extension'		=> $this->extension,
				'embed'			=> $this->embed,
				'image'			=> $this->image,
				'views'			=> $this->views,
				'featured'		=> $this->featured
			)
		);
	}
		
	/*========================
	 * static function delete()
	 * Parameters: $id -> the video's id you want to delete from db
	 * Description: removes a video from database and file system and also remove its comments
	*/
	public static function delete($id){
		global $mysql;
		$mysql->delete('videos', array('ID' => $id));	
		$mysql->delete('video_comments' , array('video_id' => $id));
		//TODO
		//remove video from file system
	}

	
	
	public function get_youtube_id($youtube_id){	
		$position       = strpos($youtube_id, 'watch?v=')+8;
        $remove_length  = strlen($youtube_id)-$position;
        $video_id       = substr($youtube_id, -$remove_length, 11);
        return $video_id;
	}
		
	public function get_youtube_details( $video_id ){
		$video_details      = array('title' => '', 'desc' => '', 'keywords' => '', 'category' => '', 'duration' => '');
	    $video_details_xml  = $this->curlSaveToString('http://gdata.youtube.com/feeds/api/videos/' .$video_id);
	    if ( !$video_details_xml ) {
	    	return false;
	    }
	        
	    if ( preg_match("/<media:title type='plain'>(.*)<\/media:title>/", $video_details_xml, $matches) ) {
	    	if ( isset($matches['1']) ) {
	        	$video_details['title'] = $matches['1'];
	    	}   
	    }
	
	    if ( preg_match("/<media:description type='plain'>(.*?)<\/media:description>/si", $video_details_xml, $matches) ) {
	    	if ( isset($matches['1']) ) {
	        	$video_details['desc'] = $matches['1'];
	        }
	    }
	        
	    if ( preg_match("/<media:keywords>(.*)<\/media:keywords>/", $video_details_xml, $matches) ) {
	    	if ( isset($matches['1']) ) {
	        	$video_details['keywords'] = $matches['1'];
	        }
	    }
	        
	    if ( preg_match("/<yt:duration seconds='(\d+)'\/>/", $video_details_xml, $matches) ) {
	    	if ( isset($matches['1']) ) {
	        	$video_details['duration'] = $matches['1'];
	        }
	    }
	
	    if ( preg_match("/<media:category label='(.*)' scheme='http:\/\/gdata.youtube.com\/schemas\/2007\/categories.cat'>(.*)<\/media:category>/", $video_details_xml, $matches) ) {
	    	if ( isset($matches['1']) ) {
	        	$video_details['category'] = $matches['1'];
	        }
	    }
	        
	    return $video_details;
	}
	
    function curlSaveToString( $url )
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_NOPROGRESS, true);
        curl_setopt($ch, CURLOPT_USERAGENT, '"Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.11) Gecko/20071204 Ubuntu/7.10 (gutsy) Firefox/2.0.0.11');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       
        if ( curl_errno($ch) ) {
            return false;
        }
        
        $string = curl_exec($ch);
        return $string;
    }
    
	function make_slug($str){
		$str = strtolower(trim($str));
		$str = preg_replace('/[^a-z0-9-]/', '-', $str);
		$str = preg_replace('/-+/', "-", $str);
		return $str;
	}



}
