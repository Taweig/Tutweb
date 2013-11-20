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
  
/*
      thumbs: {
        autoCenter: false,
        fitInViewport: true,
        orientation: 'vertical',
        spacing: 0,
        paddingBottom: 0
      },
*/
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

})(jQuery);
