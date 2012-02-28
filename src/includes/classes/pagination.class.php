<?php

class pagination{
	
	public $per_page = 10;
	
	private $values;
	
	private $current;
	
	/* config the view logic here */
	
	public $pages_items = 7; //recommended to be a impare number
	
	private $show_last = false; 
	
	private $show_first = false;
	
	private $url = '';
	
	/*
	@ setter current page 
	*/
	function set_current($value){
		$this->current = $value;
	}
	
	/*
	@ setter of show last page button
	*/
	function set_last_page($val){
		$this->show_last=$val;
	}
	function set_first_page($val){
		$this->show_first=$val;
	}			
	
	
	/*
	@ setter of $per_page
	*/
	public function set_per_page($value){
		$this->per_page = $value;
	}	
	
	/*
	@ how many values needed to be paginated
	*/
	public function set_values($values){
		return $this->values=$values;
	}	
	
	/*
	@ setter of $pages_items 
	displays how many links to appear on the page
	ex: $pages_items = 5; 
	output: 1 2 3 4 5
	*/
	public function set_pages_items($value){
		$this->pages_items = $value;
	}
	
	/*
	@ setter for URL 
	needed to perform the link with pages, e.g: site.com/something/?page= will be the url
    */	
	public function set_url($url){
		$this->url = $url;
	}
	
	/*
	@ returns the number of maxim page
	core of class
	*/
	public function page_numbers(){
		$pages = ceil($this->values/$this->per_page);
		return $pages;
	}
	/*
	@ engine of class
	returns an array with needed pages
	*/
	private function pages_array(){
		$pages = array();
		$mpag = ceil($this->pages_items/2);
		$aux = $this->current+$mpag;
		//var_dump($this->pages_items);
		//var_dump($this->page_numbers());
		if($this->pages_items > $this->page_numbers()){
			$this->pages_items = $this->page_numbers();
		}	
		switch($aux){
					
			case ($aux<=$this->page_numbers()) && $mpag<=$this->current :
				for($i=$this->current;$i<$this->current+$mpag;$i++){
					$pages[] = $i;
				}
				for($i=$this->current;$i>$this->current-$mpag;$i--){
					$pages[] = $i;
				}
				sort($pages);
				$pages = array_unique($pages);
				break;
			
			case ($this->current < $mpag):
				for($i=1;$i<=$this->pages_items;$i++){
					$pages[] = $i;
				}	
				break;
			
			case ($this->current+$mpag > $this->page_numbers()):
				for($i=$this->page_numbers()-$this->pages_items+1;$i<=$this->page_numbers();$i++){
					$pages[] = $i;
				}
				for($i=$this->current-$mpag+1;$i<$this->current;$i++){
					$pages[] = $i;
				}
				sort($pages);
				$pages = array_unique($pages);		
				break;			
		}
		return $pages;
	}
	
	/*
	Used to return only array with needed pages
	You can create your own view logic based on this array
	*/
	public function return_only_pages(){
		return $this->pages_array();
	}	
	
	/*
	@ view logic - HTML 
	*/
	public function show(){
		$output = '<style type="text/css">
.pagination{
	color:#274288
}

.pagination li{
	float:left;
	padding:4px;
	list-style:none;

	margin-left:3px;
	border:solid 1px #9aafe5;
}

	

.pagination li:hover {
	background-color:#105cb6;
	color:#fff;
}

.current {
	background-color:#105cb6;
	color:#fff;
}

.current a{
	color:#fff;
}	


.pagination li:hover a{
	color:#fff;
	text-decoration:underline;
}	

.normalpg {
	color:#274288;
	text-decoration:none;

}</style>
';
		$output .= '<div class="pagination">';
		$prev = $this->current-1;
		
		if($this->show_first==true){
			$output .= '<a class="normalpg" href="'.$this->url.'1"><li>First Page</li></a>';
		}
		if($this->current>1){
			$output .= '<a class="normalpg" href="'.$this->url.$prev.'"><li>Previous</li></a>';
		}
		$test = $this->pages_array();
		foreach($test as $t){
			if($this->current==$t){
				$output .= '<a class="current" href="'.$this->url.$t.'"><li class="current">'.$t.'</li></a>';
			} else {
				$output .= '<a class="normalpg" href="'.$this->url.$t.'"><li>'.$t.'</li></a>';
			}		
		}	
		$next = $this->current+1;
		if($this->current<$this->page_numbers()){
			$output .= '<a class="normalpg" href="'.$this->url.$next.'"><li>Next</li></a>';
		}
		if($this->show_last==true){
			$output .= '<a class="normalpg" href="'.$this->url.$this->page_numbers().'"><li>Last Page</li></a>';
		}	
		$output .= '<li> From '.$this->page_numbers().'</li>';
		$output .= '</div>';
		return $output;
	}
}

/*

$a = new pagination;	
/*
$a->set_current($page);

$a->set_pages_items(9);

$a->set_per_page(25);

$a->set_values(5441);

$a->show_pages($url);


$a->set_pages_items(15);

$a->show_pages($url);


$a->set_pages_items(5);

$a->set_last_page(true);

$a->set_first_page(true);

$a->show_pages($url);

$a->set_values(100);
$a->set_per_page(50);
$a->set_pages_items(17);

$a->set_last_page(true);

$a->set_first_page(true);

$a->show_pages($url);

*/
