<?php 
require_once "connect.php";
$myusername=$_GET['username']; 
$mypassword=$_GET['password']; 

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM koffers WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
if($count==1){
	session_start();
	$_SESSION['CurrentUser'] = $myusername;
	header("location:crud/index.php");
}
else {
	echo "Wrong Username or Password";
}
?>