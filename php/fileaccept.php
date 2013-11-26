<?php
$uploaddir = realpath('./') ;
$uploadfile = $uploaddir .'\\transfers'.'\\'. basename($_FILES['file_contents']['name']);
echo $uploadfile;
echo '<pre>';
 
//echo ini_get('post_max_size');
	if (move_uploaded_file($_FILES['file_contents']['tmp_name'], $uploadfile)) {
	    echo "File is valid, and was successfully uploaded.\n";
		echo '<br>';
	} else {
	    echo "Possible file upload attack!\n";
	}
	echo 'Here is some more debugging info:';
	print_r($_FILES);
	echo "\n<hr />\n";
	//print_r($_POST);
//print "</pr" . "e>\n";
?>