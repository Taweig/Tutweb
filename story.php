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
        <aside class="col-md-4 video-details">
          <h1 class="title">Loading...</h1>
          <small class="date">-</small>
          <p class="description"></p>
          
          <br/>
          
          <h5>Verteller</h5>
          <p class="name-age">-</p>
          
          <h5>Setting</h5>
          <table class="setting-details">
            <tr>
              <td>Jaar</td>
              <td class="year">-</td>
            </tr>
            <tr>
              <td>Object</td>
              <td class="object">-</td>
            </tr>
            <tr>
              <td>Lokatie</td>
              <td class="location">-</td>
            </tr>
            <tr>
              <td>Hoofdrolspelers</td>
              <td class="cast">-</td>
            </tr>
          </table>
          
          <br/>
          
          <div class="meta meta-ratings">
          
            <div class="control-group">
              <p>Blij</p>
              <div class="info-slider meta-category1" class="ui-slider"></div> 
            </div>

            <div class="control-group">
              <p>Historische relevantie</p>
              <div class="info-slider meta-category2" class="ui-slider"></div> 
            </div>

            <div class="control-group">
              <p>Vermakelijk</p>
              <div class="info-slider meta-category3" class="ui-slider"></div> 
            </div>
          </div><!-- .meta.meta-emotion -->
          
          <br/>
          
          <h5>Tags</h5>
          <div class="meta-tags">
          </div>
        </aside>
      </div>
    </div>
    <!-- /.container -->
<?php
  require_once('inc/footer.php');
?>