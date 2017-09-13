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
         <form action="#" method="POST" class="col l6 push-l3 s12">
       <h5>Personal Information</h5>
            <div class="row">
               <div class="input-field col l6 s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="fname" name="acm_avail_fname" type="text" class="active validate" required>
                  <label for="name">First Name</label>
               </div>
               <div class="input-field col l6 s12">
                  <input id="lname" name="acm_avail_lname" type="text" class="active validate" required>
                  <label for="name">Last Name</label>          
               </div>
            </div>

            <div class="row">
               <div class="input-field l6 col s12">
               <i class="material-icons prefix">email</i>
                  <input id="email" name="acm_avail_email" type="email" class="validate">
                  <label for="email">Email</label>
               </div>

               <div class="input-field col l6 s12">
                  <i class="material-icons prefix">phone</i>
                  <input id="cnum" name="acm_avail_cnum" type="text" class="active validate" required>
                  <label for="cnum">Contact Number</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
               <i class="material-icons prefix">mode_edit</i>
                  <input id="address" name="acm_avail_address" class="active validate" required>
                  <label for="address">Address</label>
               </div>
            </div>
            
            <div class="row">
               <div class="input-field col s12">
               <i class="material-icons prefix">account_circle</i>
                  <input id="user" name="acm_avail_user" type="text" class="active validate" required>
                  <label for="user">Username</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col l6 s12">
               <i class="material-icons prefix">lock_outline</i>
                  <input id="password" name="acm_avail_password" class="active validate" required>
                  <label for="password">Password</label>
               </div>
               <div class="input-field col l6 s12">
               <i class="material-icons prefix">lock_ouline</i>
                  <input id="conpassword" name="acm_avail_con_password" class="active validate" required>
                  <label for="conpassword">Confirm Password</label>
               </div>
            </div>

            <div class="row">
            <h5>Select the Type of User</h5>
               <div class="input-field col s12">
                   <p>
                     <input class="with-gap" id="Single User" type="radio" name="acm_user_type" value="Single User"  />
                     <label for="Single User">Single User</label>
                  </p>
                  <p>
                     <input class="with-gap" id="Corporate" type="radio" name="acm_user_type" value="Corporate" />
                     <label for="Corporate">Corporate</label>
                  </p>
               </div>
            </div>

            <br>

            <div class="row">
                <div class="input-field col s12">
                      <i class="material-icons prefix">business</i>
                      <input id="corpname" name="acm_corporate_name" type="text" class="active validate" required>
                      <label for="corpname">Corporate Name</label>
                   </div>
                   <div class="input-field col s12">
                      <i class="material-icons prefix">toc</i>
                      <input id="address" name="acm_corporate_address" type="text" class="active validate" required>
                      <label for="address">Company Address</label>          
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