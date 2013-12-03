function CreateTable(){
	$('#example').show();
	var PHPresult;
	var request = $.ajax({
		url: 'addthumbnailes.php',	
		type : 'POST',
		dataType: 'json',
		success : function (result) {
			PHPresult = (result.results);
			console.log(PHPresult);
			FillTable(PHPresult);			
		}	
	});
	request.fail(function( jqXHR, textStatus ) {
	 	alert( "Request failed: " + textStatus );
	}
);


function FillTable(results){
	var i = 0;
	$("#example").dataTable({
		"aaData":results,	
		"fnCreatedRow": function( nRow, aData, iDataIndex ) {
			if ( aData[4] == "" ){
				$('td:eq(4)', nRow).html( '<form action="movethumbnail.php?ID='+results[i][0]+'" method="post" enctype="multipart/form-data"> <label for="file">Filename:</label><input type="file" name="file" id="file"><br><input type="submit" name="submit" value="Submit"></form>' );
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
}



