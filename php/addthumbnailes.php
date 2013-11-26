<?php
$con=mysqli_connect("localhost","root","","NOM");

	$result = mysqli_query($con,	"SELECT * 
									FROM
									videos 
									WHERE Thumbnailsource =' '
																	
									");	
									 

$array = array();

while($row = mysqli_fetch_array($result)){
	$x = array();
	$length = count($x);
	for ($i=0;$i < 12; $i++){
		array_push($x , $row[$i]);
	}
	
	array_push($array, $x);
	//echo $row[0];;
}
//$array
$noTNresults = array(       
	'results' => $array,
	//'videosource' => $row['Videosource']
);


echo json_encode($noTNresults) ;

?>