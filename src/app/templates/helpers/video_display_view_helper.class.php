<?php

class video_display_view_helper{
	
	public $id;
	
	public $title;
	
	public $slug;
	
	public $image;
	
	public $lenght;
	
	public $author;
	
	public $views;
	
	public $desc;
	
	//private $html_code;

	/* setters for all values */
	
	function set_id($id){
		$this->id = $id;
	}
	
	function set_title($title){
		$this->title = $title;
	}
	
	function set_slug($slug){
		$this->slug = $slug;
	}
	
	function set_image($image){
		$this->image = $image;
	}
	
	function set_lenght($lenght){
		$this->lenght = $lenght;
	}
	
	function set_author($author){
		$this->author = $author;
	}
	
	function set_views(){
		$this->views = $views;
	}
	
	function set_desc($desc){
		$this->desc = $desc;
	}
	/* end setters ! */
	
	function init($array){
		$error = 0;	
		
		$needed_keys = array('ID', 'title', 'slug', 'image',  'author', 'views');
		
		foreach($needed_keys as $key){
			if(!key_exists($key, $array)){
				
				return false;	
			}
		}
		
		$this->id = $array['ID'];
		$this->title = $array['title'];
		$this->slug = $array['slug'];
		$this->image = $array['image'];
		//$this->lenght = $array['lenght'];
		$this->author = $array['author'];
		$this->views = $array['views']; 
		
		
	}
	/* core - formatting HTML for displaying the video */

	function html_video(){
		$html = '<div class="videowrapper">';
		$html .= '<div class="videoimg"><a href="'.SITE_URL.'/video/'.$this->id.'/'.$this->slug.'">';
		$html .= '<img src="/images/videothumbs/'.$this->image.'" width="203" height="120" class="videothumb"/></a></div>';
		$html .= '<div class="videotxt"><div class="videotitle">';
		$html .= '<a href="'.SITE_URL.'/video/'.$this->id.'/'.$this->slug.'">'.substr($this->title, 0, 70).'</a></div>';
		$html .= '<div class="videometa">something</div>';
		$html .= '</div>';
		
		return $html;
	}	
	
	
	function html_video_featured(){

		$html = '<div class="featured-image">';
		$html .= '<a href="'.SITE_URL.'/video/'.$this->id.'/'.$this->slug.'">';
		$html .= '<img src="/images/videothumbs/'.$this->image.'" width="203" height="130" class="videothumb" /></a></div>';
		$html .= '<div class="featured-title">';
		$html .= '<a href="'.SITE_URL.'/video/'.$this->id.'/'.$this->slug.'">'.substr($this->title, 0, 70).'</a></div>';
		//$html .= '</div>';
		$html .= '<div class="featured-desc">'.substr($this->desc, 0, 150).'</div>';
		
		return $html;
	
	}

		
}
	