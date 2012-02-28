<?php


class upload_remote extends upload{
	
	
	public function upload($array){
		global $mysql, $errors;
		if(parent::check($array) == true){
			if($this->check_if_exists($array['embed'])==0){
				$slug = parent::make_slug($array['title']);
				$mysql->query("INSERT INTO `videos` (`cat`, `title`, `slug`, `desc`, `from`, `author`, `embed`, `image`) VALUES (".$array['cat'].", '".$array['title']."', '".$slug."', '".$array['desc']."', 1, ".$array['author'].", '".$array['embed']."', '".$array['image']."')");
				$this->write_image($array['embed']);
			} else {
				$errors[] = array('1'	=> 'video_already_exists');
			}
		}
	}
	
	public function check_if_exists($embed){
		global $mysql;
		$sql = $mysql->query("SELECT COUNT(ID) FROM `videos` WHERE embed='$embed'");
		$sql = mysql_fetch_array($sql);
		return $sql[0];
		
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
	        	//echo $video_details['keywords'];
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
	    
	   // if(preg_match("/<media:keywords"))
		
	        
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
    
    function write_image($youtube_id){
    
    	$img_url = 'http://img.youtube.com/vi/'.$youtube_id.'/hqdefault.jpg';
    	$get_image = file_get_contents($img_url);
    	$filename = UPLOAD_IMG_PATH.'/'.$youtube_id.'.jpg';
    	file_put_contents($filename, $get_image);
    		
    
    }

	
}