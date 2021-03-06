// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var KofferStory = {
  // All pages
  common: {
    init: function() {
      // JS here
    },
    finalize: function() { }
  },
  // Home page
  index: {
    init: function() {
      // JS here
      initializeHome();
      initializeMap();
    }
  },
  // Stories page
  stories: {
    init: function() {
      // JS here
      initializeStories();
    }
  },
  // Story page
  story: {
    init: function() {
      // JS here
      initializeStory();
    }
  },
  // Tag page
  tag: {
    init: function() {
      // JS here
      initializeTag();
    }
  },
  agenda: {
    init: function(){
      // JS here
      initializeMap();
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = KofferStory;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);

// Some general UI pack related JS
// Extend JS String with repeat method
String.prototype.repeat = function(num) {
  return new Array(num + 1).join(this);
};


function calcAge(dateString) {
  var birthday = +new Date(dateString);
  return ~~((Date.now() - birthday) / (31557600000));
}



(function($) {

    // jQuery UI Spinner
    $.widget( "ui.customspinner", $.ui.spinner, {
      widgetEventPrefix: $.ui.spinner.prototype.widgetEventPrefix,
      _buttonHtml: function() { // Remove arrows on the buttons
        return "" +
        "<a class='ui-spinner-button ui-spinner-up ui-corner-tr'>" +
          "<span class='ui-icon " + this.options.icons.up + "'></span>" +
        "</a>" +
        "<a class='ui-spinner-button ui-spinner-down ui-corner-br'>" +
          "<span class='ui-icon " + this.options.icons.down + "'></span>" +
        "</a>";
      }
    });

    $('#spinner-01, .spinner').customspinner({
      min: $(this).data("min"),
      max: $(this).data("max")
    }).on('focus', function () {
      $(this).closest('.ui-spinner').addClass('focus');
    }).on('blur', function () {
      $(this).closest('.ui-spinner').removeClass('focus');
    });
    $("select").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    
    var $inputSlider = $(".input-slider");
    if ($inputSlider.length > 0) {
      $inputSlider.slider({
        min: 1,
        max: 5,
        value: 3,
        range: 'min',
        orientation: "horizontal",
        slide: function (event, ui) {
          $(this).parent().find(".inputNumber").val(ui.value);
        },
        create: function(event, ui){
          $(this).slider('value',$(this).parent().find(".inputNumber").val());
        }
      });
    }        
})(jQuery);



function initializeVideoJS(){  
  videojs("tutvideo").ready(function(){
    var video = this;
  
    console.log(video.contentEl());
    
    
    var audio = document.createElement('audio');
    audio.setAttribute("preload", "auto");
    audio.autobuffer = true;
    
    var source1   = document.createElement('source');
    source1.type  = 'audio/wav';
    source1.src   = $(video.contentEl()).find("> video").data('audio-src');
    audio.appendChild(source1);
    audio.load();
    audio.volume = 1;
    
    
    video.on('volumechange', function(e){
      audio.volume = video.volume();
    });
    video.on('play', function(e){
      audio.play();
    });
    video.on('pause', function(e){
      audio.pause();
    });
    video.on('ended', function(e){
      audio.pause();
    });
    video.on('timeupdate', function(){
      if(Math.ceil(audio.currentTime) != Math.ceil(video.currentTime())){
        audio.currentTime = video.currentTime();
      }
    });
  });
}

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





















/***************************
 ***************************
  HOME
 ***************************
 ***************************/

function initializeHome(){
  loadFeaturedSlider();  
}


function loadFeaturedSlider(){
  console.log('loadFeaturedSlider');
  getVideos({featured: 1}).done(function(data){  
    $(data.result).each(function(index){
      var $item = $('<a data-rsw="1140" data-rsh="760">'+
                      '<video id="tutvideo" data-audio-src="'+this.AudioSource+'" class="video-js vjs-default-skin"'+
                        'controls preload="auto" width="100%" height="100%"'+
                        'poster="'+this.images[1]+'"'+
                        'data-setup="{example_option:true}">'+
                       '<source src="'+this.videosource+'" type="video/mp4" />'+
                      '</video>'+
                      '<img class="rsTmb" src="'+this.images[0]+'">'+
                    '</a>');
          
      $('#video-gallery').append($item);
    });
    
    
    initializeFeaturedSlider();

    
  });
}


function initializeFeaturedSlider(){
  $('#video-gallery').royalSlider({
    arrowsNav: false,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',
    keyboardNavEnabled: true,
    imageScaleMode: 'fill',
    imageAlignCenter:true,
    slidesSpacing: 0,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 3,
    sliderDrag: false,
    video: {
      autoHideArrows:true,
      autoHideControlNav:false,
      autoHideBlocks: true
    },
    thumbs: {
      appendSpan: true,
      firstMargin: true,
      paddingBottom: 0,
      spacing: 20
    },
    autoScaleSlider: true, 
    autoScaleSliderWidth: 1140,     
    autoScaleSliderHeight: 920,

    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    imgWidth: 640,
    imgHeight: 360

  });
  
  initializeVideoJS();
}




var map, infoBubble;

function toggleInfoBubble(marker){      

  infoBubble.setContent('<div id="content">'+
                          '<h6>'+marker.title+'</h6>'+
                          '<p style="font-size:100%;">'+marker.description+'</p>'+
                        '</div>');
                        
  infoBubble.open(map, marker);

}

function initializeMap() {    
  var myLatlng = new google.maps.LatLng(52.176, 5.75);
  
  var styles = [
    {
      "elementType": "labels",
      "stylers": [
        { "visibility": "off" }
      ]
    },{
      "featureType": "road",
      "stylers": [
        { "visibility": "off" }
      ]
    },{
      "featureType": "administrative.province",
      "stylers": [
        { "visibility": "off" }
      ]
    },{
    }
  ];
  
  var mapOptions = {
    zoom: 7,
    center: myLatlng,
    styles: styles,
    scrollwheel: false
  };
  map = new google.maps.Map(document.getElementById('tuthutMap'), mapOptions);      
  

  infoBubble = new InfoBubble({
    maxWidth: 300,
    content: 'bla'
  });

  
  loadMapMarkers();
}

function loadMapMarkers(){
  var image = {
    url: 'assets/images/tuthut-marker.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(36, 50),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(18, 50)
  };
  
  var locations = [];
  $('#tuthutLocations tr').each(function(index){
    var location = {};
    location.lat            = $(this).data('lat');
    location.lng            = $(this).data('lng');
    location.title          = $(this).data('title');
    location.description    = $(this).data('description');

    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(location.lat, location.lng),
      map: map,
      title: location.title,
      description: location.description,
      icon: image
    });
    
    
    
    
    
    
    
    
    $(this).click((function(thisMarker){ return function(){
      toggleInfoBubble(thisMarker);
    };})(marker));
    
    google.maps.event.addListener(marker, 'click', (function(thisMarker){ return function(){
      toggleInfoBubble(thisMarker);
    };})(marker));
    
  });
}
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
/***************************
 ***************************
  Tag
 ***************************
 ***************************/
 
function initializeTag(){
  loadStoriesByTag();
}


function loadStoriesByTag(){
  console.log('Yo Mama');
  getVideos({tag:TAG}).done(function(data){
    showStories($('#storyContainer'),data.result);
  });
}