<?php

class video_view_helper{

	public static function generate_video_player($id, $width=600, $height=400){
		$var = '<script type="text/javascript" src="'.SITE_URL.'/js/swfobject.js"></script>';
		
		
		$var .= '<div id="mediaspace"><a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash">Get the Adobe Flash Player to see this video.</a></div>';
		$var .= '<script type="text/javascript">';
		$var .= "
		  	var so = new SWFObject('".SITE_URL."/js/player/player.swf', 'flashContent', '".$width."', '".$height."', '9.0.124');
		 	so.addParam('allowscriptaccess',   'always');
		  	so.addParam('allowfullscreen',     'true');
		  	so.addParam('wmode',               'opaque');
		  	so.addVariable('file',  encodeURIComponent('".SITE_URL."/system/streaming/".$id."'));
		  	so.addVariable('provider',         'video');
		  	so.addVariable('controlbar',       'over');
		  	so.addVariable('stretching',       'none');
		  	so.addVariable('backcolor',        '000000');
		  	so.addVariable('frontcolor',       '999999');
		  	so.addVariable('lightcolor',       'FFFFFF');
		  	so.write('mediaspace');
			</script>
			";
		
		return $var;
	}
	
}
