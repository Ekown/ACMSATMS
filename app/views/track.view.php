<?php require 'partial/head.php'; ?>

<main>
<center>
<div class="section"></div>
<div class="section"></div>
<br>
<div class="container">
	  
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <form class="col s12" method="POST" action="result" id="homeTrackForm">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>
			<img class="responsive-img" style="width: 70px;" src="public/img/fav.png" />
      <br>
            <div class='row'>
              <div class='input-field col s12'>
			          <i class="material-icons prefix">search</i>
                <!-- <input class="validate" type="text" name="acm_tracking_number" id="user" 
                pattern="^[0-9]{5}$" title="Enter a valid tracking number (5 digits)" required/> -->

                <input type="text" name="acm_tracking_number" id="acm_tracking_number">

                <label for='acm_tracking_number'>Tracking Number</label>
              </div>
            </div>
            <br />
            <center>
              <div class='row'>
			  <div class="wrap">
				<input name="submit" type="submit" value="Track" class="btn btn-lg btn-success">
			  </div>
              </div>
            </center>
		  </form>
        </div>
      </div>
    
	</center>
    <br>
	<br>
	 	
	</main>

<?php require 'partial/footer.php'; ?>