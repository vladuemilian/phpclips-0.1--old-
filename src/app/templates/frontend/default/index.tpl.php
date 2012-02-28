<?php include LAYOUTS.'/header.php';?>

<?php if(!$is_auth):?>

	<div class="loginbox">
		<div class="loginbox-container">
			<div class="loginbox-left">
				<img src="templates/frontend/default/images/people.png" width="400" height="300" />
			</div>
			
			<div class="loginbox-right">
				<div class="loginbox-right-login">
					<h1>Welcome to our video portal. Please register or login!</h1>
				</div>
				<div class="loginbox-right-login">
					<form action="" method="post">
						<span class="loginbox-text">Username: </span><span class="loginbox-field"><input type="text" name="username" class="inputfield"/></span>
						<br />
						<span class="loginbox-text">Password: </span><span class="loginbox-field"><input type="password" name="password" class="inputfield"/></span>
						<br />
						<input type="submit" value="Login"/>
					</form>
				</div>
				<div class="loginbox-right-separator">
					
				
				</div>
				<div class="clear"></div>
				<div class="loginbox-right-login">
					<form action="" method="post">
						<span class="loginbox-text">Username: </span><span class="loginbox-field"><input type="text" name="username" class="inputfield"/></span>
						<br />
						<span class="loginbox-text">Password: </span><span class="loginbox-field"><input type="password" name="password" class="inputfield"/></span>
						<br />
						<span class="loginbox-text">Repeat Password: </span><span class="loginbox-field"><input type="password" name="password" class="inputfield"/></span>
						<br />
						<span class="loginbox-text">Email Password: </span><span class="loginbox-field"><input type="text" name="password" class="inputfield"/></span>
						<br />
						<input type="submit" value="Register"/>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
<!--  ##########Facebook script################ -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--  ##########Facebook script################ -->
		<?php include LAYOUTS.'/header_box.php';?>
	</div>

</div>

<div class="bodywrapper">
	<div class="wrapper">
		<div class="topdata">
			<div class="topdata-leftside">
				<div class="featured-videos">
					<h1>Featured videos today!</h1>
					<?php 
					foreach($featured_videos as $video):
						echo '<li>';
							$video_object = new video_display_view_helper();
							$video_object->init($video);
							$video_object->set_desc($video['desc']);
							echo $video_object->html_video_featured();
						echo '</li>';
					endforeach;
					?>
				</div>
			</div>
			<div class="topdata-rightside">
				<div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="250" data-show-faces="true" data-stream="false" data-header="true"></div>
				<div class="topdata-rightside-adv" style="margin-top:10px;">
					<img src="templates/frontend/default/images/250x250-banner.jpg" width="250" height="250" />
				</div>
			</div>
		</div>
		<div class="mainvideos">
			<div class="barwrapper">
				<div class="barmenu">
					<li><a href="#">Latest videos</a></li>
					<li><a href="#">Most viewed</a></li>
					<li><a href="#">Top rated</a></li>
				</div>
			</div>
			<?php 
			/* call the helper to display video ! */
	
			foreach($latest_videos as $video):
				echo '<li>';
				$video_object = new video_display_view_helper();
				$video_object->init($video);
				echo $video_object->html_video();
				echo '</li>';
			endforeach;
			?>
		</div>
		<div class="clear"></div>



	<?php include LAYOUTS.'/footer.php';?>
</div>		