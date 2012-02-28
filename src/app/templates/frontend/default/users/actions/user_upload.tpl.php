<?php include LAYOUTS.'/header.php';?>

<div class="wrapper">
<div class="upload-wrapper">
	<div class="upload-top">
		<div class="upload-top-text">Upload a new video!</div>
	</div>
	<div class="upload-bottom">
		<div class="upload-bottom-left">
			<div class="upload-methods">Select how you want to upload your video:</div>
			<div class="upload-methods-select">
				<li><a href="<?php echo SITE_URL;?>/upload/video">Video Upload</a></li>	
				<li><a href="<?php echo SITE_URL;?>/upload/remote-video">Youtube Video</a></li>
			</div>
		</div>
		<div class="upload-bottom-right">
			<span style="font-weight:bold;">Important!</span> Please upload or share only if you own the file or you have copyrights on it!
		</div>
		<div id="clear" style="clear:both;"></div>
	</div>
</div>	

<?php include LAYOUTS.'/footer.php';?>
