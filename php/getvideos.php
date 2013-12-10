<?php
require_once "connect.php";
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation&setting=Thuis&characters=Vrienden&year=1991-2000&emotion=3&happiness=3&amusing=3
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

/*
if(
  isset($_GET["tag1"]) &&
  isset($_GET["tag2"]) && 
  isset($_GET["tag3"]) && 
  isset($_GET["setting"]) && 
  isset($_GET["characters"]) && 
  isset($_GET["year"]) && 
  isset($_GET["emotion"]) && 
  isset($_GET["happiness"]) && 
  isset($_GET["amusing"])
  ){
*/

/*
$tag2           = $_GET["tag2"];
$tag3           = $_GET["tag3"];
$Setting        = $_GET["setting"];
$Characters     = $_GET["characters"];
*/
$tag            = $_GET["tag"];
$search         = $_GET["search"];
$yearMin        = ($_GET["yearMin"] ? $_GET["yearMin"] : 0);
$yearMax        = ($_GET["yearMax"] ? $_GET["yearMax"] : 9999);
$category1      = $_GET["category1"];
$category2      = $_GET["category2"];
$category3      = $_GET["category3"];
$featured       = $_GET["featured"];
$MaxSphereValue = 5;


/*
$query = "SELECT * 
					FROM
					videos
					WHERE tags LIKE '% ".$tag1." %' 
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE tags LIKE '% ".$tag2." %'
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE tags LIKE '% ".$tag3." %'
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE Setting = '$Setting'
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE Characters = '$Characters'	
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE year >= '$yearMin' AND year <'$yearMax' AND year != ''
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE featured = '$featured'								
					";

*/
/*
}else{
  $query = "SELECT * 
						FROM
						videos";
}
*/
if($tag){
  $query = "SELECT * 
  					FROM videos 
  					WHERE LOWER(tags) LIKE '%".strtolower($tag)."%'";
}else if($search){
  $query = "SELECT * 
  					FROM videos 
  					WHERE LOWER(title) LIKE '%".strtolower($search)."%'
  					AND year >= '$yearMin' AND year <='$yearMax' AND year != ''
  					OR LOWER(description) LIKE '%".strtolower($search)."%'
  					AND year >= '$yearMin' AND year <='$yearMax' AND year != ''";
}else if($featured){
  $query = "SELECT * 
  					FROM videos 
  					WHERE year >= '$yearMin' AND year <='$yearMax' AND year != '' AND featured = '$featured'";
}else{
  $query = "SELECT * 
  					FROM videos 
  					WHERE year >= '$yearMin' AND year <='$yearMax' AND year != ''";
}


$results = mysqli_query($con,	$query);	
									 


$thisResult = array();
if($results){
  while($row = mysqli_fetch_array($results)){
  	
  	$totalScore = 0;
  	$totalScore .= max(($row['category1']-$category1),0);
  	$totalScore .= max(($row['category2']-$category2),0);
  	$totalScore .= max(($row['category3']-$category3),0);
  	
  	$row['resemblance'] = $totalScore;	
  	array_push($thisResult,$row);	
  	
  }
  
  function cmp($a, $b){
    return strcmp($a["resemblance"], $b["resemblance"]);
  }
  
  usort($thisResult, "cmp");
}




$return = array(       
	'result' => $thisResult
);

echo json_encode($return) ;
?>