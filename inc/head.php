<?php
  require_once('config.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Koffer Story</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="<?=$site_url?>/assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?=$site_url?>/assets/css/flat-ui.css" rel="stylesheet">
    <link href="<?=$site_url?>/assets/css/tutweb-theme.css" rel="stylesheet">  

    <link rel="shortcut icon" href="<?=$site_url?>/assets/images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?=$site_url?>/assets/vendor/js/html5shiv.js"></script>
    <![endif]-->
    <?php
      echo "<script>var SITEURL = '".$site_url."';</script>";
    ?>

  </head>
