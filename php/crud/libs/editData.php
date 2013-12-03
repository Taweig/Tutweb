<?php

	if(isset($_POST['edit_values']))//initiates on edit button
	{
		
		include_once( 'session.php' );
	
		$param = $_POST;
		include_once( 'class.ManageDatabase.php' );
		$init = new ManageDatabase;
		$id = $_GET['id'];
		$edit_values = $init->editData($session_table_name,$param,$id);
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
	header("location: edit.php?id=".$id."");
	}	
?>