<?php
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
  	
	$uploads_dir = 'C:/wamp/www/Tutweb/php/transfers';
	
			$tmp_name = $_FILES["file"]["tmp_name"];
			$name = $_FILES["file"]["name"];
			move_uploaded_file($tmp_name, "$uploads_dir/$name");
			
			$newID = $_GET["ID"];
echo $newID;
$con=mysqli_connect("localhost","root","","NOM");
$sql ="UPDATE videos SET Thumbnailsource = ('$uploads_dir/$name') WHERE ID ='$newID'";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";
}


?>