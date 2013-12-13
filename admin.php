<?php
  $file = explode(".",basename (__FILE__));
  $file = $file[0];
  require_once('inc/header.php');
?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form class="form-signin text-center" action="php/checklogin.php">
            <h1>Admin venster</h1>
            <p><input type="text" class="form-control text-center" placeholder="Gebruikersnaam" required autofocus name="username"></p>
            <p><input type="password" class="form-control text-center" placeholder="Wachtwoord" required name="password"></p>
            <p><button class="btn btn-lg btn-primary btn-block" type="submit" >Log in</button></p>
          </form>
        </div><!-- .col-sm-12 -->
      </div><!-- .row -->
    </div><!-- .container -->
<?php
  require_once('inc/footer.php');
?>