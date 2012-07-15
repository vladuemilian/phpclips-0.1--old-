<?php

class mysql{
	
	private $serveur = DB_HOST;
	private $login   = DB_USER;
	private $pass    = DB_PASS;
	private $bdd     = DB_NAME;
 
	public static $queries;
	private static $instance;

	private function __construct(){
		$this->connect();
		
	}

	public function connect(){
		@mysql_connect($this->serveur,$this->login,$this->pass) or die("<b>Error : </b><br /><pre>".mysql_error()."</pre>");
		@mysql_select_db($this->bdd) or die("<b>Error : </b><br /><pre>".mysql_error()."</pre>");
		//$this->query("set names 'utf8'");
	}

	public function query($query){
		$r = @mysql_query($query) or die("<b>Error : </b><br />$query<br /><pre>".mysql_error()."</pre>");
		self::$queries++;
		
		return $r;
	}
 
	public function qr($query){
		$r = $this->query($query);
		if(mysql_num_rows($r)>0){
			if(mysql_num_rows($r)==1){
				return mysql_fetch_array($r);
			} else {
				 $res = array();
				 while($arr = mysql_fetch_array($r)){
					 array_push($res,$arr);
				 }
			 return $res;
		   	 }
		 } else {
 			return NULL;
 		 }	
	}

	//num rows tt simple
	public function nr($query){
		return mysql_num_rows($this->query($query));
	}

	//last id
	public function lid(){
		return mysql_insert_id();
	}

	// fermeture de la connect mysql
	public function c(){
		mysql_close();
	}

	/* singleton */

	public static function singleton(){
		if (!isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	public function __clone(){
		trigger_error('no clone', E_USER_ERROR);
	}
	
	public function queries(){
		return self::$queries;
	}	
	
	//this function is used below
	//in pepare_value() method
	private function sanitize($value){
		return 	(string)mysql_real_escape_string(strip_tags(htmlentities($value,ENT_QUOTES,'UTF-8')));
	}
	
	/*===================
	 * function prepare_value()
	 * Description: this function prepares a value to be inserted in database
	 *				and prevents vulnerabilities like SQL Injection and Cross Site Scripting (XSS)
	 *				Also if you want to inert an array or an object into database,
	 *				this method will serialize it automatly
	 * Parameters: string $val -> the value you want to prepare to be inserted in database
	 * Returns: the sanitized value
	*/
	private function prepare_value($val){
		if( is_array($val) ){
			foreach($val as $key => $value )
				$val[$key] = $this->sanitize($value);
			return serialize($val);
		} elseif ( is_object($val) ){
			foreach(get_object_vars($val) as $var => $value)
					$val->$var = $this->sanitize($value);
			return serialize($val);
		}
		else return $this->sanitize($val);	
	}
	
	/*=================
	 * function update()
	 * Dscription: this method makes the UPDATE query easier
	 * Parameters:	string	$table -> the table you want to update
	 *				array	$vars  -> fields and values to update with
	 *								  eg: array( "user_password" => "new_password_goes_here")
	 *				array	$where -> field and value where to update
	 *								  eg: array( "user_id" => 10, "user_name" => 'john' )
	 * Returns: the mysql query reosurce resulted after processing the query
	*/
	public function update($table, $vars = array(), $where = array() ){
		
		$query = "UPDATE `$table` SET";
		foreach($vars as $field => $value ){
			$query .= " `$field`='".$this->prepare_value($value)."',";
		}
		$query = trim($query,',');
		$query .= " WHERE ";
		foreach($where as $field => $val )
			$query .= "`$field`='".$this->prepare_value($val)."' AND ";
		$query = rtrim($query, ' AND ');
		return $this->query($query);
	}
	
	/*=================
	 * function delete()
	 * Description: Read the update() method's documentation 
	 *				The parameters and return value are the same 
	 *				excepting that this function doesn't need the $vars parameter
	 *				and the query action is DELETE
	*/
	public function delete($table, $where=array()){
		
		$query = "DELETE FROM `$table` WHERE ";
		foreach($where as $field => $value)
			$query .= "`$field`='".$this->prepare_value($value)."' AND ";
		$query = rtrim($query,' AND ');
		return $this->query($query);
			
	}
	
	/*=================
	 * function insert()
	 * Description: Read the update() method's documentation 
	 *				The parameters are the same 
	 *				excepting that this function doesn't need the $where parameter
	 *				and the query action is INSERT
	 * Returns: the inserted id or false if the query failed.
	*/ 
	public function insert($table, $vars = array() ){
		
		$query = "INSERT INTO `$table`";
		$fields = ""; $values = "";
		foreach($vars as $field => $value ){
				$fields .= "`$field`,";
				$values .= "'".$this->prepare_value($value)."',";	
		}
		$query .= " (".rtrim($fields,',').") VALUES (".rtrim($values,',').")";
		$q =  $this->query($query);
		return $q ? mysql_insert_id() : $q;
			
	}

}

$mysql = mysql::singleton();
