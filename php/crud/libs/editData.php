<?php

	if(isset($_POST['edit_values']))//initiates on edit button
	{
		//upload the file given by input
		$filename;
		if ($_FILES["file"]["error"] > 0){
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else{
			echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		
			if (file_exists("upload/" . $_FILES["file"]["name"])){
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else{
				//$dir = $_SERVER['HTTP_HOST']."/uploads/";
				
				$dir = "../../uploads/";
				move_uploaded_file($_FILES["file"]["tmp_name"],	$dir . $_FILES["file"]["name"]);
				echo "Stored in: " . $dir . $_FILES["file"]["name"];
				$filename = ($dir . $_FILES["file"]["name"]);
				
				$poster = $filename;
				$thumbnail = $filename;		
				// Content type
				header('Content-Type: image/jpeg');
				
				// Get new dimensions
				list($posterwidth, $posterheight) = getimagesize($poster);
				$new_posterwidth = 940;
				$posterpercent = $posterwidth/$new_posterwidth;		
				$new_posterheight = $posterheight / $posterpercent;
				list($thumbnailwidth, $thumbnailheight) = getimagesize($thumbnail);
				$new_thumbnailwidth = 220;
				$thumbnailpercent = $thumbnailwidth/$new_thumbnailwidth;		
				$new_thumbnailheight = $thumbnailheight / $thumbnailpercent;
				
				// Resample
				$posterimage_p = imagecreatetruecolor($new_posterwidth, $new_posterheight);
				$posterimage = imagecreatefromjpeg($poster);
				imagecopyresampled($posterimage_p, $posterimage, 0, 0, 0, 0, $new_posterwidth, $new_posterheight, $posterwidth, $posterheight);
				$thumbnailimage_p = imagecreatetruecolor($new_thumbnailwidth, $new_thumbnailheight);
				$thumbnailimage = imagecreatefromjpeg($thumbnail);
				imagecopyresampled($thumbnailimage_p, $thumbnailimage, 0, 0, 0, 0, $new_thumbnailwidth, $new_thumbnailheight, $thumbnailwidth, $thumbnailheight);
				
				// Output
				$currenttime = date('d-m-Y_G-i-s');
				$postername = $dir.$currenttime.'_poster.jpg';
				$thumbnailname =  $dir.$currenttime.'_thumbnail.jpg';
				imagejpeg($posterimage_p, $postername);
				imagejpeg($thumbnailimage_p, $thumbnailname);
				unlink($filename);
				//wont work on localhost because of the 'Tutweb' directory 
				
//$site_url =  "http://".$_SERVER['HTTP_HOST']."/Tutweb";
				$postername =  site_url."/uploads/".$currenttime.'_poster.jpg';
				$thumbnailname =   site_url."/uploads/".$currenttime.'_thumbnail.jpg';
				//."/uploads/".$currenttime.'_thumbnail.jpg';
			}
		}
		
		
		//add everything to the database
		include_once( 'session.php' );
		
		$param = $_POST;
		$param['Thumbnailsource'] =$thumbnailname." , ".$postername;//eerst klein dan groot
		include_once( 'class.ManageDatabase.php' );
		$init = new ManageDatabase;
		$id = $_GET['id'];
		$edit_values = $init->editData($session_table_name,$param,$id);
		
		
		
		
	header("location: edit.php?id=".$id."");
	}	
?>