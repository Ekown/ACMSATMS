<?php require 'partial/head.php'; ?> 

<main>
<div class="section">
<div class="row">
<center>
<center><h5>Please fill up the neccesary information below</h5></center>
	<h5>Personal Information</h5>
       <form action="/administrator/add-employee" method="POST" class="col l6 push-l3 s12">
          <div class="row">
              <div class="input-field col l6 s12">
                <i class="material-icons prefix">account_circle</i>
                    <input id="fname" name="acm_add_fname" type="text" class="active validate" 
                    pattern="^[a-zA-z ]*$" maxlength="25" title="Letters only" required>
                    <label for="fname">First Name</label>
              </div>
              <div class="input-field col l6 s12">
                <i class="material-icons prefix">account_circle</i>
                    <input id="mname" name="acm_add_mname" type="text" class="active validate"
                    pattern="^[a-zA-z]$" title="One letter only" required>
                    <label for="mname">Middle Initial</label>
              </div>
              <div class="input-field col  s12">
                <i class="material-icons prefix">account_circle</i>
                    <input id="lname" name="acm_add_lname" type="text" class="active validate" 
                    pattern="^[a-zA-z ]*$" maxlength="25" required>
                    <label for="lname">Last Name</label>
              </div>
          </div>

          <div class="row">
              <div class="input-field col l12 s12">
                <br>
                <i class="material-icons prefix">email</i>
                    <input id="email" name="acm_add_email" type="email" class="active validate"
                    maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    <label for="email">Email</label>
              </div>
              <div class="input-field col l6 s12">
                <br>
                <i class="material-icons prefix">location_on</i>
                    <input id="address" name="acm_add_address" type="text" class="active validate" maxlength="60" required>
                    <label for="address">Address</label>
              </div>
              <div class="input-field col l6 s12">
                <br>
                <i class="material-icons prefix">call</i>
                    <input id="cnumber" name="acm_add_cnumber" type="text" 
                     pattern="[0-9]{7,11}$" maxlength="11" class="active validate" required>
                    <label for="cnumber">Contact Number</label>
              </div>
          </div>
          <div class="row">
            <h5>Select the Type of Employee</h5>
            <div id="radio_buttons">
               <div class="input-field col s12">
                   <p>
                     <input class="with-gap" id="aic" type="radio" name="acm_user_type" 
                     value="4" required>
                     <label for="aic">Accounting In Charge</label>
                   </p>
                   <p>
                     <input class="with-gap" id="agent" type="radio" name="acm_user_type" 
                     value="6" />
                     <label for="agent">Agent</label>
                   </p>
                   <p>
                     <input class="with-gap" id="branch_manager" type="radio" name="acm_user_type" 
                     value="2" />
                     <label for="branch_manager">Branch Manager</label>
                  </p>
                  <p>
                     <input class="with-gap" id="dic" type="radio" name="acm_user_type" 
                     value="5" />
                     <label for="dic">Domestic In Charge</label>
                  </p>
                  <p>
                     <input class="with-gap" id="op_manager" type="radio" name="acm_user_type" 
                     value="3" />
                     <label for="op_manager">Operation Manager</label>
                  </p>
               </div>
               </div>
            </div>
          
          <h5>Username and Password</h5>
          <div class="row">
              <div class="input-field col l12 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="uname" name="acm_add_uname" type="text" class="active validate"
                    maxlength="7" pattern="^[a-zA-Z0-9 -_]*$" required>
                    <label for="tname">User Name</label>
              </div>
               <div class="input-field col l6 s12">
                <i class="material-icons prefix">lock</i>
                    <input id="password" name="acm_add_password" type="password" class="active validate" pattern="^[a-zA-Z0-9 -_]*$" maxlength="20" required>
                    <label for="password">Password</label>
              </div>
              <div class="input-field col l6 s12">
                <i class="material-icons prefix">lock</i>
                    <input id="cpassword" name="acm_add_cpassword" type="password" class="active validate" pattern="^[a-zA-Z0-9 -_]*$" maxlength="20" required>
                    <label for="cpassword">Confirm Password</label>
              </div>
          </div>

            <center>
                  <div class='row'>
                    <button type='submit' name='btn_create' class='btn btn-lg waves-effect waves-light indigo'>Create Account</button>
                  </div>
            </center>
         </form>       
      </div>
</center>
</div>
</main>

<?php require 'partial/footer.php'; ?>