<?php

class validation{





	function username($user){
	
		
	}
	/*
	 * Description: email validation
	 *
	 * bool mail(string $email)
	 *
	*/ 
	function mail($email){ 
	/*  ====== 	DEPRECATED ======
		$qtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]'; 
		$dtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]'; 
		$atom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c'. 
		            '\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+'; 
		$quoted_pair = '\\x5c\\x00-\\x7f'; 
		$domain_literal = "\\x5b($dtext|$quoted_pair)*\\x5d"; 
		$quoted_string = "\\x22($qtext|$quoted_pair)*\\x22"; 
		$domain_ref = $atom; 
		$sub_domain = "($domain_ref|$domain_literal)"; 
		$word = "($atom|$quoted_string)"; 
		$domain = "$sub_domain(\\x2e$sub_domain)*"; 
		$local_part = "$word(\\x2e$word)*"; 
		$addr_spec = "$local_part\\x40$domain"; 

		return preg_match("!^$addr_spec$!", $email) ? true : false; 
	*/
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}  
	
	
	function string_data($string){
		return mysql_real_escape_string(strip_tags(htmlspecialchars($string, ENT_QUOTES, "UTF-8")));
	}
	
	
	function string($input){
		$input = mysql_real_escape_string($input);
		return $input;
	}
	
	function years($years){
		if(is_numeric($years)){
			if($years<100){
				return (int) $years;
			} else {
			return false;
			}	
	}
	}
		
	
}
