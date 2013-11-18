<?php
$server = 'student-kmt.hku.nl';
$username = 'david16';
$passwort = 'acNalk9';
// set up basic connection
$conn_id = ftp_connect($server);

ftp_login ($conn_id, $username, $passwort);
ftp_uploaddirectory($conn_id, 'C:/wamp/www/img/', 'public_html/downloads/');
ftp_quit($conn_id);

function ftp_uploaddirectory($conn_id, $local_dir, $remote_dir)
{
  @ftp_mkdir($conn_id, $remote_dir);
  $handle = opendir($local_dir);
  while (($file = readdir($handle)) !== false)
  {
    if (($file != '.') && ($file != '..'))
    {
      if (is_dir($local_dir.$file))
      {
        ftp_uploaddirectory($conn_id, $local_dir.$file.'/', $remote_dir.$file.'/');
      }
      else
        $f[] = $file;
    }
  }
  closedir($handle);
  if (count($f))
  {
    sort($f);
    @ftp_chdir($conn_id, $remote_dir);
    foreach ($f as $files)
    {
		//echo $files;
		//$uploads_dir = 'C:/wamp/www/js/';
      //$from = @fopen("$local_dir$files", 'r');
	  //fclose($from);
    // @ftp_fput($conn_id, $files, $from, FTP_BINARY);
	// ftp_nb_continue($conn_id);
	  //echo $files;
	  echo '<br/>';
	 // print ftell ($from)."\n";
	//echo move_uploaded_file($files,"$uploads_dir/$files");
	  //rename("$local_dir$files", "$local_dir/kolo.png");	  
	  //copy("$local_dir$files", "\\\\W7-12383\\Users\\Student\\Desktop\\sharedfolder\\kol.png");
	  $dir1 = "C:\Users\Student";
	$dir2 = "\\\\192.168.0.6\\F Drive\\";
	$dir3 = "\\\\W7-12383\\Users\\Student\\Desktop\\sharedfolder";
	$dir4 = "//192.168.0.6/F Drive/";
	opendir($dir3);
	//opendir($dir2);
	//opendir($dir3);
	//opendir($dir4);
    }
  }
}





// open some file for reading
/*$file = 'test.txt';

$fp = fopen($file, 'r');
$ftp_server = 'student-kmt.hku.nl';
// set up basic connection
$conn_id = ftp_connect($ftp_server);
$ftp_user_name = 'david16';
$ftp_user_pass = 'acNalk9';

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// try to upload $file
if (ftp_fput($conn_id, $file, $fp, FTP_ASCII)) {
    echo "Successfully uploaded $file\n";
} else {
    echo "There was a problem while uploading $file\n";
}

// close the connection and the file handler
ftp_close($conn_id);
fclose($fp);*/
?>