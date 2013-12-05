/***************************
 ***************************
  Stories
 ***************************
 ***************************/



function initializeStories(){
  loadStories();
}

function loadStories(){
  getVideos().done(function(data){  
    $(data.result).each(function(index){
      var $item = $('<div class="col-sm-6 col-md-4">'+
                        '<div class="thumbnail" data-video-src="'+this.Videosource+'" data-audio-src="'+this.AudioSource+'"><a href="story.php?id='+this.ID+'">'+
                          '<img src="'+this.images[0]+'" alt="">'+
                          '<div class="caption">'+
                            '<strong>'+this.Title+'</strong>'+
                          '</div>'+
                        '</a></div>'+
                      '</div>');
          
      $('#storyContainer').append($item);
    });
  });
}