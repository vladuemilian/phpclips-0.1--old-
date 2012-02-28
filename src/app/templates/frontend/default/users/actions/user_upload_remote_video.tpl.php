<?php include LAYOUTS.'/header.php';?>
<div class="wrapper">
<div class="upload-wrapper">
	<div class="upload-top">
		<div class="upload-top-text">Upload a new video from remote sources!</div>
	</div>
	<div class="upload-bottom">
		<form action="" method="post">
			<input type="text" name="youtube_url" size="40" maxlenght="80" /><br />
			<input type="submit" name="send" value="Send" class="submit" /> 
		
		</form>
		<div id="clear" style="clear:both;"></div>
	</div>
	
	
	<?php 
	if(isset($errors)):
		echo '<div class="errors">';
			foreach($errors as $error):
				if(array_key_exists('1', $error)):
					echo '<li>This video already exists!</li>';
				endif;	
			endforeach;
		echo '</div>';
	
	endif;
	?>
	
	
</div>	

<?php include LAYOUTS.'/footer.php';?>