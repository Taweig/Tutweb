<?php

$i = 0; 
$dir = 'uploads/';
$b=array();
$totalDirectorySize = 0;

if ($handle = opendir($dir)) {
	while (($file = readdir($handle)) !== false){
		if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) {	
			if (  substr(strrchr($file,'.'),1) == 'webm'){
				$i++;   
				array_push ($b,$file);
				$size = filesize('uploads/'.$file);
				$totalDirectorySize += $size;  
			}
		}
	}
} 
$responseArray = array('allnames' => $b,
						'webmfiles'=> $i,
						'directorySize' =>$totalDirectorySize);
					//	'realpath' => realpath);
						
echo json_encode($responseArray);
?>