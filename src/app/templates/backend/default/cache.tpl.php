<?php include ADMIN_LAYOUTS.'/header.php';?>


<h1> Generate cache files </h1>
<br />

<form name="cache_functions" action="" method="post">


<div class="cache_list">
<?php

foreach($cache_functions as $cache_row):
	//echo $cache_row[0].' ';
	echo '<li class="left"><label for="'.$cache_row[1].'">'.$cache_row[0].'</label></li>';
	echo '<li class="right"><input type="checkbox" name="cache_func[]" value="'.$cache_row[1].'"></li>';
	
endforeach;	

?>
<li><input type="submit" value="Submit" name="send_data" /></li>
</div>
</form>

<br /><br /><br /><br />
<?php

if(isset($_POST['send_data'])):
	echo $message;
endif;
?>	

