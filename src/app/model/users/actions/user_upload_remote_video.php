<?php 


global $template, $mysql, $user; 
$template->header_extend('<link href="/templates/frontend/default/css/upload.css" rel="stylesheet" type="text/css" media="screen" />');


$form = new form;

$html_form = $form->form_start('upload_video','','POST','enctype="multipart/form-data"');
$html_form .= $form->form_text('Title','title','30','Full Title Name','maxlength="300"','');

$html_form .= $form->form_go('Send','Clear');

set('form',$html_form);



if(isset($_POST['send'])){
	/*$video = new video;
	$video_id = $video->get_youtube_id($_POST['youtube_url']);	
	$video_details = $video->get_youtube_details($video_id);

	//video details
		$video_title 	= mysql_real_escape_string($video_details['title']);
		$video_desc		= mysql_real_escape_string($video_details['desc']); 
		$video_slug		= $video->make_slug($video_title);
		$video_author 	= $user->data['ID'];
		$video_embed 	= 'http://youtube.com/embed/'.$video_id;
	//
	*/
	//$mysql->query("INSERT INTO `videos` (`cat`, `title`, `slug`, `desc`, `from`, `filename`, `author`, `relative_path`, `extension`, `embed`) VALUES (1, '$video_title', '$video_slug', '$video_desc', '1', '', '$video_author', '', '', '$video_embed')");
	
	$video = new upload_remote();
	
	$video_id = $video->get_youtube_id($_POST['youtube_url']);
	$video_details = $video->get_youtube_details($video_id);
	
	//var_dump($video_details);
	
	$data = array();
	
	$data['cat'] 		= 1;
	$data['title']		= mysql_real_escape_string($video_details['title']);
	$data['desc']		= mysql_real_escape_string($video_details['desc']);
	
	if(isset($user->data['ID'])){
		$data['author']	= $user->data['ID'];
	} else {
		$data['author']	= 0;
	}
	$data['embed']		= $video_id;
	$data['from']		= 1;
	$data['image'] 		= $video_id.'.jpg';
	

	
	
	//var_dump($video->check_if_exists($video_id));
	$video->upload($data);

}

/*debugging
	$video_title = 'a sample video title';
	$video_author = 2;
	$video_desc = 'another story about this video';
	$video_slug = 'a-sample-video-title';
//end debugging
$data = array('cat' =>  1,
			  'title' => $video_title,
			  'author' => $video_author,
			  'from' => 1,
			  'desc' => $video_desc,
			  'slug' => $video_slug,
			  'embed' => 'xyz'

);
$upload = new upload_remote($data);
$upload->upload();

var_dump($upload);
*/
