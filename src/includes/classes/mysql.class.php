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

}

$mysql = mysql::singleton();
