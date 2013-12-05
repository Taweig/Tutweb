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
                        '<div class="thumbnail" data-video-src="'+this.Videosource+'" data-audio-src="'+this.AudioSource+'">'+
                          '<img src="'+this.Videosource+'" alt="" class="img-responsive">'+
                          '<div class="caption">'+
                            '<h4>'+this.Title+'</h4>'+
                          '</div>'+
                        '</div>'+
                      '</div>');
          
      $('#storyContainer').append($item);
    });
  });
}