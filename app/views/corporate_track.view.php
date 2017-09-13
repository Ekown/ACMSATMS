<?php require 'partial/head.php'; ?>



<main>

  <center><h5>Track your Package</h5></center> <!-- //6/2 -->

  <form method="POST" action="/corporate/track">
  <br>
  <center>Tracking Number</center>

  <div class="input-field col l3 offset-l4 s12">
          <select class="browser-default" name="acm_tracking_number" id="sort" onchange="changeDropdown()">
              <option value="none">-----</option>

              <?php for($i=0;$i<count($_SESSION['acm_clienttracking_number']); $i++) : ?>

              <option value="<?=$_SESSION['acm_clienttracking_number'][$i]->tracking_id;?>" required>
              <?=$_SESSION['acm_clienttracking_number'][$i]->tracking_id;?>
              </option>

                  <?php endfor; ?>
          </select> 
  </div>

  <br>

  <div class="col l6 push-l2" id="search_button">
      <center><button type='submit' name='btn_searchweek'
        class='btn btn-lg waves-effect waves-light light-green'>Search</button></center>
  </div>

  </form>

</main>


<!---

<div class="input-field col l3 offset-l4 s12">
            Tracking Number
                 <select class="browser-default" name="acm_tracking_number" id="sort" onchange="changeDropdown()">
                  <option value="none">-----</option>

                  <?php for($i=0;$i<count($_SESSION['acm_all_tracking_number']); $i++) : ?>

                   <option value="<?=$_SESSION['acm_all_tracking_number'][$i]->tracking_id;?>" required>
                    <?=$_SESSION['acm_all_tracking_number'][$i]->tracking_id;?>
                   </option>

                  <?php endfor; ?>
                 </select> 
           </div>





  <nav class="green lighten-1">

         <div class="nav-wrapper">

           <form method="POST" action="#">

             <div class="input-field">

               <input id="search" placeholder="Track your Package" type="search" name="acm_tracking_number" required>

               <label for="search"><i class="material-icons">search</i></label>

               <i class="material-icons">close</i>

             </div>

           </form>

         </div>

  </nav>


-->



<?php require 'partial/footer.php'; ?>



 