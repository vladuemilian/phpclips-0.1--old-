<?php include LAYOUTS.'/header.php';?>
<div class="wrapper">
<div class="right">
	<?php
	echo 'This video have these details: <br />';
	echo 'ID : '.$data->ID.'<br />';
	echo 'cat ID : '. $data->cat.'<br />';
	echo 'Title : '.$data->title.'<br />';
	echo 'Author : '.$data->author.'<br />';
	
	if($data->from==1):
	?>
		<iframe width="640" height="360" src="http://www.youtube.com/embed/<?php echo $data->embed;?>" frameborder="0" allowfullscreen></iframe>
	<?php 
	else:
		echo $video_player;
	endif;	
	?>
</div>	

<div class="test">
	<?php //echo SITE_URL.'/system/streaming/4e1db05a3044f'; ?>
</div>
<div id="clear" style="clear:both;"></div>
<?php include LAYOUTS.'/footer.php';?>
