// Some general UI pack related JS
// Extend JS String with repeat method
String.prototype.repeat = function(num) {
  return new Array(num + 1).join(this);
};

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
    
    var $slider = $(".slider");
    if ($slider.length > 0) {
      $slider.slider({
        min: 1,
        max: 5,
        value: 3,
        orientation: "horizontal",/*
,
        range: "min"
*/
        slide: function (event, ui) {
          $(this).parent().find(".inputNumber").val(ui.value);
        },
        create: function(event, ui){
          $(this).slider('value',$(this).parent().find(".inputNumber").val());
        }
      });//.addSliderSegments($slider.slider("option").max);
    }
    
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
      autoScaleSliderWidth: 960,     
      autoScaleSliderHeight: 580,
  
      /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
      imgWidth: 640,
      imgHeight: 360
  
    });
    initializeMap();

})(jQuery);

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
      ]
      
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
      var image = 'images/tuthut-marker.png';
      var image = {
        url: 'images/tuthut-marker.png',
        // This marker is 20 pixels wide by 32 pixels tall.
        size: new google.maps.Size(36, 50),
        // The origin for this image is 0,0.
        origin: new google.maps.Point(0,0),
        // The anchor for this image is the base of the flagpole at 0,32.
        anchor: new google.maps.Point(18, 50)
      };
      
      var locations = [];
      $('#tuthutLocations tr').each(function(index){
        var location = {}
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
        }})(marker));
        
        google.maps.event.addListener(marker, 'click', (function(thisMarker){ return function(){
          toggleInfoBubble(thisMarker);
        }})(marker));
        
      });
    }
    
