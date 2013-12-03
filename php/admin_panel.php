<?php
if(!isset($_SESSION['CurrentUser'])) 
{ 
session_start(); 
}  

if(isset($_SESSION['CurrentUser'])){
	echo 'Login Successful<br>';
	echo 'Ingelogd met koffer id '.$_SESSION['CurrentUser'].'<br>';
	//include_once('crud/index.php');
?>
    <html>
        <body>
        <a href='crud/index.php'>Click here to crud</a><br>
       	 <a href='logout.php'>Click here to log out</a>
        </body>
    </html>
<?php
}else{
	echo 'je bent niet ingelogd';	
}


?>

