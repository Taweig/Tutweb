<?php

	if(isset($_POST['edit_values']))//initiates on edit button
	{
		echo 'arg';
		include_once( 'session.php' );
	
		$param = $_POST;
		include_once( 'class.ManageDatabase.php' );
		$init = new ManageDatabase;
		$id = $_GET['id'];
		$edit_values = $init->editData($session_table_name,$param,$id);
		
		//$uploaddir = '/testuploads/';
		//$uploadfile = $uploaddir . basename($_FILES['Thumbnailfile']['name']);
		
		
		if ($_FILES["file"]["error"] > 0)		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else		{
			echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		
			if (file_exists("upload/" . $_FILES["file"]["name"]))			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else			{
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"testuploads/" . $_FILES["file"]["name"]);
				echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			}
		}
	//sleep(2);
	header("location: edit.php?id=".$id."");
	}	
?>