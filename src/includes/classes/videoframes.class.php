<?php

class videoframes{
	
	private $video;
	
	public $count;
	public $duration;
	public $height;
	public $width;
	
	//path to folder where to save the thumbnails
	//it must be setted before call the grab() method
	public $path;
	
	
	/**
	 * class constructor
	 * Description: loads the ffmpeg_video and gets 
	 * 		the main video attributes
	 * Param: $video_path -> path to video to load
	*/
	function __construct($video_path){

		if( !extension_loaded('ffmpeg') )
			trigger_error('ffmpeg-php not installed');
		else{
			$this->video = new ffmpeg_movie($video_path);
			if( file_exists($video_path) ){
				$this->count = $this->video->getFrameCount();
				$this->duration = $this->video->getDuration();
				$this->height = $this->video->getFrameHeight();
				$this->width = $this->video->getFrameWidth();
			} 
		}
	}	
	
	/**
	 * function grab()
	 * Description: call this method to get the final video thumbnails
	 *		after you did set the $this->path attribute
	 *		to know where to save it
	 * Param: int $nr -> the number of thumbnails you want to grab from this video
	 * Returns:  if the $this->path is a valid path, returned value will be an array with thumbnails names
	 *	     else the method will reuturn an array with image objects thumbnails
         *
	*/
	public function grab($nr=10){
		
		if( empty($this->path) ){
			return $this->get_random_frames($nr);
		} else {
			$names = array();
			foreach($this->get_random_frames($nr) as $frame){
				$name = $this->random_name();
				$names[] = $name;
				$name = rtrim($this->path,'/').'/'.$name.'.jpg';			
				imagejpeg($frame,$name);
			}
			return $names;
		}
	}
	
	
	/**private
	 * function get_random_frames()
	 * Returns: an array() with $nr random frames
	 *	    grabbed from this video
	 * Params: $nr -> number of frames you want to extract
	*/
	private function get_random_frames($nr = 10){
		
		$frames = array();
		for($i=0;$i<$nr;$i++){
			$frame = mt_rand(1,round($this->count/26));
			$img = $this->video->GetFrame($frame)->toGDImage();
			$img = $this->create_frame($img);
			$frames[] = $img;
		}
		return $frames;
		
	}
	
	/**private
	 * function create_frame()
	 * Description: this method creates thumbnails like on youtube, with black borders, if necessary.
	 *		It method uses resize_image() method to resize a video frame.
	 *		After that it centers the resized thumbnail into the image sized by
	 *		$new_width and $new_height.
	 * Params: $img -> the image that you want to put into the thumbnail
	 *	   $new_width and $new_height -> the video thumbnail size
	 *
	*/
	private function create_frame($img,$new_width=150,$new_height=75){
		
		$height = imagesy($img);
		$ratio = $new_height / $height;
		$new_frame = $this->resize_image($img,$ratio);
		
		$width = imagesx($new_frame);
		$height  = imagesy($new_frame);
		
		$width_dif = $new_width - $width;
		$img = imagecreatetruecolor($new_width,$new_height);
		
		imagecopyresized($img,$new_frame,$width_dif/2,0,0,0,$new_width,$new_height,$width+$width_dif,$height);
		
		return $img;
		
	}
	
	/**private
	 * function resize_image()
	 * Description: it resize the given $img by given $ratio
	*/
	private function resize_image($img,$ratio){
		
		$width = imagesx($img);
		$height = imagesy($img);
		
		$new_width = $width*$ratio;
		$new_height = $height*$ratio;
		
		$new_image = imagecreatetruecolor($new_width,$new_height);
		
		imagecopyresampled($new_image,$img,0,0,0,0,$new_width,$new_height,$width,$height);
		
		return $new_image;
	}
	
	
	//this method generates a random string
	//@paramt $length -> the length of generated string
	private function random_name($length=10){
		$string = '';
		$alfa = 'abcdefghijklmnopqrstuvwxyz0123456789_-';
		for($i=0;$i<$length;$i++)
			$string .= $alfa[mt_rand(0,strlen($alfa)-1)];
		return $string;
	}
	
}

?>
