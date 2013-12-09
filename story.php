<?php
  $file = explode(".",basename (__FILE__));
  $file = $file[0];
  require_once('inc/header.php');
?>
    <?php
      if(isset($_GET["id"])) echo "<script>storyID = ".$_GET["id"].";</script>";
    ?>
    <div class="container">
      <div class="row" id="story">
        <div class="col-md-8">
          <div id="video-holder"></div>
        </div>
        <div class="col-md-4">
          <h3 class="title">Loading...</h3>
          <p class="description"></p>
          
          <br/>
          
          <div class="meta meta-ratings">
            <div class="row">
              <div class="col-sm-2 col-md-4 col-lg-3">
                Blij
              </div>
              <div class="col-sm-10 col-md-8 col-lg-9">
                <div class="control-group">
                  <div class="info-slider meta-happiness" class="ui-slider" data-value=""></div> 
                </div>
              </div>
            </div><!-- .row -->
            <div class="row">
              <div class="col-sm-2 col-md-4 col-lg-3">
                Informatief
              </div>
              <div class="col-sm-10 col-md-8 col-lg-9">
                <div class="control-group">
                  <div class="info-slider meta-informative" class="ui-slider" data-value=""></div> 
                </div>
              </div>
            </div><!-- .row -->
            <div class="row">
              <div class="col-sm-2 col-md-4 col-lg-3">
                Amusant
              </div>
              <div class="col-sm-10 col-md-8 col-lg-9">
                <div class="control-group">
                  <div class="info-slider meta-amusing" class="ui-slider" data-value=""></div> 
                </div>
              </div>
            </div><!-- .row -->
          </div><!-- .meta.meta-emotion -->
          
          <br/>
          
          <div class="meta">
            <div class="row">
              <div class="col-sm-12">
                <strong>Tags</strong>
                <div class="meta-tags">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
<?php
  require_once('inc/footer.php');
?>