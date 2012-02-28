<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Video script by pcportal.ro</title>

<link href="/templates/frontend/default/css/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/templates/frontend/default/css/dropdown.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" language="javascript" src="<?php echo SITE_URL;?>/js/dropdown.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo SITE_URL;?>/templates/frontend/system/general.js"></script>
<?php $template->headers_include(); ?>
</head>
<body>


<div class="topwrapper">
	<div class="topcenter">
		<div class="topcenter-left">
			<?php if(!$is_auth): ?>
				<li><a href="<?php echo SITE_URL;?>/user/register">Register</a></li>
				<li><a href="<?php echo SITE_URL;?>/user/login">Login</a></li>
			<?php else: ?>
				
				<li>You are logged as: <a href="<?php echo SITE_URL.'/user/view/'.$UID.'/'.$username;?>"><?php echo $username;?></li></a>
				
				<?php endif; ?>
		</div>		
				<div class="topcenter-right">
					
					<div class="second-headmenu-container">
						<?php include CACHE_DIR.'/top_menu.cache.php';?>
					</div>
			
					<?php if($is_auth):?>		
							<li><ul id="sddm">
								<li><a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">Account</a>
									<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()"  style="background-color:#dcdcdc" >
							
										<img src="<?php echo $user_data['avatar_link'];?>" width="123" height="110" class="avatar-dropdown-image"/>
									
										<a href="<?php echo SITE_URL;?>/user/settings">Settings</a>
									
										<?php if($is_admin): ?>
											<a href="<?php echo SITE_URL;?>/admin">Admin Panel</a>
										<?php endif; ?>
										<a href="<?php echo SITE_URL;?>/user/logout">Logout</a>
									</div>
								</li>
							</ul></li>
						<div style="clear:both"></div>
					<?php endif;?>
			
				</div>	
	<div style="clear:both"></div>			
	</div>
				
</div>

	
<?php include HELPERS.'/general.helpers.php';?>		
