/***************************
 ***************************
  Story
 ***************************
 ***************************/
 
function initializeStory(){
  loadStory(storyID);
}


function loadStory(ID){
  console.log('loadStory');
  getVideo(ID).done(function(data){
    if(data.result[0]){
      var story = data.result[0];
      
      $('#story h3.title').html(story.Title);
      $('#story p.description').html(story.Description);
      
      var $video = $('<video id="tutvideo" data-audio-src="'+story.AudioSource+'" class="video-js vjs-default-skin"'+
                        'controls preload="auto" width="100%" height="100%"'+
                        'poster="'+story.images[1]+'"'+
                        'data-setup="{example_option:true}">'+
                       '<source src="'+story.Videosource+'" type="video/webm" />'+
                      '</video>');
      $('#video-holder').append($video);
      initializeVideoJS();
      

      $('#story .meta-happiness').data('value', story.Happiness);
      $('#story .meta-informative').data('value', story.Interesting);
      $('#story .meta-amusing').data('value', story.Amusing);
      
      $(story.Tags).each(function(){
        $('#story .meta-tags').append($('<span><a href="'+SITEURL+'/tag.php?tag='+this+'" class="btn btn-primary">'+this+'</a> </span>'));
      });
      
      
      var $infoSlider = $(".info-slider");
      if ($infoSlider.length > 0) {
        $infoSlider.slider({
          min: 1,
          max: 5,
          range: 'min',
          value: 0,
          disabled: true,
          orientation: "horizontal",
          create: function(event, ui){
            $(this).slider('value',$(this).data('value'));
          }
        });
      }
  
    }
  });
}