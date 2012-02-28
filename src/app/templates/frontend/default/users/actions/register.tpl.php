<?php include LAYOUTS.'/header.php' ?>
<div class="wrapper">
<form name="register_form" id="register_form" method="post" action="<?php echo SITE_URL;?>/user/register">
	<div class="separator">
	    <label for="register_username">Username:</label>
        <input name="username" type="text" class="login" value="" id="register_username" />
    </div>
    <div class="separator">
    	<label for="register_password">Password:</label>
        <input name="password" type="password" class="login" value="" id="register_password" />
    </div>
    <div class="separator">
    	<label for="register_password">Repeat Password:</label>
        <input name="rpassword" type="password" class="login" value="" id="register_rpassword" />
    </div>
    <div class="separator">
    	<label for="register_password">Email:</label>
        <input name="email" type="text" class="login" value="" id="register_email" />
    </div>
   
    <div class="separator">
    	<label for="register_submit">&nbsp;</label>
    	<input name="submit_register" type="submit" value="Register" id="register_submit" class="button" />
    	 
    </div>
</form>

<?php

if(isset($_POST['submit_register'])):
	echo 'sended';
endif;
?>	

<?php include LAYOUTS.'/footer.php';?>
