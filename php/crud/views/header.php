<?php
  include_once('../../config.php');
  include_once( 'libs/listTables.php' );
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Koffer Story Manager</title>
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
<body>




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
          <a class="navbar-brand" href="index.html"><img src="<?=$site_url?>/assets/images/logo.png" alt="Tuthut"></a>
        </div>
      
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='logout.php'>Log uit</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>






 <div class="container">
	<!--<div class="table_switcher">
		<form class="well form-inline" method="post" action="switch_tables.php?referrer=<?php echo $_SERVER['REQUEST_URI']; ?>">
			<label for="Table Name">Table Name</label>
			<select name="table_name">
				<?php
					echo '<option value="'.$session_table_name.'" selected="selected">'.$session_table_name.'</option>';
					foreach($tables_left as $key => $value){
					echo '<option value="'.$value.'">'.$value.'</option>';
					}
				?>
			</select>
			<input type="submit" name="switch_table" value="Switch Table" class="btn btn-primary"/>
		</form>
	</div>-->
    <!-- end table_switcher -->
	
	<?php
		//session_name('k');
		//$_SESSION['SESSION_TABLE_NAME'] = 'videos';
		//if(!isset($_SESSION['SESSION_TABLE_NAME']))
		//{
			 //echo '<div class="alert alert-error"><p>Select a table to get started </p></div>';
			//die;
		//}
	?>
	
