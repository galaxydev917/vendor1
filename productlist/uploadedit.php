<?php

//upload.php
session_start();
if(!empty($_FILES))
{
	if (!file_exists('../products/'.$_SESSION["vendorid"])) 	
		mkdir('../products/'.$_SESSION["vendorid"], 0755, true);	

	if(is_uploaded_file($_FILES['edituploadFile']['tmp_name']))
	{
		sleep(1);
		$source_path = $_FILES['edituploadFile']['tmp_name'];
		
		$filename = isset($_FILES["edituploadFile"]["name"]) != '' ? $_FILES["edituploadFile"]["name"] : '';
		
		if( $filename != '' ){
			$img_src = 	'products/'.$_SESSION["vendorid"].'/'. $filename;
		
			if(move_uploaded_file($_FILES['edituploadFile']['tmp_name'], '../products/'.$_SESSION["vendorid"].'/'. $filename))
				echo '<img src="'.$img_src.'" class="img-thumbnail" width="300" height="250" />';
		}
		
	}
}

?>