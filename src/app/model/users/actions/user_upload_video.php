<?php

global $template;
$template->header_extend('<link href="/templates/frontend/default/css/upload.css" rel="stylesheet" type="text/css" media="screen" />');

$form = new form;

$html_form = $form->form_start('upload_video','','POST','enctype="multipart/form-data"');
$html_form .= $form->form_text('Title','title','30','Full Title Name','maxlength="300"','');
$html_form .= $form->form_file('Video:','video','','Files of type: .avi');
$html_form .= $form->form_file('Thumbnail:','thumbnail','','Files of type: .jpg, .gif, .png');
$html_form .= $form->form_go('Send','Clear');


$errors = array();


//this code will be executed when de submit button is pushed
if(isset($_POST['submit'])){
	global $mysql, $user;

	$upload_data 		= new videoupload;
	$upload_data->config_path(date('m'),date('y'));
	
	$videos_temp_path	= date('y').'/'.date('m');
	
	$videos_path 		= VIDEOS_DIR.'/'.$videos_temp_path; //full physical path to videos directory
	
	if(!$upload_data->directories_validate()){
		$errors['make_dir'] = 'There was an error while trying to create the directory for this video. Please check the permissions on the /tmp dir!';
	}	
    $video_types 		= $upload_data->get_video_types(); //get video types!
	$video_file = new filevalidate;
	$video_file->valid_types($video_types);
	if(!$video_file->is_valid($_FILES['video']['name'])){
		$errors['video_type'] 		= 'This video extension is invalid!';
	}

	if(isset($_POST['thumbnail'])){
		$img_file 		= new filevalidate;
		$img_file->valid_types();
		
	}
	$video_id 		= uniqid();
	//echo uniqid();
	if(empty($errors)){
		
		$video = new ffmpeg_movie($_FILES['video']['tmp_name']);
		//echo $video->getFrameHeight();
		//echo $video->getFrameWidth();
		//ffmpeg -i input -vcodec libx264 -preset medium -crf 26 -threads 0 -acodec libmp3lame -aq 5 -ac 2 -ar 44100 output.flv
		
		//$var = exec('ffmpeg -i '.$_FILES['video']['tmp_name'].' -vcodec libx264 -preset medium -crf 26 -threads 0 -acodec libmp3lame -aq 5 -ac 2 -ar 44100 '.VIDEOS_DIR.'/'.$video_id.'');
		
		
		shell_exec('ffmpeg -i '.$_FILES['video']['tmp_name'].' -vcodec libx264 -preset medium -crf 26 -threads 0 -acodec libmp3lame -aq 5 -ac 2 -ar 44100 '.$videos_path.'/'.$video_id.'.flv');
	
		$validation 	= new validation;
		$title 			= $validation->string_data($_POST['title']); 		
		$slug 			= $upload_data->make_slug($title);
		//$filename 		= $video_id;
		$uid 			= $user->data['ID'];

		
		$mysql->query("INSERT INTO `videos` (cat, title, slug, filename, author, relative_path, extension) VALUES ('1', '$title', '$slug','$video_id', '$uid','$videos_temp_path','flv')");	
		
	} else {
		//var_dump($errors);
		$output = '';
		$i = 1;
		foreach($errors as $error){
			$output .= '# '.$i.' '.$error.'\n';
			$i++;
		}
		
		$log_file = LOGS_DIR.'/'.$video_id;
		$fh = fopen($log_file, 'w');
		fwrite($fh,$output);
		fclose($fh);
	}	
		
	
}

/*
$myFile = "testFile.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "Bobby Bopper\n";
fwrite($fh, $stringData);
$stringData = "Tracy Tanner\n";
fwrite($fh, $stringData);
fclose($fh);
*/
//var_dump($user);



set('form',$html_form);


