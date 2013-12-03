/***************************
 ***************************
  HOME
 ***************************
 ***************************/

function loadStories(){
  getVideos().done(function(data){  
    $(data.result).each(function(index){
      var $item = $('<a data-rsw="1140" data-rsh="760">'+
                      '<video id="tutvideo" data-audio-src="'+this.AudioSource+'" class="video-js vjs-default-skin"'+
                        'controls preload="auto" width="100%" height="100%"'+
                        'poster="'+this.Thumbnailsource+'"'+
                        'data-setup="{example_option:true}">'+
                       '<source src="'+this.Videosource+'" type="video/webm" />'+
                      '</video>'+
                      '<img class="rsTmb" src="'+this.Thumbnailsource+'">'+
                    '</a>');
          
      $('#storyContainer').append($item);
    });
  });
}


function initializeStories(){
}