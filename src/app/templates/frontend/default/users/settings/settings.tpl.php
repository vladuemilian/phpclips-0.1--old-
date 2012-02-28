<?php include SETTINGS_PATH_TEMPLATE.'/_functions/view_helpers.php';?>
<?php include LAYOUTS.'/header.php' ?>

<div class="left">
	
	<?php include '_layouts/settings-leftmenu.tpl.php';?>	
</div>

<div class="right">
	<?php include 'settings.'.$action_path.'.tpl.php';?>
</div>
</div>
		

</div>


<?php include LAYOUTS.'/footer.php';?>
