<?php

//upload.php
session_start();
if(!empty($_FILES))
{
	if (!file_exists('../../../products/'.$_POST["add_vendorid"])) 	
		mkdir('../../../products/'.$_POST["add_vendorid"], 0755, true);	

	if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
	{
		sleep(1);
		$source_path = $_FILES['uploadFile']['tmp_name'];
		
		$filename = isset($_FILES["uploadFile"]["name"]) != '' ? $_FILES["uploadFile"]["name"] : '';
		
		if( $filename != '' ){
			$img_src = 	'../../products/'.$_POST["add_vendorid"].'/'. $filename;
		
			if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], '../../../products/'.$_POST["add_vendorid"].'/'. $filename))
				echo '<img src="'.$img_src.'" class="img-thumbnail" width="300" height="250" />';
		}
		
	}
}

?>