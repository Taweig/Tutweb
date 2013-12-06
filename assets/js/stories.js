/***************************
 ***************************
  Stories
 ***************************
 ***************************/



function initializeStories(){
  loadStories();
  $('#search-stories').submit(function(event){
    /* stop form from submitting normally */
    event.preventDefault();

    // get form data and include value from submit button
    console.log($(this).find("#maxYear"));
    var post_data = { search      : $(this).find("#search").val(),
                      yearMin     : $(this).find("#yearMin").val(),
                      yearMax     : $(this).find("#yearMax").val(),
                      happiness   : $(this).find("#happiness").val(),
                      informative : $(this).find("#informative").val(),
                      amusing     : $(this).find("#amusing").val()};
    $('#storyContainer').html('<h5>Loading...</h5>');
    getVideos(post_data).done(function(data){  
      $('#storyContainer').html('');
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
  
    return false;
  });
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


function searchStories(){
  
}