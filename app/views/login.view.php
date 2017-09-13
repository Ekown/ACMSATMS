<?php require 'partial/head.php'; ?>



<main>

<center>

<div class="section"></div>

<div class="section"></div>

<br>

<div class="container">

      

        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">



          <form class="col s12" method="POST" action="login" id="loginForm">

            <div class='row'>

              <div class='col s12'>

              </div>

            </div>

            <img class="responsive-img" style="width: 70px;" src="public/img/fav.png" />

            <div class='row'>

              <div class='input-field col s12'>

                <i class="material-icons prefix">account_circle</i>

                <!-- <input class='validate' type='text' name='acm_username' id='username'

                pattern="^[a-zA-Z0-9_.@]*$" 

                title= "Alphanumeric characters, ., _, and @ are only allowed" required/> -->

                <input type="text" name="acm_username" id="acm_username">

                <label for='acm_username'>Enter your username</label>

              </div>

            </div>



            <div class='row'>

              <div class='input-field col s12'>

                <i class="material-icons prefix">lock</i>

                <!-- <input class='validate' type='password' name='acm_pass' id='pass' pattern="^[a-zA-Z0-9 -_]{8,20}$" title="Your password must have at least 8 characters and at most 20 characters" required/> -->

                <input type="password" name="acm_pass" id="acm_pass">

                <label for='acm_pass'>Enter your password</label>

              </div>

              <label style="float: right;">

                <a class="pink-text" href="/forgot-password"><b>Forgot Password?</b></a>

                <br>

                <a class="pink-text" href="create-account"><b>Create an account?</b></a>

            </div>



            <br />

            <center>

              <div class='row'>

                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-light indigo'>Login</button>

              </div>

            </center>

          </form>

        </div>

      </div>

    

    </center>

    <div class="section"></div>

    <div class="section"></div>

      

    </main>



<script>



  <?php if($_SESSION['acm_reset_success'] == true)  : ?>



    swal({

      title: "Password Reset Successful",

      showConfirmButton: true

    });



  <?php 

    $_SESSION['acm_reset_success'] = false; 

    $_SESSION['acm_reset_pass'] = false;

  ?>



  <?php elseif(isset($_SESSION['acm_send_verify_email'])) :  ?>

    swal({

      title: "Verification Email sent. Please check your email to activate your account",

      showConfirmButton: true

    });

  <?php 

    unset($_SESSION['acm_send_verify_email']);

  ?>

  <?php endif; ?>

</script>



<?php require 'partial/footer.php' ?>