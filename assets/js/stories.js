/***************************
 ***************************
  Stories
 ***************************
 ***************************/



function initializeStories(){
  
  $('#search-stories').submit(function(event){
    /* stop form from submitting normally */
    event.preventDefault();

    // get form data and include value from submit button
    console.log($(this).find("#maxYear"));
    var post_data = { search      : $(this).find("#search").val(),
                      yearMin     : $(this).find("#yearMin").val(),
                      yearMax     : $(this).find("#yearMax").val(),
                      category1   : $(this).find("#category1").val(),
                      category2   : $(this).find("#category2").val(),
                      category3   : $(this).find("#category3").val()};

    $('#storyContainer').html('<h5>Loading...</h5>');

    getVideos(post_data).done(function(data){  
      $('#storyContainer').html('');
      
      if(data.result.length > 0){
        $(data.result).each(function(index){
          var $item = $('<div class="col-sm-6 col-md-4">'+
                            '<div class="thumbnail" data-video-src="'+this.videosource+'" data-audio-src="'+this.audiosource+'"><a href="'+SITEURL+'/'+this.ID+'">'+
                              '<img src="'+this.images[0]+'" alt="">'+
                              '<div class="caption">'+
                                '<strong>'+this.title+'</strong>'+
                              '</div>'+
                            '</a></div>'+
                          '</div>');
          
          $('#storyContainer').append($item);
        });
      }else{
        $('#storyContainer').append('<h4 class="col-md-12">Sorry, geen resultaten gevonden...</h4>');
      }
      
      
    });
  
    return false;
  });
  
  if($('#search').val() !== ''){
    $('#search-stories').submit();
  }else{
    loadStories();
  }

  
  
}

function loadStories(){
  getVideos().done(function(data){
    showStories($('#storyContainer'),data.result);
  });
}


function showStories($target,stories){
  
  $(stories).each(function(index){
  
    var $item = $('<div class="col-sm-6 col-md-4">'+
                      '<div class="thumbnail" data-video-src="'+this.videosource+'" data-audio-src="'+this.audiosource+'"><a href="'+SITEURL+'/'+this.ID+'">'+
                        '<img src="'+this.images[0]+'" alt="">'+
                        '<div class="caption">'+
                          '<strong>'+this.title+'</strong>'+
                        '</div>'+
                      '</a></div>'+
                    '</div>');
        
    $target.append($item);
    
  });
  
}

function searchStories(){
  
}