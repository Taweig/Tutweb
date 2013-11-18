var videoPlayer = document.getElementById('videoplayer');
videoPlayer.setAttribute("src", 'uploads/1.webm');
var audioPlayer = document.getElementById('audioplayer');
audioPlayer.setAttribute("src", 'uploads/1/1.wav');

var amountOfVideos;
var thumbnailArray;

function playVideo(videosource){
	videoPlayer.setAttribute("src", videosource);
	//audioPlayer.setAttribute("src", 'uploads/audio/'+videoNumber+'.wav');
}

function startVideo(){		
	videoPlayer.play();	
	interval = setInterval(update, 200);
}
function stopVideo(){		
	videoPlayer.pause();	
	clearInterval(interval);
}


function update(){
	var currentTimePercentage = (320/videoPlayer.duration)*videoPlayer.currentTime;
	$("#orangebar").width(currentTimePercentage);
}





//get the amount of video's available in 'uploads'
$.ajax({
	url: ' php/filecount.php',
	type : 'POST',
	dataType: 'json',
	success : function (result) {
		amountOfVideos = result['files']-1;//min 1 vanwege de audio file
	}
});


function applyTags(){	
	document.getElementById("thumbnails").innerHTML = "";//empty thumbnails div (kan eventueel een fancy transition bij)
	var PHPresult;
	var test;
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
		url: 'php/getvideo.php?tag1=' +tag1+ '&tag2=' +tag2+ '&tag3=' +tag3 +'&setting=' +setting +'&characters=' +character +'&year=' +year +'&emotion=' +emotion +'&happiness=' +happiness +'&amusing=' +amusing +' ',	
		type : 'POST',
		dataType: 'json',
		success : function (result) {
			PHPresult = result['thumbnailsource'];
			console.log(PHPresult);
			function compare(a,b) {
				if (a.resemblance > b.resemblance)
					return -1;
				if (a.resemblance < b.resemblance)
					return 1;
					return 0;
			}
			PHPresult.sort(compare);
			
			var counts = {};
			for (var i = 0; i < PHPresult.length; i++) {
				counts[PHPresult[i].resemblance] =1 + (counts[PHPresult[i].resemblance] || 0);
			}
			//console.log(counts);
			var a = Object.keys(counts).length;		//aantal waardes in counts
			var b = counts[Object.keys(counts)[0]];	//aantal per waarde 
			
			for (var i=0; i< (PHPresult.length);i++){
				var left = 100*i;
				var top = 0;
				var times = 0;
				//var resemblance = parseInt(PHPresult[i].resemblance);
				
				div = $("<img />")
				div.attr("id", 'lol');
				div.attr("src", PHPresult[i].thumbnailsource);
				div.attr("class", "thumb");
/*
				div.attr("width",'100');
				div.attr("height",'100');
				div.css("top",top);
				div.css("left",left);
				div.css("position",'absolute');
*/
				div.attr("onclick", "playVideo('"+PHPresult[i].videosource+"')");
				div.attr("Title",PHPresult[i].resemblance);
				 $("#thumbnails").append(div)
			}
		}	
	});
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});
}

window.onload = function(){	
	console.log('The amount of videos in general is '+amountOfVideos);
	applyTags();
}