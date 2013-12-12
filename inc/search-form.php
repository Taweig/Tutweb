        <div>
          <h3>Zoek</h3>
          <form id="search-stories" role="search">
            <input type="text" class="form-control" placeholder="Search" id="search" value="<?=$searchVariable?>">

            <p>Jaartal tussen</p>
            <p>
              <div class="row">
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="yearMin" value="1800">
                </div>
                <div class="col-sm-2">
                  en
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="yearMax" value="2013">
                </div>
              </div>
            </p>
                          
            
            <div class="meta meta-ratings">
            
              <div class="control-group">
                <p>Blij</p>
                <input id="category1" class="inputNumber" hidden="hidden" value="3" />
                <div class="input-slider" class="ui-slider"></div> 
              </div>
  
              <div class="control-group">
                <p>Historische relevantie</p>
                <input id="category2" class="inputNumber" hidden="hidden" value="3" />
                <div class="input-slider" class="ui-slider"></div> 
              </div>
  
              <div class="control-group">
                <p>Vermakelijk</p>
                <input id="category3" class="inputNumber" hidden="hidden" value="3" />
                <div class="input-slider" class="ui-slider"></div> 
              </div>
              
            </div>

              
            <button type="submit" class="btn btn-primary btn-block">Zoek</button>
          </form>
        </div>