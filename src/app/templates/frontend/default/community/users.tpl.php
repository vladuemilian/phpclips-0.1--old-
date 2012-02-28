<?php include LAYOUTS.'/header.php';?>


<div class="wrapper">


<div class="left">
	<?php include 'layouts/left-menu.php';?>
</div>
<div class="right">
	
	<div class="box-right">
		<div class="box-title">Filter members</div>
		content
	</div>
	<div class="users-list">
		<?php

		foreach($users as $user):
			echo '<ul class="user-box">';
			echo '<li><a href="'.SITE_URL.'/user/view/'.$user['ID'].'/'.$user['username'].'">'.$user['username'].'</a></li>';
			echo '<li>Registered: '.$user['date'].'</li>';
			echo '</ul>';
		endforeach;	

		?>
	</div>
	
</div>
<div class="box-right2">
		<li>Our community have <?php echo $total_members;?> registered members</li>
		<li>Newest member is <a href="<?php echo SITE_URL.'/user/view/'.$newest_member['ID'].'/'.$newest_member['username']?>"><?php echo $newest_member['username'];?></a></li>
	</div>	
<div class="pagination">
	<?php echo $pagination;?>
</div>	

<?php include LAYOUTS.'/footer.php';?>
