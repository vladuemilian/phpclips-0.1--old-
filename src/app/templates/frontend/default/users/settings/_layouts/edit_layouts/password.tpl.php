
<div id="password-div" class="edit-wrapper-box" style="display:none;" >

<form action="" method="post">
<li><span class="field-left" >Current Password:</span><span class="field-right"><input type="password" name="apassword"/></span></li>
<li><span class="field-left" >New Password: </span><span class="field-right"><input type="password" name="npassword" /></span></li>
<li><span class="field-left" >Repeat Password: </span><span class="field-right"><input type="password" name="rpassword" /></span></li>

<input type="submit"  value="Submit" name="send[password]" />
</form>
<?php 
/*var_dump($_POST);
if(isset($_POST['send']['password'])):
	echo '<script type="text/javascript">show_div(\''.$module['id'].'-div\')</script>';	
endif;	
foreach($errors as $error):
	echo $error;
endforeach;	*/
?>


