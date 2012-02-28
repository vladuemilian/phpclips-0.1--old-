<div class="settings-box">
		<h1>Account Settings</h1>
		<ul>
			<span class="data-field">Username:</span><span class="data-content"><?php show_datafield($user_data['username']);?></span><span class="button"><a href="javascript:show_div('data-div')">Show</a> <a href="javascript:hide_div('data-div')">Hide</a></span>
			
		</ul>
		<div id="data-div" style="display:none;">aaaaaaaaaa</div>
		<ul>
			<span class="data-field">Password:</span><span class="data-content"><i>Your password</i></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=password">Edit</a></span>
			
		</ul>
		<ul>
			<span class="data-field">Email:</span><span class="data-content"><?php show_datafield($user_data['email']);?></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=email">Edit</a></span>
			
		</ul>
		<ul>
			<span class="data-field">Name:</span><span class="data-content"><?php show_datafield($user_data['name']);?></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=name">Edit</a></span>
			
		</ul>
		<ul>
			<span class="data-field">Location:</span><span class="data-content"><?php show_datafield($user_data['location']);?></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=location">Edit</a></span>
			
		</ul>
		<ul>
			<span class="data-field">IM:</span><span class="data-content"><?php show_datafield($user_data['IM']);?></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=im">Edit</a></span>
			
		</ul>
		<ul>
			<span class="data-field">Interest:</span><span class="data-content"><?php show_datafield($user_data['interest']);?></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=interest">Edit</a></span>
			
		</ul>
		<h1>Avatar Settings</h1>
		<ul>
			<span class="data-field">Avatar:</span><span class="data-content"><?php show_datafield($user_data['username']);?></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=username">Edit</a></span>
			
		</ul>
		<h1>Playlist Settings</h1>
		<ul>
			<span class="data-field">Playlist:</span><span class="data-content"><?php show_datafield($user_data['username']);?></span><span class="button"><a href="<?php echo SITE_URL;?>/user/settings&edit=username">Edit</a></span>
			
		</ul>
		
	</div>
