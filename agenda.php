<?php
  $file = explode(".",basename (__FILE__));
  $file = $file[0];
  require_once('inc/header.php');
?>
    <div class="container">
      <h1>Agenda</h1>
      <?php require_once('inc/map.php'); ?>
    </div><!-- .container -->
<?php
  require_once('inc/footer.php');
?>