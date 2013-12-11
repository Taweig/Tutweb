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
                <tr data-lat="52.00919" data-lng="5.90654" data-title="Arnhem" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Arnhem</td>
                  <td>18 december</td>
                </tr>
                <tr data-lat="52.515" data-lng="5.50" data-title="Lelystad" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Lelystad</td>
                  <td>14 januari</td>
                </tr>
                <tr data-lat="52.366" data-lng="4.89" data-title="Amsterdam" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Amsterdam</td>
                  <td>16 januari</td>
                </tr>
                <tr data-lat="52.0738" data-lng="4.298" data-title="Den Haag" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Den Haag</td>
                  <td>21 januari</td>
                </tr>
                <tr data-lat="51.9183" data-lng="4.4930" data-title="Rotterdam" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Rotterdam</td>
                  <td>24 januari</td>
                </tr>
                <tr data-lat="51.49469" data-lng="3.6121" data-title="Middelburg" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Middelburg</td>
                  <td>30 januari</td>
                </tr>
                <tr data-lat="51.5934" data-lng="4.7752" data-title="Breda" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Breda</td>
                  <td>2 februari</td>
                </tr>
                <tr data-lat="53.2227" data-lng="6.5661" data-title="Groningen" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Groningen</td>
                  <td>5 februari</td>
                </tr>
                <tr data-lat="53.1993" data-lng="5.7996" data-title="Leeuwarden" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Leeuwarden</td>
                  <td>5 februari</td>
                </tr>
                <tr data-lat="52.9571" data-lng="4.7591" data-title="Den Helder" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Den Helder</td>
                  <td>12 februari</td>
                </tr>
                <tr data-lat="52.22010" data-lng="6.8958" data-title="Enschede" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Enschede</td>
                  <td>16 februari</td>
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