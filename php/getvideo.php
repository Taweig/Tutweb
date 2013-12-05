<?php
require_once "connect.php";
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation&setting=Thuis&characters=Vrienden&year=1991-2000&emotion=3&happiness=3&amusing=3
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

$ID    = $_GET["ID"];
$query = "SELECT * 
					FROM
					videos
					WHERE ID = '".$ID."'";

$results = mysqli_query($con,	$query);	
									 


$thisResult = array();

while($row = mysqli_fetch_array($results)){
	array_push($thisResult,$row);	
}


$return = array(       
	'result' => $thisResult
);

echo json_encode($return) ;
?>