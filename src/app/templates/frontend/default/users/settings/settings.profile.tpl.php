<div class="settings-box">
	<h1>Account Settings</h1>
	<?php
		
		foreach($editables_fields as $module):
			echo '<div class="rowbox">';
			echo '<span class="data-field">'.$module['title'].':</span>';
			echo '<span class="data-content">'.show_datafield($module['data']).'</span>';
			echo '<span class="button">';
			echo '<a href="javascript:show_div(\''.$module['id'].'-div\')">Show </a>';
			echo '<a href="javascript:hide_div(\''.$module['id'].'-div\')">Hide</a>';
			echo '</span></div>';
			include '_layouts/edit_layouts/'.$module['id'].'.tpl.php';
			
			if($send):
				echo '<div class="edit-status">';
				if(empty($errors)){
					echo '<li>You successfuly edited your information!</li>';
				} else {
					foreach($errors as $error){
						echo '<li>'.$error.'</li>'; 
					}
				} 
				echo '</div>';	
			endif;		
			echo '</div>';
			
		endforeach;
		if($send):
	?>	
		<script type="text/javascript">show_div('<?php echo $post_key.'-div';?>')</script>
	<?php
		
		
		endif;		
	?>
