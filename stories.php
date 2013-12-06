<?php
  $file = explode(".",basename (__FILE__))[0];
  require_once('inc/header.php');
?>
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <h3>Koffer Stories</h3>
<!--
          <div class="row" id="">
            <div class="col-sm-12">
              <div class="tagsinput tagsinput-primary">
                <button type="button" class="btn btn-default" data-toggle="button">Single toggle</button>
              </div>
            </div>
          </div>
-->
          <div class="row" id="storyContainer">
          </div><!-- .row -->
        </div><!-- .col-sm-9 -->
        <div class="col-sm-3">
          <h3>Zoek</h3>
          <form class="" role="search">
            <input type="text" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-default sr-only">Submit</button>
          </form>
          
          <form class="" role="search">
              <p>Jaartal tussen</p>
              <p>
                <div class="row">
                  <div class="col-sm-5">
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-sm-2">
                    en
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="form-control">
                  </div>
                </div>
              </p>
                            
              
              <p>
                Blij
              </p>
              <div class="control-group">
                <input name="happy" class="inputNumber" hidden="hidden" value="3" />
                <div class="input-slider" class="ui-slider"></div> 
              </div>


              <p>
                Informatief
              </p>
              <div class="control-group">
                <input name="informative" class="inputNumber" hidden="hidden" value="3" />
                <div class="input-slider" class="ui-slider"></div> 
              </div>


              <p>
                Amusant
              </p>
              <div class="control-group">
                <input name="amusing" class="inputNumber" hidden="hidden" value="3" />
                <div class="input-slider" class="ui-slider"></div> 
              </div>

              
            <button type="submit" class="btn btn-primary btn-block">Zoek</button>
          </form>


        </div><!-- .col-sm-3 -->
      </div><!-- .row -->
    </div><!-- .container -->
<?php
  require_once('inc/footer.php');
?>