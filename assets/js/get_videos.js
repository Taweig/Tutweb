/***************************
 ***************************
  GET VIDEOS
 ***************************
 ***************************/
 
 
function getVideos(){

	var tag1 = document.getElementById('tag1').value;
	var tag2 = document.getElementById('tag2').value;
	var tag3 = document.getElementById('tag3').value;
	var year = document.getElementById('YearTag').value;
	var setting = document.getElementById('SettingTag').value;
	var character = document.getElementById('CharacterTag').value;
	var emotion = document.getElementById('slider1').value;
	var happiness = document.getElementById('slider2').value;
	var amusing = document.getElementById('slider3').value;
	
	
	//vraag database naar alle resultaten die gelijk zijn aan tag1
	////?tag1=' +tag1+ '&tag2=' +tag2+ '&tag3=' +tag3 +'&setting=' +setting +'&characters=' +character +'&year=' +year +'&emotion=' +emotion +'&happiness=' +happiness +'&amusing=' +amusing +' ',
	
	
  var request = $.ajax({
    url: 'php/getvideo.php',	
		type : 'GET',
		dataType: 'json',
		success : function (data) {
      console.log(data);
		}	
	});
	request.fail(function( jqXHR, textStatus ) {
    alert( "Request failed: " + textStatus );
	});
	
	return request;
}