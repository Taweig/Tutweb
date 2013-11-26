

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
$i = 0; 
$dir = 'transfers/';
$b=array();
$totalDirectorySize = 0;
if ($handle = opendir($dir)) {
	while (($file = readdir($handle)) !== false){
		if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) {	
			if (  substr(strrchr($file,'.'),1) == 'webm'){
				$i++;   
				array_push ($b,$file);
				$size = filesize('transfers/'.$file);
				$totalDirectorySize += $size;  
			}
		}
	}
} 
$responseArray = array('allnames' => $b,
						'webmfiles'=> $i,
						'directorySize' =>$totalDirectorySize);
					//	'realpath' => realpath);
						
var_dump($responseArray);



foreach($responseArray["allnames"] as $value){
	//echo $value;
	$local_file = "C:/wamp/www/Tutweb/php/transfers/".$value;
    $remote_file = "public_html/TUT/".$value;

    # FTP
    $server = "ftp://student-kmt.hku.nl/".$remote_file;

    # FTP Credentials
    $ftp_user = "david16";
    $ftp_password = "acNalk9";

    # Upload File
    $ch = curl_init();
    $ftp_file = fopen($local_file, 'r');
    curl_setopt($ch, CURLOPT_URL, $server);
    curl_setopt($ch, CURLOPT_USERPWD, $ftp_user.":".$ftp_password);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER , 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_UPLOAD, 1);
    curl_setopt($ch, CURLOPT_INFILE, $ftp_file);
    curl_setopt($ch, CURLOPT_INFILESIZE, filesize($local_file));
    curl_setopt($ch, CURLOPT_NOPROGRESS, false);
    curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'callback');
    curl_setopt($ch, CURLOPT_BUFFERSIZE, 64000);
	/*

	CURLOPT_FILE           => $fp,
	CURLOPT_TIMEOUT        => 50,
	CURLOPT_NOPROGRESS	   => false,
	CURLOPT_PROGRESSFUNCTION => 'callback',
	CURLOPT_BUFFERSIZE		=> 64000*/
	
    $result = curl_exec($ch);
}
   
function callback($download_size, $downloaded, $upload_size, $uploaded){
	//echo $download_size." ".$downloaded." ".$upload_size." ".$uploaded."<br>";
	global $totalpercentage,$nextdownload,$amountOfFilesToMove;
	
	$percentage = 0;
	if($upload_size > 0  ){	
		$percentage = $uploaded / $upload_size  * 100;
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