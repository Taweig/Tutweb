<?php
//echo phpinfo();
$target_url = 'http://192.168.0.122/recordJS/fileaccept.php/';
//$target_url = 'http://192.168.0.100/Tutweb/php/fileaccept.php/';
//$filename = 'nephew.wav';
//$filename = 'virus.txt';
//$filename = 'mdsv.docx';
$filename = 'ermgd.webm';
//$filename ='ermgd.webm';

$file_name_with_full_path = realpath($filename);
//$file = urlencode($file_name_with_full_path->title);

//echo $file;
$post = array('file_contents'=>'@'.$file_name_with_full_path);
//echo json_encode($post);
//echo '<br>';

function callback($download_size, $downloaded, $upload_size, $uploaded){
 if($download_size > 0)
         echo $upload_size;
		 echo '<br>';
}

//Initialise the cURL var
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_POST,1);
//curl_setopt($ch, CURLOPT_NOPROGRESS, false);
//curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'callback');
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/octet-stream'));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect: '));
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//then after curl_setopt($ch, CURLOPT_FILE, $fp);
//curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// Execute the request
$response = curl_exec($ch);

//$fd = fopen($file_name_with_full_path, 'w+');
//fwrite($fd, $response);
//fclose($fd);
curl_close ($ch);
echo $response;
?>