<script src="js/jquery-1.10.1.min.js"></script> 
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

<p>request all new .webm files from kletskoffer</p>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> 
<input type="Submit" name="copyfiles" value="Submit"> 
</form>




<table id="example">
  <thead>
    <tr>
        <th class="site_name">Name</th>
        <th>date </th>
        <th>videosource</th>
        <th>thumbnailsource</th>
        <th>tags</th>
        <th>setting</th>
        <th>characters</th>
        <th>year</th>
        <th>emotion</th>
        <th>happiness</th>
        <th>amusing</th>
        <th>rating</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<?php
if(isset($_POST['copyfiles'])){
	include 'filecompare.php';

}

?>

<script>
var PHPresult;
var request = $.ajax({
		url: 'addthumbnailes.php',	
		type : 'POST',
		dataType: 'json',
		success : function (result) {
			PHPresult = (result.results);
			ShowEmptyThumbnailResults(PHPresult);
			console.log(PHPresult);
			//console.log(PHPresult[0]);
			FillTable(PHPresult);
			//var obj = jQuery.parseJSON(result.results);
			//alert( obj );
			//var x = eval('(' + result.results + ')');
			//console.log(x);
			
		}	
	});
	request.fail(function( jqXHR, textStatus ) {
	 	alert( "Request failed: " + textStatus );
	}
);

function ShowEmptyThumbnailResults(result){
	/*for (var i = 0; i < PHPresult.length; i++){		
	console.log('The ID is '+PHPresult[i][0]+
				' The Date is '+PHPresult[i][1]+
				' The Videosource is '+PHPresult[i][2]+
				' Tags are '+PHPresult[i][3]+
				' The Setting is '+PHPresult[i][5]+
				' The Characters are '+PHPresult[i][6]+
				' The Year is '+PHPresult[i][7]+
				' The Emotion is '+PHPresult[i][8]+
				' The Happiness is '+PHPresult[i][9]+
				' The Amusement Rate is '+PHPresult[i][10]+
				' The Rating is '+PHPresult[i][11]
				);
		for (var j = 0; j <PHPresult[i].length; j++){
			//console.log(PHPresult[i][j]);
		}
	}*/
}
//<input type="file" accept="image/*" />
function FillTable(results){
	var i = 0;
	$("#example").dataTable({
		"aaData":results,	
		"fnCreatedRow": function( nRow, aData, iDataIndex ) {
			if ( aData[3] == "" ){
				$('td:eq(3)', nRow).html( '<form action="movethumbnail.php?ID='+results[i][0]+'" method="post" enctype="multipart/form-data"> <label for="file">Filename:</label><input type="file" name="file" id="file"><br><input type="submit" name="submit" value="Submit"></form>' );
				console.log(results[i][0]);
				i++;
			}
		},
		
			
		"aoColumnDefs":[{
				"mdata":"hmmkauy",
				"sTitle":"Site name"
				, "aTargets": [ "site_name" ]
			
			}]
		});
}




window.onload = function() {
//var control = document.getElementById("fileupload0");
//console.log($("#fileupload0"));
$("#fileupload0").addEventListener("change", function(event) {

    // When the control has changed, there are new files

    var i = 0,
        files = control.files,
        len = files.length;

    for (; i < len; i++) {
        console.log("Filename: " + files[i].name);
        console.log("Type: " + files[i].type);
        console.log("Size: " + files[i].size + " bytes");
    }
	var form = new FormData();
		form.append("name", "Nicholas");
		form.append("photo", control.files[0]);
		
		// send via XHR - look ma, no headers being set!
		var xhr = new XMLHttpRequest();
		xhr.onload = function() {
			console.log("Upload complete.");
		};
		xhr.open("post", "C:/wamp/www/Tutweb/php/transfers", true);
		xhr.send(form);

}, false);
};
</script>