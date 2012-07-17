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
 *	  $upload->allow(
 *	  	'maxsize' => 10,
 *	  	'type'    => array(
 *	  		'image/jpeg',
 *	  		'image/gif'
 *	  	);
 *	  );
 *	  //check if desired file has the setted conditions
 *	  if( $upload->loadfile('post_file_name') ){
 *	  	//set details to save the file on disk
 *	  	$upload->location  = '/home/images';
 *	  	$upload->name	   = 'my_image';
 *	  	$upload->extension = 'png';
 *	  	//save image
 *	  	$upload->save();	
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
	 * function loadfile()
	 * Description: this method loads the file with $post_field name
	 *		and checks if it corresponds to given $allow variables
	 * Parameters: string $post_field -> the $_POST ($_FILES) file's name
	 * Return: true if the file is valid or false if not
	*/
	
	
	private $file;	
		
		
	public function loadfile($post_field){
	
		if(isset($_FILES[$post_field])){	
			$this->file = $_FILES[$post_field];
			if( empty($this->allow) ){
				return true;
			}
			else {
				if( isset($this->allow['types'])){
					foreach($this->allow['types'] as $type)
						if($this->file['type'] == $type)
							return true;
					return false;
				}
				if( isset($this->allow['maxsize']) ){
					$maxsize = $this->file['size'] * 1024 * 1024;
					return ($this->file['size'] <= $maxsize) ? true : false;
				}
				return true;
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
	 * Returns: path to file if moving file succeeded or false if not
	*/
	
	public function save(){
		if( empty($this->name) || empty($this->extension) ){
			$this->name = $this->file['name'];
			$this->extension = '';
		} else 
			$this->extension = '.'.$this->extension;
		
		if( !empty($this->location) && $this->location != '/' ){
			$this->location .= '/';
		}
		
		if( $this->file['error'] > 0 )
			return false;
		return move_uploaded_file( $this->file['tmp_name'], $this->location.$this->name.$this->extension )
		? $this->location.$this->name.$this->extension
		: false;
	}
	
}

?>
