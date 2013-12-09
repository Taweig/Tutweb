<?php
require_once "connect.php";
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation&setting=Thuis&characters=Vrienden&year=1991-2000&emotion=3&happiness=3&amusing=3
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
$searchvariables = false;

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

$searchvariables = true;

/*
$Tag2           = $_GET["tag2"];
$Tag3           = $_GET["tag3"];
$Setting        = $_GET["setting"];
$Characters     = $_GET["characters"];
*/
$Tag            = $_GET["tag"];
$Search         = $_GET["search"];
$YearMin        = ($_GET["yearMin"] ? $_GET["yearMin"] : 0);
$YearMax        = ($_GET["yearMax"] ? $_GET["yearMax"] : 9999);
$Happiness      = $_GET["happiness"];
$Interesting    = $_GET["interesting"];
$Amusing        = $_GET["amusing"];
$Featured       = $_GET["featured"];
$MaxSphereValue = 5;


/*
$query = "SELECT * 
					FROM
					videos
					WHERE Tags LIKE '% ".$Tag1." %' 
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE Tags LIKE '% ".$Tag2." %'
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE Tags LIKE '% ".$Tag3." %'
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
					WHERE Year >= '$YearMin' AND Year <'$YearMax' AND Year != ''
					UNION ALL
					SELECT * 
					FROM videos 
					WHERE Featured = '$Featured'								
					";

*/
/*
}else{
  $query = "SELECT * 
						FROM
						videos";
}
*/
if($Tag){
  $query = "SELECT * 
  					FROM videos 
  					WHERE LOWER(tags) LIKE '%".strtolower($Tag)."%'";
}else if($Search){
  $query = "SELECT * 
  					FROM videos 
  					WHERE LOWER(Title) LIKE '%".strtolower($Search)."%'
  					AND Year >= '$YearMin' AND Year <='$YearMax' AND Year != ''
  					OR LOWER(Description) LIKE '%".strtolower($Search)."%'
  					AND Year >= '$YearMin' AND Year <='$YearMax' AND Year != ''";
}else if($Featured){
  $query = "SELECT * 
  					FROM videos 
  					WHERE Year >= '$YearMin' AND Year <='$YearMax' AND Year != '' AND Featured = '$Featured'";
}else{
  $query = "SELECT * 
  					FROM videos 
  					WHERE Year >= '$YearMin' AND Year <='$YearMax' AND Year != ''";
}


$results = mysqli_query($con,	$query);	
									 


$thisResult = array();
if($results){
  while($row = mysqli_fetch_array($results)){
  	$boolean = true;
  	
  	$totalScore = 0;
  	
  	if($searchvariables){
  	
    	$interestingScore = ($row['Interesting']-$Interesting);
    	if ($interestingScore < 0){
    		$interestingScore = abs($interestingScore);
    	}
    	$interestingScore = $MaxSphereValue- $interestingScore;
    	$happinessScore = ($row['Happiness']-$Happiness);
    	if ($happinessScore < 0){
    		$happinessScore = abs($happinessScore);
    	}
    	$happinessScore = $MaxSphereValue- $happinessScore;
    	$amusingScore = ($row['Amusing']-$Amusing);
    	if ($amusingScore < 0){
    		$amusingScore = abs($amusingScore);
    	}
    	$amusingScore = $MaxSphereValue- $amusingScore;
    	$totalScore = $interestingScore+$happinessScore+$amusingScore;
    }
  	
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