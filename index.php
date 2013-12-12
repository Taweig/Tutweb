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

      <?php require_once('inc/map.php'); ?>

      
      <div class="row">
        <div class="col-md-12">
          <h2>Wat is Koffer Story?</h2>
          <div class="row">
            <div class="col-md-7">
              <p class="lead">Koffer Story is een platform dat draait om het op digitale wijze verzamelen en categoriseren van verhalen met als onderwerp een object van persoonlijke en/of historische waarde</p>
              <p>Medewerkers van het Nederlands Openluchtmuseum reizen door heel Nederland met de Koffer Story-koffer op zoek naar mooie verhalen die draaien om een bepaald object. Zij leggen deze verhalen met behulp van de koffer en het Koffer Story-systeem vast en uploaden deze naderhand naar de Koffer Story website. Zo wordt er een digitale collectie aangelegd met verhalen van allerlei soorten en maten waarmee wij samen een persoonlijk Nederlands erfgoed creëren.</p>
            </div>
            <div class="col-md-5">
              <img src="<?=$site_url?>/assets/images/description-image.jpg" class="img-rounded img-responsive" />
              <p class="img-comment"><strong>Note:</strong> Koffer Story-koffer</p>
            </div>
            
          </div>
        </div>
      </div><!-- .row -->
    </div><!-- .container -->
<?php
  require_once('inc/footer.php');
?>