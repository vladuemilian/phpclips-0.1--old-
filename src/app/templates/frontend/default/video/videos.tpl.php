<?php include LAYOUTS.'/header.php';?>


<div class="wrapper">

<div class="right">
	<b>In database are stored these videos:</b>
	<br />
	<?php
	foreach($data as $video_row):
		echo 'You are browsing the video with ID: '.$video_row['ID'].' and title: <a href="'.SITE_URL.'/video/'.$video_row['ID'].'/'.$video_row['slug'].'">'.$video_row['title'].'</a><br />';
	endforeach;	
	?>
</div>	
<div id="clear" style="clear:both;"></div>

<?php include LAYOUTS.'/footer.php';?>






