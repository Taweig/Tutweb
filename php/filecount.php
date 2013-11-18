<?php
$count = 0;
function foldersize($dir){
	$count_size = 0;
	$count = 0;
	$dir_array = scandir($dir);
	
	foreach($dir_array as $key=>$filename){
		if($filename!=".." && $filename!="." && $filename!=".wav"){
			$count++;
			if(is_dir($dir."/".$filename)){
				$new_foldersize = foldersize($dir."/".$filename);
				$count_size = $count_size + $new_foldersize[0];
				//$count = $count + $new_foldersize[1];
			}else if(is_file($dir."/".$filename)){
				$count_size = $count_size + filesize($dir."/".$filename);
				//$count++;
			}
		}
	}
	return array($count_size,$count);
}

$sample = foldersize("C:\wamp\www\uploads");
//echo $sample[1];
$advert = array(
        'ajax' => 'Hello world!',
        'advert' => 'hallo wereld',
		'files' => $sample[1]
     );
    echo json_encode($advert);
   // echo json_encode($advert);
?>