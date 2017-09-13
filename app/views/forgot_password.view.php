<?php require 'partial/head.php'; ?>



<main>

      <div class="section">

      <div class="section">

      <div class="section">

      <div class="section">

          <div class="row">



          <?php if($_SESSION['acm_reset_pass'] != true) : ?>

            <form method="POST" action="forgot-password/<?=session_id()?>" id="forgotPasswordEmailForm">

             <div class="col l6 push-l3 s12">

             <h5>Forgot Password?</h5>

             <h6><i>Recover it by sending us your e-mail</i></h6>

                <div class="row">

                   <div class="input-field col l12 s12">

                      <i class="material-icons prefix">email</i>

                      <!-- <input id="email" name="acm_forgot_email" type="email" class="active validate" required> -->

                      <input id="acm_forgot_email" name="acm_forgot_email" type="text">

                      <label for="acm_forgot_email">E-Mail</label>          

                  </div>



                <center>

                  <div class='row'>

                    <button type='submit' name='btn_create' class='btn btn-lg waves-effect waves-light indigo'>Send</button>

                  </div>

                </center>

              </div>



            <?php else : ?>

            <form method="POST" action="/forgot-password/<?=$_SESSION['acm_shuffle_url']?>" id="forgotPassNewPassForm">

             <div class="col l6 push-l3 s12">

             <h5>Reset Password</h5>

            <div class="row">

                   <div class="input-field col l12 s12">

                      <i class="material-icons prefix">lock_outline</i>

                      <!-- <input id="new_pass" name="acm_new_pass" type="password" class="active validate" pattern="^[a-zA-Z0-9 -_]{8,20}$" title="Your password must have at least 8 characters and at most 20 characters" required> -->

                      <input id="acm_new_pass" name="acm_new_pass" type="password">

                      <label for="acm_new_pass">New Password</label>          

                  </div>



                <center>

                  <div class='row'>

                    <button type='submit' name='btn_create' class='btn btn-lg waves-effect waves-light indigo'>Send</button>

                  </div>

                </center>

              </div>



            <?php endif; ?>



            </form>       

          </div>

        

    </main>



<?php require 'partial/footer.php'; ?>