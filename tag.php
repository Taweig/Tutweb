<?php
  $file = explode(".",basename (__FILE__));
  $file = $file[0];
  require_once('inc/header.php');

  $tag = (isset($_GET['tag']) ? $_GET['tag'] : '');
  
  echo "<script>var TAG = '".$tag."';</script>";
?>
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <h3>Tag: <?= $tag; ?></h3>
          <div class="row" id="storyContainer">
          </div><!-- .row -->
        </div><!-- .col-sm-9 -->
        <div class="col-sm-3">
          <?php require_once("inc/search-form.php"); ?>
        </div><!-- .col-sm-3 -->
      </div><!-- .row -->
    </div><!-- .container -->
<?php
  require_once('inc/footer.php');
?>