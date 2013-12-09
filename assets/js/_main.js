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
