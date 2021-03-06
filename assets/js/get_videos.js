/***************************
 ***************************
  Stories
 ***************************
 ***************************/
 
 
function getVideos(options){

  var result = $.Deferred();

  var defaults = {
    search        : '',
    tag           : '',
    yearMin       : '',
    yearMax       : '',
    category1     : '',
    category2     : '',
    category3     : '',
    featured      : ''
  };
  
  var searchParams = $.extend({}, defaults, options); 

/*
	var tag1 = document.getElementById('tag1').value;
	var tag2 = document.getElementById('tag2').value;
	var tag3 = document.getElementById('tag3').value;
	var year = document.getElementById('YearTag').value;
	var setting = document.getElementById('SettingTag').value;
	var character = document.getElementById('CharacterTag').value;
	var emotion = document.getElementById('slider1').value;
	var happiness = document.getElementById('slider2').value;
	var amusing = document.getElementById('slider3').value;
*/
	
	
	//vraag database naar alle resultaten die gelijk zijn aan tag1
	////?tag1=' +tag1+ '&tag2=' +tag2+ '&tag3=' +tag3 +'&setting=' +setting +'&characters=' +character +'&year=' +year +'&emotion=' +emotion +'&happiness=' +happiness +'&amusing=' +amusing +' ',
	
	
  var request = $.ajax({
    url: SITEURL+'/php/getvideos.php',	
		type : 'GET',
		data: searchParams,
		dataType: 'json',
		success : function (data) {
      $(data.result).each(function(index){
        data.result[index] = parseVideo(this);
      });
      result.resolve(data);
		}	
	});
	request.fail(function( jqXHR, textStatus ) {
    alert( "Request failed: " + textStatus );
	});
	
	return result;
}


function getVideo(ID){

  var result = $.Deferred();
  
  var searchParams = {'ID':ID};
	
  var request = $.ajax({
    url: SITEURL+'/php/getvideo.php',	
		type : 'GET',
		data: searchParams,
		dataType: 'json',
		success : function (data) {
      $(data.result).each(function(index){
        data.result[index] = parseVideo(this);
      });
      result.resolve(data);
		}	
	});
	request.fail(function( jqXHR, textStatus ) {
    alert( "getVideo Request failed: " + textStatus );
	});
	
	return result;
}



function parseVideo(video){
  video.videosource = SITEURL+"/"+video.videosource;
  video.images      = video.images.split(" , ");
  if(video.images.length  === 1){
    video.images[0] = SITEURL+"/assets/images/no-thumb_small.jpg";
    video.images[1] = SITEURL+"/assets/images/no-thumb.jpg";
  }
  video.tags        = video.tags.split(", ");
  video.dob         = new Date(video.dob);
  video.savedate    = new Date(video.savedate);
  
  return video;
}




















