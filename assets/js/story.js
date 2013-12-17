/***************************
 ***************************
  Story
 ***************************
 ***************************/
 
function initializeStory(){
  loadStory(storyID);
}


function loadStory(ID){
  getVideo(ID).done(function(data){
    if(data.result[0]){
      var story = data.result[0];
      console.log(story);
      
      $('.video-details .title').html(story.title);
      $('.video-details .date').html(story.savedate.getDate()+"-"+(story.savedate.getMonth()+1)+"-"+story.savedate.getFullYear());
      $('.video-details .description').html(story.description);
      
      var $video = $('<video id="tutvideo" data-audio-src="'+story.audiosource+'" class="video-js vjs-default-skin"'+
                        'controls preload="auto" width="100%" height="100%"'+
                        'poster="'+story.images[1]+'"'+
                        'data-setup="{example_option:true}">'+
                       '<source src="'+story.videosource+'" type="video/mp4" />'+
                      '</video>');
      $('#video-holder').append($video);
      initializeVideoJS();

      $('.video-details .name-age').html(story.name +" ("+ calcAge(story.dob)+")");

      $('.video-details .year').html(story.year);
      $('.video-details .object').html(story.object);
      $('.video-details .location').html(story.location);
      $('.video-details .cast').html(story.cast);

      $('.video-details .meta-category1').data('value', story.category1);
      $('.video-details .meta-category2').data('value', story.category2);
      $('.video-details .meta-category3').data('value', story.category3);
      
      $(story.tags).each(function(){
        $('.video-details .meta-tags').append($('<span><a href="'+SITEURL+'/tag.php?tag='+this+'" class="btn btn-primary">'+this+'</a> </span>'));
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