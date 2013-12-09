<?php
  $file = explode(".",basename (__FILE__));
  $file = $file[0];
  require_once('inc/header.php');
?>
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <h3>Koffer Stories</h3>
          <div class="row" id="storyContainer">
          </div><!-- .row -->
        </div><!-- .col-sm-9 -->
        <div class="col-sm-3">
          <?php require_once("inc/search-form.php"); ?>
      </div><!-- .row -->
    </div><!-- .container -->
<?php
  require_once('inc/footer.php');
?>