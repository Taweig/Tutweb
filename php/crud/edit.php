<?php include_once( 'views/header.php' );
	include_once( 'libs/getData.php' );
	include_once( 'libs/editData.php' );
?>

  <header class="clearfix">
  	<h3 class="pull-left">Koffer Story: <?=$data[0]['title']?></h3>
  	<span class="pull-right"><br><a href="index.php" class="btn btn-success">Go Back</a>
  		<a href="delete.php" class="btn btn-danger"> Delete this item</a>
  	</span>
  </header>
  
  <div class="row">
    <div class="col-md-6">
      <div id="video-holder">
        <video id="tutvideo" data-audio-src="<?=$data[0]['audiosource']?>" class="video-js vjs-default-skin"
                        controls preload="auto" width="100%" height="100%"
                        poster="<?=$data[0]['videosource']?>"
                        data-setup="{example_option:true}">
                       <source src="<?=$data[0]['videosource']?>" type="video/webm" />
                      </video>
      </div>
    </div>
    <div class="col-md-6">
      <br/>
    	<form class="well clearfix" action="edit.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">	
    		<?php 
    		foreach($table_fields as $key => $value){
    			$field_name = $value['Field'];
    			
    			if($data !== 0){ foreach($data as $someData) { 
    			
    				if($field_name != 'ID' && $field_name != 'savedate' )
    				{
    					echo '<p class="form_elements">
    					<label for="'.$field_name.'">'.$field_name.'</label>';
    					if($value['Type'] == 'text' || $value['Type'] == 'longtext')
    					{
    						echo '<textarea class="form-control" rows="5"name="'.$field_name.'">'.$someData[$field_name].'</textarea>';
    					}
    					elseif($field_name == 'images' ){					
    							echo '<label for="images">Filename:</label>
    							<input type="file" name="file" id="file">';
    							if ($someData[$field_name] != null){
    							echo '<p>current image:</p>';
    							echo '<img src='.$someData[$field_name].'/>';	
    							}
    					}
    					else
    					{
    						echo '<input class="form-control" type="text" name="'.$field_name.'" value="'.$someData[$field_name].'" />';
    					}
              //echo '<p class="help-block">'.$value['Type'].'</p>';
    					echo '</p>';
    				}
    			}
    			}
    		}
    		?>
    	
    		<div class="form_elements">
    			<input type="submit" name="edit_values" value="Opslaan" class="btn btn-primary btn-hg"/>
    		</div>
    	
    
    	</form>
    </div>
  </div>   
 </div><!-- end container -->
 </body>
</html>