<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Koffer Story</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="assets/css/flat-ui.css" rel="stylesheet">
    <link href="assets/css/tutweb-theme.css" rel="stylesheet">  

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
    <?php
      if(isset($_GET["id"])) echo "<script>storyID = ".$_GET["id"].";</script>";
    ?>
  </head>
  <body class="story">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="assets/images/logo.png" alt="Tuthut"></a>
        </div>
      
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="stories.html">Stories</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default sr-only">Submit</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
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


    <!-- Load JS here for greater good =============================-->
    <script src="assets/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="assets/js/tutweb.plugins.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap-select.js"></script>
    <script src="assets/bootstrap/js/bootstrap-switch.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobubble/src/infobubble-compiled.js"></script>
    <script src="assets/js/tutweb.js"></script>
  </body>
</html>