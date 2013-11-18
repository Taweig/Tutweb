<?php
//require_once "connect.php";
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation
//http://localhost/php/getvideo.php?tag1=notimeline&tag2=nopictures&tag3=conversation&setting=Thuis&characters=Vrienden&year=1991-2000&emotion=3&happiness=3&amusing=3
$con=mysqli_connect("localhost","root","","NOM");
$Tag1 =  $_GET["tag1"];
$Tag2 =  $_GET["tag2"];
$Tag3 =  $_GET["tag3"];
$Setting =  $_GET["setting"];
$Characters =  $_GET["characters"];
$YearMin =  $_GET["year"];
$YearMax = $YearMin + 10;
$Emotion =  $_GET["emotion"];
$Happiness =  $_GET["happiness"];
$Amusing =  $_GET["amusing"];
$ThumbnailArray = array();
$i = 0;
$TagHitValue = 5;
$MaxSphereValue = 5;

	$result = mysqli_query($con,	"SELECT * 
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
									");	
									 



while($row = mysqli_fetch_array($result)){
	$boolean = true;
	$length = count($ThumbnailArray);
	for ($x=0; $x< $length; $x++)	{
		if ($ThumbnailArray[$x]['thumbnailsource'] == $row['Thumbnailsource']){
			$ThumbnailArray[$x]['resemblance'] +=$TagHitValue;		
			$boolean = false;
		}
	} 
	if ($boolean == true){
		$row_array['thumbnailsource'] = $row['Thumbnailsource'];
		$row_array['videosource'] = $row['Videosource'];
		$row_array['resemblance'] = 0;
		array_push($ThumbnailArray,$row_array);	
		
		$emotionScore = ($row['Emotion']-$Emotion);
		if ($emotionScore < 0){
			$emotionScore = abs($emotionScore);
		}
		$emotionScore = $MaxSphereValue- $emotionScore;
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
		$totalScore = $emotionScore+$happinessScore+$amusingScore;
		//echo  $totalScore."  ".$row['Thumbnailsource'];
		//echo '<br/>';
		$ThumbnailArray[$x]['resemblance'] +=$totalScore;	
		//print_r ($ThumbnailArray[0]['resemblance']);
	}
	
}
//echo json_encode($ThumbnailArray) ;
$advert = array(       
	'thumbnailsource' => $ThumbnailArray,
	//'videosource' => $row['Videosource']
);


echo json_encode($advert) ;
?>