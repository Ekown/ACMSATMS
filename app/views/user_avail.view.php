<?php require 'partial/head.php'; ?>

<main>
  <div class="section">
  <div class="section">
  <div class="row">
  <center><h5>Please fill up the neccesary information below</h5></center>
       <form action="#" method="POST" class="col l6 push-l3 s12">                 
          <div class="row">
              <div class="input-field col l6 s12">
                <i class="material-icons prefix">inbox</i>
                    <input id="itemname" name="acm_avail_item" type="text" class="active validate" required>
                    <label for="itemname">Item Name</label>
              </div>
              <div class="input-field col l6 s12">
                <i class="material-icons prefix">mode_edit</i>
                    <input id="quantity" name="acm_avail_quantity" type="number" class="active validate" required>
                    <label for="quantity">Quantity</label>
              </div>
          </div>

          <div class="row">
              <div class="input-field col l6 s12">
                <br>
                <i class="material-icons prefix">mode_edit</i>
                    <input id="weight" name="acm_avail_weight" type="number" class="active validate" required>
                    <label for="weight">Weight</label>
              </div>
              <div class="input-field col l6 s12">
                    Package Type
                    <!-- Dropdown Button -->
                   <a class='dropdown-button btn' href='#' data-activates='acm_package_dropdown'>
                      -Select Package Type-
                   </a>

                   <!-- Dropdown Content -->
                   <ul id='acm_package_dropdown' class='dropdown-content'>
                      <li value="acm_box"><a href="#">Box</a></li>
                      <li value="acm_box"><a href="#">Small Box</a></li>
                      <li value="acm_box"><a href="#">Letter</a></li>
                      <li value="acm_envelope"><a href="#">Envelope</a></li>
                   </ul>
              </div>
          </div>
          <br>
          
          <div class="row">
          <h5><center>Origin and Destination of the Package</center></h5>
              <div class="input-field col l6 s12">
                    Origin (Province)
                    <!-- Dropdown Button -->
                    <br>
                   <a class='dropdown-button btn' href='#' data-activates='acm_oprovince_dropdown'>
                      -Select Origin-
                   </a>

                   <!-- Dropdown Content -->
                   <ul id='acm_oprovince_dropdown' class='dropdown-content'>
                   <?php for($i=0; $i<count($_SESSION['acm_province']); $i++) : ?>
                      <li><a href=""><?=$_SESSION['acm_province'][$i]->province_name; ?></a></li>
                    <?php endfor; ?>
                   </ul>

                  <br>
                    Origin (City)
                    <br>
                    <!-- Dropdown Button -->
                    <a class='dropdown-button btn' href='#' data-activates='acm_ocity_dropdown'>
                      -Select Origin-
                    </a>

                    <!-- Dropdown Content -->
                    <ul id='acm_ocity_dropdown' class='dropdown-content'>
                     <?php for($i=0; $i<count($_SESSION['acm_city']); $i++) : ?>
                       <li><a href=""><?=$_SESSION['acm_city'][$i]->city_name; ?></a></li>
                     <?php endfor; ?>
                    </ul>
              </div>
              <div class="input-field col l6 s12">
                    Destination (Province)
                    <!-- Dropdown Button -->
                   <a class='dropdown-button btn' href='#' data-activates='acm_dprovince_dropdown'>
                      -Select Destination-
                   </a>

                   <!-- Dropdown Content -->
                   <ul id='acm_dprovince_dropdown' class='dropdown-content'>
                    <?php for($i=0; $i<count($_SESSION['acm_province']); $i++) : ?>
                      <li><a href=""><?=$_SESSION['acm_province'][$i]->province_name; ?></a></li>
                    <?php endfor; ?>
                   </ul>

                   Destination (City)
                   <!-- Dropdown Button -->
                    <a class='dropdown-button btn' href='#' data-activates='acm_dcity_dropdown'>
                      -Select Destination-
                    </a>

                    <!-- Dropdown Content -->
                    <ul id='acm_dcity_dropdown' class='dropdown-content'>
                     <?php for($i=0; $i<count($_SESSION['acm_city']); $i++) : ?>
                       <li><a href=""><?=$_SESSION['acm_city'][$i]->city_name; ?></a></li>
                     <?php endfor; ?>
                    </ul>
              </div>
          </div>
          <br>
          <div class="row">
          <h5><center>Receiver Information</center></h5>
              <div class="input-field col l6 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="rname" name="acm_receiver_name" type="text" class="active validate" required>
                    <label for="rname">Receiver Name</label>
              </div>
               <div class="input-field col l6 s12">
                <i class="material-icons prefix">place</i>
                    <input id="address" name="acm_receiver_address" type="text" class="active validate" required>
                    <label for="address">Address</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">domain</i>
                    <input id="companyname" name="acm_company_name" type="text" class="active validate">
                    <label for="companyname">Company Name</label>
              </div>
          </div>

            <center>
                  <div class='row'>
                    <button type='submit' name='btn_avail' class='btn btn-lg waves-effect waves-light indigo'>Avail</button>
                  </div>
            </center>
         </form>       
      </div>
   </center>
</main>
<?php require 'partial/footer.php'; ?>