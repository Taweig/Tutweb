<?php
  $file = explode(".",basename (__FILE__))[0];
  require_once('inc/header.php');
?>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div id="video-gallery" class="royalSlider videoGallery rsDefault">
          </div>
        </div>
      </div>

      <div class="row locations">
        <div class="col-md-4">
          <div>
            <table class="table table-striped table-hover" id="tuthutLocations">
              <tbody>
                <tr data-lat="52.515" data-lng="5.50" data-title="Lelystad" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Lelystad</td>
                  <td>14 november</td>
                </tr>
                <tr data-lat="52.366" data-lng="4.89" data-title="Amsterdam" data-description="Cum sociis natoque penatibus et magnis dis parturient montes">
                  <td>Amsterdam</td>
                  <td>16 november</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-8 tuthut-map">
          <div id="tuthutMap"></div>
        </div>
      </div>
      
      
      <div class="row">
        <div class="col-md-12">
          <h2>Give this quartet a few art.</h2>
          <div class="row">
            <div class="col-md-7">
              <p class="lead">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
              <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <strong>Donec ullamcorper</strong> nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
            </div>
            <div class="col-md-5">
              <img src="<?=$site_url?>/assets/images/description-image.jpg" class="img-rounded img-responsive" />
              <p class="img-comment"><strong>Note:</strong> gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
            </div>
            
          </div>
        </div>
      </div>


<!--

      <video id='videoplayer' width="320" height="240">
        <source src="movie.mp4" type="video/mp4">
        <source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.
      </video>
      
      <audio id='audioplayer'>
        <source src="horse.ogg" type="audio/ogg">
        <source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.
      </audio>
-->
      
      <br>
<!--
      <img id='orangebar' src='img/orangebar.jpg' width="10" height="20" onclick='stopVideo()'><br>
      <img src='img/play.png' width="50" height="50" onclick='startVideo()'> 
      <img src='img/pause.png' width="50" height="50" onclick='stopVideo()'><br>
-->
      
      <form>
        Tag1: <input id='tag1' type="text" name="tag1" value='notimeline'><br>
        Tag2: <input id='tag2' type="text" name="tag2" value='nopictures'><br>
        Tag3: <input id='tag3' type="text" name="tag3" value='conversation'><br>
        
        In welk jaar speelt het verhaal zich af?
        <select id='YearTag'>
          <option value="">leave Empty</option>  
          <option value="1920">1920-1930</option>  
          <option value="1931">1931-1940</option>  
          <option value="1941">1941-1950</option>  
          <option value="1951">1951-1960</option>  
          <option value="1961">1961-1970</option>  
          <option value="1971">1971-1980</option>  
          <option value="1981">1981-1990</option>  
          <option value="1991">1991-2000</option>  
          <option value="2001">2001-2010</option>
        </select>
        <br>
        
        Waar speelt het verhaal zich af? 
        <select id='SettingTag'>
          <option value="">leave Empty</option>  
          <option value="Thuis">Thuis</option>
          <option value="Onderweg">Onderweg</option>
          <option value="Buiten">Buiten</option>  
          <option value="Natuur">In de natuur</option>  
          <option value="School">Op school</option>
        </select>
        <br>
        
        Wie zijn de hoofdrolspelers in het verhaal?
        <select id='CharacterTag'>
          <option value="">leave Empty</option>  
          <option value="Familie">Familie</option>  
          <option value="Vrienden">Vrienden</option>  
          <option value="Collega">Collega's</option>  
          <option value="Medestudenten">Medestudenten</option>  
          <option value="Onbekenden">Onbekenden</option>
        </select>
        <br>
        
        Blij <input type="range" value="3" id="slider1" min="1" max="5"> Verdrietig<br>
        Gelukkig <input type="range" value="3" id="slider2" min="1" max="5"> Ongelukkig<br>
        Vermakelijk <input type="range" value="3" id="slider3" min="1" max="5"> Interesant<br>
        
        <input type="submit" onclick="applyTags()">
        <br>
        <br>
      </form>
  
      <div id="thumbnails"></div>

    </div>
    <!-- /.container -->
<?php
  require_once('inc/footer.php');
?>