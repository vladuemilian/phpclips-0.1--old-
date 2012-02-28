<form name="login_form" id="login_form" method="post" action="<?php echo SITE_URL;?>/user/login">
	<div class="separator">
	    <label for="login_username">Username:</label>
        <input name="username" type="text" class="login" value="" id="login_username" />
    </div>
    <div class="separator">
    	<label for="login_password">Password:</label>
        <input name="password" type="password" class="login" value="" id="login_password" />
    </div>
    <div class="separator">
    	<label for="login_remember">Remember:</label>
        <input name="login_remember" type="checkbox" id="login_remember" class="checkbox" />
       
    </div>
    <div class="separator">
    	<label for="login_submit">&nbsp;</label>
    	<input name="submit_login" type="submit" value="Login" id="login_submit" class="button" />
    	 <a href="<?php echo SITE_URL.'/user/register';?>">New here?</a>
    </div>
</form>
