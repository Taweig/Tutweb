/***************************
 ***************************
  HOME
 ***************************
 ***************************/

function loadFeaturedSlider(){
  console.log('loadFeaturedSlider');
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
    autoScaleSliderHeight: 760,

    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    imgWidth: 640,
    imgHeight: 360

  });
  
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
    styles: styles
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