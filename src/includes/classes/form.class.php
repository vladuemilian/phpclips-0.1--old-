<?php
#Created by Michel Gomes Ank
#E-mail: michel@lafanet.com.br
#MSN: mitheus@bol.com.br
#ICQ: 530377777

############################################# OPENNING CLASS FORM #############################################

class form {
	
	#Function: <form...>
	function form_start($name,$action,$method,$add='') {
		$form = '';
		$form .= "<form name=\"".$name."\" action=\"".$action."\" method=\"".$method."\" ".$add.">\n";
		return $form;
	}
	#Function: <input text>
	function form_text($name_txt,$name,$length,$value='',$add='',$dps='') {
		return "\t<span>".$name_txt.": </span> <input type=\"text\" name=\"".$name."\" size=\"".$length."\" value=\"".$value."\" ".$add." /> ".$dps."<br />\n";
	}
	#Function: <selects>
	function form_select($name_txt,$name,$size,$opt_name,$opt_value,$selected='',$add='') {
		$select = "\t<span>".$name_txt.": </span>";
		$select .= "<select name=\"".$name."\" ".$add.">\n";
		$opt_name = explode(",",$opt_name);
		$opt_value = explode(",",$opt_value);
		$qts = count($opt_name);
		for($i=0;$i<$qts;$i++) {
			if($opt_value[$i] == $selected) {
				$select .= "\t\t<option selected value=\"".$opt_value[$i]."\">".$opt_name[$i]."</option>\n";
			}else{
				$select .= "\t\t<option value=\"".$opt_value[$i]."\">".$opt_name[$i]."</option>\n";
			}
		}
		$select .= "\t</select><br />\n";
		return $select;
	}
	#Function: <input checkbox...>
	function form_checkbox($name_txt,$name,$checked='',$value='1',$add='') {
		if($checked) $checked = "checked";
		return "\t<span>".$name_txt.": </span>".$this->form_hidden($name)."<input type=\"checkbox\" name=\"".$name."\" ".$checked." value=\"".$value."\" class=\"checkbox\" ".$add." /><br />\n";
	}
	#Function: <textarea...>
	function form_textarea($name_txt,$name,$rows,$cols,$value='',$add='') {
		return "\t<span>".$name_txt.":<br /><textarea name=\"".$name."\" rows=\"".$rows."\" cols=\"".$cols."\">".$value."</textarea></span><br />\n";
	}
	#Function: <input file>
	function form_file($name_txt,$name,$add='',$dps='') {
		return "\t<span>".$name_txt."</span><input type=\"file\" name=\"".$name."\" ".$add." /> ".$dps."<br />";
	}
	#Function: <input hidden...>
	function form_hidden($name,$value='',$add='') {
		return "\t<input type=\"hidden\" name=\"".$name."\" value=\"".$value."\" ".$add." />";
	}
	#Function: Submit/Reset
	function form_go($submit,$reset='') {
		$saida = "\n\t<span><br />";
		$saida .= "<input type=\"submit\" name=\"submit\" value=\"".$submit."\" class=\"submit\" />";
		if($reset) {
			$saida .= "&nbsp;&nbsp;&nbsp;<input type=\"reset\" name=\"reset\" value=\"".$reset."\" />";
		}
		$saida .= "</span>\n";
		return $saida;
	}
	#Closing the form
	function form_end() {
		return "</form>\n";
	}
}
############################################# CLOSING CLASS FORM #############################################
/*
#------------------------------------ [START] GENERATE THE FORM ----------------------------------# 
$form = new form; 
$print = $form->form_start("cadastro","","POST"); 
$print .= $form->form_text("Name","name","40","Your Full Name","maxlength=\"200\"","<b>Ex:</b> Michel Gomes Ank"); 
$print .= $form->form_select("Country","country","1","Canada,Brazil,EUA,Japan","C,B,E,J","B"); 
$print .= $form->form_checkbox("You know the Brazil?","brazil","checked","1"); 
$print .= $form->form_textarea("More information","more_inf","5","30"); 
$print .= $form->form_file("Photo","photo","","Files of type: .jpg"); 
$print .= $form->form_go("Send","Clear"); 
$print .= $form->form_end(); 
echo $print; 
#------------------------------------- [END] GENERATE THE FORM -----------------------------------# 
*/
?>
