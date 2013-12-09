        <div>
          <h3>Zoek</h3>
          <form id="search-stories" role="search">
            <input type="text" class="form-control" placeholder="Search" id="search">

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
                          
            
            <p>
              Blij
            </p>
            <div class="control-group">
              <input id="happiness" class="inputNumber" hidden="hidden" value="3" />
              <div class="input-slider" class="ui-slider"></div> 
            </div>


            <p>
              Informatief
            </p>
            <div class="control-group">
              <input id="informative" class="inputNumber" hidden="hidden" value="3" />
              <div class="input-slider" class="ui-slider"></div> 
            </div>


            <p>
              Amusant
            </p>
            <div class="control-group">
              <input id="amusing" class="inputNumber" hidden="hidden" value="3" />
              <div class="input-slider" class="ui-slider"></div> 
            </div>

              
            <button type="submit" class="btn btn-primary btn-block">Zoek</button>
          </form>
        </div>