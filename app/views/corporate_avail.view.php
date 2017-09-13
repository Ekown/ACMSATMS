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

                    <input id="weight" name="acm_avail_weight" type="text" class="active validate" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" required>

                    <label for="weight">Weight (kg/s)</label>

              </div>



              <div class="row">

                <div class="input-field col l4 offset-l1 s12">

                  Package Type

                  <select class="browser-default" name="type">

                      <?php for($i=0; $i<count($_SESSION['acm_types']); $i++) : ?>

                        <option value="<?=$_SESSION['acm_types'][$i]->package_types; ?>">

                          <?=$_SESSION['acm_types'][$i]->package_types; ?>

                       </option>

                    <?php endfor; ?>

                  </select>         

                </div>

              </div>



            <!--  <div class="input-field col l6 s12">

                    Package Type

                   <a class='dropdown-button btn' href='#' data-activates='acm_package_dropdown'>

                      -Select Package Type-

                   </a>



                   <ul id='acm_package_dropdown' class='dropdown-content'>

                      <li value="acm_box"><a href="#">Box</a></li>

                      <li value="acm_box"><a href="#">Small Box</a></li>

                      <li value="acm_box"><a href="#">Letter</a></li>

                      <li value="acm_envelope"><a href="#">Envelope</a></li>

                   </ul>

              </div> -->

          </div>

          

          <div class="row">

          <h5><center>Origin and Destination of the Package</center></h5>

              <div class="input-field col l4 offset-l1 s12">

                    Origin (Province)

                      <select class="browser-default" name="prov_name" id="acm_cor_org_prov">

                        <option value="none">-----</option>

                      <?php for($i=0; $i<count($_SESSION['acm_province']); $i++) : ?>

                        <option value="<?=$_SESSION['acm_province'][$i]->province_name; ?>">

                          <?=$_SESSION['acm_province'][$i]->province_name; ?>

                       </option>

                    <?php endfor; ?>

                     </select> 

                   <!-- <br>

                   <a class='dropdown-button btn' href='#' data-activates='acm_oprovince_dropdown'>

                      -Select Origin-

                   </a>

 

                   

                   <ul id='acm_oprovince_dropdown' class='dropdown-content'>

                   <?php for($i=0; $i<count($_SESSION['acm_province']); $i++) : ?>

                      <li><a href=""><?=$_SESSION['acm_province'][$i]->province_name; ?></a></li>

                    <?php endfor; ?>

                   </ul>



                  <br> -->

                    Origin (City)

                     <select class="browser-default" name="orgcity" id="acm_cor_org_city" disabled>

                      <option value="none">-----</option>

                   <!--    <?php for($i=0; $i<count($_SESSION['acm_city']); $i++) : ?>

                       

                     <?php endfor; ?> -->

                     </select>

                   <!-- <br>

                    <a class='dropdown-button btn' href='#' data-activates='acm_ocity_dropdown'>

                      -Select Origin-

                    </a>



                    

                    <ul id='acm_ocity_dropdown' class='dropdown-content'>

                     <?php for($i=0; $i<count($_SESSION['acm_city']); $i++) : ?>

                       <li><a href=""><?=$_SESSION['acm_city'][$i]->city_name; ?></a></li>

                     <?php endfor; ?>

                    </ul> -->

              </div>

              <div class="input-field col l4 offset-l1 s12">

                    Destination (Province)

                    <select class="browser-default" name="des_prov" id="acm_cor_des_prov">

                      <option value="none">-----</option>

                      <?php for($i=0; $i<count($_SESSION['acm_province']); $i++) : ?>

                        <option value="<?=$_SESSION['acm_province'][$i]->province_name; ?>">

                          <?=$_SESSION['acm_province'][$i]->province_name; ?>

                       </option>

                    <?php endfor; ?>

                    </select> 

                    <!-- 

                   <a class='dropdown-button btn' href='#' data-activates='acm_dprovince_dropdown'>

                      -Select Destination-

                   </a>



                  

                   <ul id='acm_dprovince_dropdown' class='dropdown-content'>

                    <?php for($i=0; $i<count($_SESSION['acm_province']); $i++) : ?>

                      <li><a href=""><?=$_SESSION['acm_province'][$i]->province_name; ?></a></li>

                    <?php endfor; ?>

                   </ul> -->



                   Destination (City)

                     <select class="browser-default" name="des_city" id="acm_cor_des_city" disabled>

                      <option value="none">-----</option>
                      
                      <?php for($i=0; $i<count($_SESSION['acm_city']); $i++) : ?>

                       <option value="<?=$_SESSION['acm_city'][$i]->city_name; ?>">

                          <?=$_SESSION['acm_city'][$i]->city_name; ?>

                       </option>

                     <?php endfor; ?>

                     </select>

                   <!-- 

                    <a class='dropdown-button btn' href='#' data-activates='acm_dcity_dropdown'>

                      -Select Destination-

                    </a>



                    <ul id='acm_dcity_dropdown' class='dropdown-content'>

                     <?php for($i=0; $i<count($_SESSION['acm_city']); $i++) : ?>

                       <li><a href=""><?=$_SESSION['acm_city'][$i]->city_name; ?></a></li>

                     <?php endfor; ?>

                    </ul> -->

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

                    <label for="address">Receiver Address</label>

              </div>

              <div class="input-field col l6 s12"> <!--//6/2-->

                <i class="material-icons prefix">phone</i>

                    <input id="receivercnum" name="acm_receiver_cnum" type="text" class="active validate" maxlength="11" pattern="[0-9]{7,11}$">

                    <label for="receivercnum">Contact Number</label>

              </div>

              <div class="input-field col l6 s12">

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



<?php if($_SESSION['acm_avail_success'] == true) : ?>  <!--//6/2-->



<script>

  swal({

    title: "Transaction availing successful",

    timer: 3000,

    showConfirmButton: false

  });

</script>





<?php 



  $_SESSION['acm_email_success'] = false;

  endif; 



?>

<?php require 'partial/footer.php'; ?>