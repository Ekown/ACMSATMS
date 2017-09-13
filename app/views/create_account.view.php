<?php require 'partial/head.php'; ?>
<main>
<center>
      <div class="row">
        <div class="col l8 push-l2 s12 m8 push-m2">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <p style="font-size:20">If you have an existing account please proceed to <a href="login">Login</a> page.<br> 
              If not please fill up the neccesary information below</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
       <form action="create-account" method="POST" class="col l6 push-l3 s12" id="createAccountForm">

       <h5>Personal Information</h5>
            <div class="row">
               <div class="input-field col l6 s12">
                  <i class="material-icons prefix">account_circle</i>
                  <!-- <input id="fname" name="acm_avail_fname" type="text" pattern="^[a-zA-z ]*$" 
                  title="Letters only" maxlength="25" class="active validate" required> -->
                  <input type="text" name="acm_avail_fname" id="acm_avail_fname">
                  <label for="acm_avail_fname">First Name</label>
               </div>
               <div class="input-field col l6 s12">
                  <!-- <input id="lname" name="acm_avail_lname" type="text" pattern="^[a-zA-z]*$" 
                  title="Letters only" maxlength="25" class="active validate" required> -->
                  <input type="text" name="acm_avail_lname" id="acm_avail_lname">
                  <label for="acm_avail_lname">Last Name</label>          
               </div>
            </div>

            <div class="row">
               <div class="input-field l6 col s12">
               <i class="material-icons prefix">email</i>
                   <input id="acm_avail_email" title="Valid email format only" name="acm_avail_email" type="email"  maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                  <!-- <input type="text" id="acm_avail_email" class="acm_avail_email"> -->
                  <label for="acm_avail_email">Email</label>
               </div>

               <div class="input-field col l6 s12">
                  <i class="material-icons prefix">phone</i>
                  <input id="acm_avail_cnum" name="acm_avail_cnum" type="text" 
                  pattern="[0-9]{7,11}$" maxlength="11" title="Enter a valid contact number" required >
                  <label for="acm_avail_cnum">Contact Number</label>
               </div>
            </div>

            <div class="row">
               <div class="input-field col s12">
               <i class="material-icons prefix">mode_edit</i>
                  <input id="acm_avail_address" type="text" name="acm_avail_address" maxlength="60" required>
                  <label for="acm_avail_address">Address</label>
               </div>
            </div>
            <br>
            <h5>Company Information</h5>
            <div class="row">
                <div class="input-field col l6 s12">
                      <i class="material-icons prefix">business</i>
                      <input id="acm_corporate_name" name="acm_corporate_name" type="text" required>
                      <label for="acm_corporate_name" id="label_corpname">Company Name</label>
                   </div>
                   <div class="input-field col l6 s12">
                      <i class="material-icons prefix">toc</i>
                      <input id="cor_address" name="acm_corporate_address" type="text" class="active validate" required>
                      <label for="cor_address" id="label_cor_address">Company Address</label>

                  </div>
            </div>
            <br>
            <h5>Username and Password</h5>
             <div class="row">
               <div class="input-field col s12">
               <i class="material-icons prefix">account_circle</i>
                  <input id="acm_avail_user" maxlength="7" name="acm_avail_user" type="text" 
                  pattern="^[a-zA-Z0-9 -_]*$" required>
                  <label for="acm_avail_user">Username</label>
               </div>
            </div>

            <div class="row">
               <div class="input-field col l6 s12">
               <i class="material-icons prefix">lock_outline</i>
                  <input id="acm_avail_password" type="password" name="acm_avail_password"  pattern="^[a-zA-Z0-9 -_]*$" required>
                  <label for="acm_avail_password">Password</label>
               </div>
               <div class="input-field col l6 s12">
               <i class="material-icons prefix">lock_ouline</i>
                  <input id="acm_avail_con_password" type="password" name="acm_avail_con_password" pattern="^[a-zA-Z0-9 -_]*$" required>
                  <label for="acm_avail_con_password">Confirm Password</label>
               </div>
            </div>
            <center>
                  <div class='row'>
                    <button type='submit' name='btn_avail' class='btn btn-lg waves-effect waves-light indigo'>Create Account</button>
                  </div>
            </center>
         </form>       
      </div>
   </center>
  </main>

<?php require 'partial/footer.php'; ?>