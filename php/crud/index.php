<?php
session_start();
if(isset($_SESSION['CurrentUser'])){
	
	include_once( 'views/header.php' );
	include_once( 'libs/getData.php' );
?>
    <header class="clearfix">
    	<h3 class="pull-left">Koffer Stories</h3>
    	<!-- <span class="pull-right"><a href="create_new.php" class="btn btn-success">Insert New Value</a></span> -->
    </header>
   	<table class="table table-striped table-bordered table-condensed koffer-storie-table">
  		<thead>
  			<tr>
  				<?php if($data !== 0) { foreach($fields_name as $f) { 
  					echo '<th class="'.$f.'">'.$f.'</th>';
  				}
  				echo '<th class="actions">Actions</th>';
  				} ?>
  			</tr>
  		</thead>
  		<tbody>
  				<?php
  					if($data !== 0){
  					  foreach($data as $key => $value){
    						echo '<tr>';
    						foreach($fields_name as $f){
    						  echo '<td class="'.$f.'">';
    							if($f === 'images'){
    							  $image = explode(" , ", $value[$f]);
    							  if(isset($image[0])){
      							  $image = $image[0];
    							  }
    							  echo "<img src='".$image."' />";
    							}elseif($f === 'savedate'){
      							echo date( 'd/m/Y  g:i A', strtotime($value[$f]));
    							}else{
      							echo $value[$f];
    							}
    							echo '</td>';
                }
    						echo '<td class="actions"><a href="edit.php?id='.$value['ID'].'"><i class="fui-new"></i></a> <a href="delete.php?id='.$value['ID'].'"><i class="fui-trash"></i></a></td>
    
    						</tr>';
    					}
  					}
  				?>
  		</tbody>
  	</table>
  <?php     
  	include_once( 'views/footer.php' );
  ?>
 </body>
</html>
<?php
}else{
	echo "you are not logged in<br>";
	//echo "click <a href='".site_url."/admin.html'>here</a>	to go back";
}
?>