<?php


class template{
	
	var $headers = array();
	
	function header_extend($header){
		$this->headers[] = $header;
	}
	
	/*
	 * Description: this function is used to include headers in main header.tpl.php/other file
	 *
	 * //...
	*/ 
	function headers_include($default_path=true){
		if($default_path==true){
			$path = TEMPLATE_PATH;
		} else {
			$path = ROOT_PATH;
		}	
		foreach($this->headers as $header){
			echo $header;
		}
		/*foreach($this->headers as $header){
			include $path.'/'.$header;
		}*/
	}


}

