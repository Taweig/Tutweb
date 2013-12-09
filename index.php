<?php
  $file = explode(".",basename (__FILE__));
  $file = $file[0];
  require_once('inc/header.php');
?>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div id="video-gallery" class="royalSlider videoGallery rsDefault">
          </div>
        </div>
      </div><!-- .row -->

      <div class="row locations">
        <div class="col-md-4">
          <div>
            <table class="table table-striped table-hover" id="tuthutLocations">
              <tbody>
                <tr data-lat="52.515" data-lng="5.50" data-title="Lelystad" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Lelystad</td>
                  <td>14 november</td>
                </tr>
                <tr data-lat="52.366" data-lng="4.89" data-title="Amsterdam" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Amsterdam</td>
                  <td>16 november</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-8 tuthut-map">
          <div id="tuthutMap"></div>
        </div>
      </div><!-- .row.locations -->
      
      
      <div class="row">
        <div class="col-md-12">
          <h2>Give this quartet a few art.</h2>
          <div class="row">
            <div class="col-md-7">
              <p class="lead">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
              <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>Donec ullamcorper</strong> nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
            </div>
            <div class="col-md-5">
              <img src="<?=$site_url?>/assets/images/description-image.jpg" class="img-rounded img-responsive" />
              <p class="img-comment"><strong>Note:</strong> gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
            </div>
            
          </div>
        </div>
      </div><!-- .row -->
    </div><!-- .container -->
<?php
  require_once('inc/footer.php');
?>