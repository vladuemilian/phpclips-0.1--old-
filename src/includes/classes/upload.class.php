<?php
/*
 * class upload
 * Description: this class makes file uploading easier
 *		just pass the $_POST file name on loadfile() method
 *		than set some attributes and finally call the save() method
 *		to store your file on disk
 * Usage: //instantiate the class 
 *	  $upload = new upload;
 *	  //set the conditions that file must meet
 *	  $upload->allow = array(
 *	  	'maxsize' => 10,
 *	  	'type'    => array(
 *	  		'image/jpeg',
 *	  		'image/gif'
 *	  	)
 *	  );
 *	  //check if desired file has the setted conditions
 *	  if( $upload->loadfile('post_file_name') ){
 *	  	//set details to save the file on disk
 *	  	$upload->location  = '/home/images';
 *	  	$upload->name	   = 'my_image';
 *	  	$upload->extension = 'png';
 *	  	//save file
 *	  	$upload->save() ? null : echo $upload->error_message();	
 *	  }
*/

class upload{
	
	/**
	 * array $allow()
	 * This array stores the criteries wich validates the file you upload.
	 * Usage:	array(
	 *			//what file types you allow to upload
	 *			'types' => array(
	 *					'image/jpeg',
	 *					'image/png'
	 *				   );
	 *			//the maximum size in MB that uploaded file must have
	 *			'maxsize' => 20
	 *		);
	*/
	public $allow = array();
	
	/**
	 * string $location
	 * Description: the path where you want to upload the file
	 *		ex: '/home/uploads/images'
	*/
	public $location;
	/**
	 * string $name 
	 * Description: the name wich you want to save the file with
	 *		ex: 'my_image'
	*/
	public $name;
	
	/**
	 * string $extension
	 * Description: the extension you want to save the file with
	 *		ex: 'jpg'
	*/
	public $extension;

	/**
	 * array $file
	 * Description: this attribute stores the $_FILES['filename'] array
	*/
	public $file;	
		
	/**
	 * function loadfile()
	 * Description: this method loads the file with $post_field name
	 *		and checks if it corresponds to given $allow variables
	 * Parameters: string $post_field -> the $_POST ($_FILES) file's name
	 * Return: true if the file is valid or false if not
	*/	
		
	public function loadfile($post_field){
	
		if(isset($_FILES[$post_field])){	
			$this->file = $_FILES[$post_field];
			if( empty($this->allow) ){ 
				return true;
			}
			else {
				$return = false;
				
				if( isset($this->allow['type']) ){
					
					foreach($this->allow['type'] as $type)
						if($this->file['type'] == $type) 
							$return = true;
					
					if( $return == true && isset($this->allow['maxsize']) ){
						$maxsize = $this->allow['maxsize'] *  1024 * 1024;
						$return =  ($this->file['size'] <= $maxsize) ? true : false;
					}
				}
				

				return $return;
			}
		} else
			return false;
	}
	
	/**
	 * function save()
	 * Note: you should call this function only after you set the following file properties:
	 *	-> $location
	 *	-> $name
	 *	-> $extension
	 *	If you did'n set the $name or $extension property, the file will be saved with default uploaded name
	 *
	 * Description: this method saves the file into disk with givent $location, $name  and $extension
	 * Returns: true if upload succeeded or false if not
	*/
	
	public function save(){
	
		if( empty($this->name) ){
			$this->name = $this->file['name'];
			$this->extension = '';
		} elseif( empty($this->extension) ){
			$this->extension = '.'.$this->extension();
		} else
		 	$this->extension = '.'.$this->extension;
		
		if( !empty($this->location) ){
			$this->location = rtrim($this->location,'/');
			$this->location .= '/';
		}
		
		if( $this->file['error'] > 0 )
			return false;
		
		return move_uploaded_file( $this->file['tmp_name'], $this->location.$this->name.$this->extension );
	}
	
	//function extension()
	//returns the uploaded file's extension
	//eg: jpg, png, gif, avi, withowt "." (point)
	public function extension(){
		if( isset($this->file['name']) ){
			$point = strrpos($this->file['name'],'.');
			return substr($this->file['name'], $point + 1, strlen($this->file['name']) - $point);
		}
	}
	
	//function size()
	//returns this file's size in MB
	public function size(){
		return number_format( ($this->file['size'] / (1024 * 1024) ), 1, '.', ',' );
	}
	/**
	 * function error_message()
	 * Parameters: int $code -> error code wich you want to translate
	 * Returns: the error message corresponding to the given code
	*/
	public function error_message( $code = false){
		if(!$code){
			$code = $this->file['error'];
		}
		switch($code){
			
			case 1: return "The file is too large for this server. Please contact administrator.";	break;//rejected by php.ini
			case 2: return "Please upload a smaller file";						break;//rejected by html form
			case 3: return "The uploaded file was partially uploaded";				break;
			case 4: return "No file was uploaded";							break;
			case 6:	return "Error uploading file: Missing temporary folder";			break;
			case 7:	return "Failed to write to disk";						break;
			case 8: return "An PHP extension stopped file uploading";				break;
			default:return "Fatal error!";								break;
		}
	}
	
}

?>
