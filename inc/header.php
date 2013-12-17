<?php
  require_once('head.php');
  $searchVariable = '';  
  if(isset($_POST['search'])){
    $searchVariable = $_POST['search'];
  }
?>
  <body class="<?=$file?>">
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
          <a class="navbar-brand" href="<?=$site_url?>"><img src="<?=$site_url?>/assets/images/logo.png" alt="Tuthut"></a>
        </div>
      
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?=$site_url?>">Home</a></li>
            <li><a href="<?=$site_url?>/stories">Stories</a></li>
            <li><a href="<?=$site_url?>/agenda">Agenda</a></li>
            <li><a href="<?=$site_url?>/wat-is-koffer-story">Wat is Koffer Story</a></li>
            <li><a href="<?=$site_url?>/admin">Login</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="search" method="post" action="<?=$site_url?>/stories">
            <div class="form-group">
              <input name="search" type="text" class="form-control" placeholder="Zoek" value="<?=$searchVariable?>">
            </div>
            <button type="submit" class="btn btn-default sr-only">Submit</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
