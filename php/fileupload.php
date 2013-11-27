

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
//get all info on .webm files currently on THIS server
$i = 0; 
$dir = 'transfers/';
$a=array();
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
$responseArray = array('allnames' => $a,
						'webmfiles'=> $i,
						'directorySize' =>$totalDirectorySize);
					//	'realpath' => realpath);
						
//var_dump($responseArray);
$amountOfFilesToMove = count($responseArray["allnames"]);
echo "on this server: <br>";
echo "There are $amountOfFilesToMove files with webm extension<br> ";
echo 'the names on this server are '.json_encode($responseArray["allnames"]).'<br>';	
echo 'the total disk space = '.$totalDirectorySize;
echo '<br>';  
echo '<br>'; 

//get all info on .webm files currently on the WEB server
$target_url = 'http://tuthut.nl/existingfiles.php/';
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
$filesToMove = array_diff($a, $b);
$amountOfFilesToMove = count($filesToMove);
var_dump ($filesToMove);
//echo json_encode($filesToMove).'<br>';
//----------------------------------------------------------------------------------------------



$totalpercentage = 0;
$nextdownload = false;
foreach($filesToMove as $value){
	global $totalpercentage,$nextdownload;
	//echo $value;
	$local_file = "C:/wamp/www/Tutweb/php/transfers/".$value;
   // $remote_file = "public_html/TUT/transfers/".$value;
    $remote_file = "httpdocs/videos/".$value;

    # FTP
    $server = "ftp://tuthut.nl/".$remote_file;

    # FTP Credentials
    $ftp_user = "tuthut";
    $ftp_password = "tut2013hut";

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
	$nextdownload = false;
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
//----------------------------------------------------------------------------------------
$connection1 =mysqli_connect("localhost","root","","NOM");
$connection2 =mysqli_connect("85.17.248.122","NOM","tut2013hut","NOM");

$localResults = mysqli_query($connection1,"SELECT * FROM videos");

while($row = mysqli_fetch_array($localResults, MYSQL_ASSOC)){
	mysqli_query($connection2,"INSERT INTO videos (".implode(", ",array_keys($row)).")  VALUES ('".implode("', '",array_values($row))." ')");
}
if (mysqli_connect_errno($connection1)){
  	echo "Failed to connect to MySQL connection1: " . mysqli_connect_error();
}
if (mysqli_connect_errno($connection2)){
  	echo "Failed to connect to MySQL connection2: " . mysqli_connect_error();
}

mysqli_close($connection1); 
mysqli_close($connection2);

?>