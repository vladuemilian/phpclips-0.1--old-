<?php include LAYOUTS.'/header.php';?>

<div class="wrapper">

<div class="left">
	<?php include CACHE_DIR.'/side_menu.cache.php';?>
</div>
<div class="right">
	<div class="breadsort-container">
		<div class="breadcrumb">
			<?php echo html_breadcrumb($cache);?>
		</div>
		<div class="sortby">
			<li>Sort by:</li>
			<?php foreach($sortby_args as $sortby_key => $sortby_arg):
				echo '<li><a href="'.get_category_url($cat_id).'&sortby='.$sortby_arg.'">'.$sortby_key.'</a></li>';
			endforeach;
			?>
		</div>
		
		<div class="timeline">
			<select name="test" onchange="gotourl(this.value)">
			<?php foreach($timeline_args as $timeline_key => $timeline_arg):
	
				if($timeline_arg==$current_timeline):
					echo '<option value="'.$cat_url.'&time='.$timeline_arg.'" selected>'.$timeline_key.'</option>';
				else:
					echo '<option value="'.$cat_url.'&time='.$timeline_arg.'">'.$timeline_key.'</option>';
				endif;
			endforeach;
			?>
			</select>
		</div>
	</div>
	<?php if(is_subcategories($cat_id)):?>	
		<div class="categories-wrapper">
			<li class="subcategories-title">Subcategories : </li>
			<?php echo list_subcategories($cache);?>
		</div>
	<?php endif;?>
	
	<div class="content">
		Category details
		
	</div>
</div>	
<div id="clear" style="clear:both;"></div>
<?php include LAYOUTS.'/footer.php';?>
