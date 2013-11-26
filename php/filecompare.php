


<p id='progressbar'></p>
<img id='progressbarimg' src='orange.jpg' width = 1 height = 10/><br />
<p id='totalprogressbar'></p>
<img id='totalprogressbarimg' src='orange.jpg' width = 1 height = 10/><br />

<script>
function updateProgress(percentage,totalpercentage){
	document.getElementById('progressbar').innerHTML = parseInt(percentage)+'%';
	document.getElementById('progressbarimg').width = percentage*2;
	document.getElementById('totalprogressbar').innerHTML = parseInt(totalpercentage)+'%';
	document.getElementById('totalprogressbarimg').width = totalpercentage*2;
}


</script>

<?php

$target_url = 'http://192.168.0.122/recordJS/tuthutfiles.php/';
//$target_url = 'http://192.168.0.100/Tutweb/php/tuthutfiles.php/';
$a=array();
$i = 0; 
$dir = 'transfers/';
$files = glob($dir . "*.txt");
$totalDirectorySize = 0;

if ($handle = opendir($dir)) {
	while (($file = readdir($handle)) !== false){
		if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) {	
			if (  substr(strrchr($file,'.'),1) == 'webm'){
				$i++;   
				array_push ($a,$file);  
				$size = filesize('transfers/'.$file);
				$totalDirectorySize += $size;
			}
		}
	}
} 


echo "on this server: <br>";
echo "There are $i files with webm extension<br> ";
echo 'the names on this server are '.json_encode($a).'<br>';	
echo 'the total disk space = '.$totalDirectorySize;
echo '<br>';  
echo '<br>';  

echo "on the TutHut server: <br>";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$data=json_decode($response, true);
$b= $data['allnames'];

echo "There are ".$data['webmfiles']." files with webm extension<br> ";
echo 'the names on this server are '.json_encode($b).'<br>';
echo 'the total disk space = '.$data['directorySize'];
curl_close ($ch);
echo '<br>';  
echo '<br>';  
$filesToMove = array_diff($b, $a);
$amountOfFilesToMove = count($filesToMove);
echo $amountOfFilesToMove;
echo json_encode($filesToMove).'<br>';
//////////////////////////////////////////////////////////////////////////////////////////
//start moving the different files back

//$target_url = 'http://192.168.0.122/recordJS/tuthutfiles.php/';
$totalpercentage = 0;
$nextdownload = false;
foreach ($filesToMove as $value){
	global $totalpercentage,$nextdownload;

	$url = '192.168.0.122/recordJS/uploads/'.$value;
	$fp = fopen (dirname(__FILE__) . '/transfers/'.$value, 'w+');	
	$ch = curl_init($url);
	
	curl_setopt_array($ch, array(
	CURLOPT_URL            => $url,
	CURLOPT_BINARYTRANSFER => 1,
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_FILE           => $fp,
	CURLOPT_TIMEOUT        => 50,
	CURLOPT_NOPROGRESS	   => false,
	CURLOPT_PROGRESSFUNCTION => 'callback',
	CURLOPT_BUFFERSIZE		=> 64000
	));
	
	$results = curl_exec($ch);
	curl_close($ch);
	$nextdownload = false;
		
} 

function callback($download_size, $downloaded, $upload_size, $uploaded){
	global $totalpercentage,$nextdownload,$amountOfFilesToMove;
	$percentage = 0;
	if($download_size > 0  ){	
		$percentage = $downloaded / $download_size  * 100;
		//$totalpercentage += $percentage; 
		
		if ($percentage == 100 && $nextdownload == false){
			$nextdownload = true;
			$totalpercentage += 100/ $amountOfFilesToMove;
		}
		?><script>updateProgress(<?php echo '"'.$percentage.'","'.$totalpercentage.'"'  ?>);</script><?php
	}
	/*if ($percentage == 100 && $GLOBALS['nextDownload'] == false){
		echo'next'; 
		$nextDownload == true;
	}*/
	ob_flush();
	flush();
}

?>

