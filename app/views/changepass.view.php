<?php require 'partial/head.php'; ?>



  <main>

	  <center>

      <div class="section"></div>

	  <div class="section">

	<div class="section">

	<center><h5>Changing of Password</h5></center>

	<div class="section"/>

      <div class="row">

         <form method="POST" action="/changepass" id="changePassForm">

		 <div class="col l6 push-l3 s12">

				<div class="row">

				   <div class="input-field col s12">

				      <i class="material-icons prefix">lock</i>

					  <input id="acm_password" name="acm_password" type="password">

					  <label for="acm_password">Old Password</label>         

				   </div>

				   <div class="input-field col s12">

					  <i class="material-icons prefix">lock</i>

					  <input id="acm_newpass" name="acm_newpass" type="password">

					  <label for="acm_newpass">New Password</label>          

					</div>

					<div class="input-field col s12">

					  <i class="material-icons prefix">lock</i>

					  <input id="acmconnewpass" name="acmconnewpass" type="password">

					  <label for="acmconnewpass">Confirm New Password</label>          

					</div>

					<div class='col l6 push-l3 s12'>

						<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-light indigo'>Change Password</button>

					</div>

				</div>

			</div>

			</div>

         </form>       

      </div>

	  </center>

	  </main>



<?php require 'partial/footer.php'; ?>