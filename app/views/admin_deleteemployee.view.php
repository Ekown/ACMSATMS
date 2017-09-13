<?php require 'partial/head.php'; ?>

<main>
<div class="section">
<div class="row">
<center>
<center><h5>Deleting an employee account</h5></center>
       <form action="/administrator/delete-employee" method="POST" class="col l6 push-l3 s12"> 
          <div class="row">
              <div class="input-field col l12 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="uname" name="acm_delete_uname" type="text" class="active validate" 
                    maxlength="7" pattern="^[a-zA-Z0-9 -_]*$" required>
                    <label for="tname">Employee's User Name</label>
              </div>
          </div>

          <center>
            <div class='row'>
              <button type='submit' name='btn_delete' class='btn btn-lg waves-effect waves-light indigo'>Delete Account</button>
            </div>
          </center>
         </form>       
      </div>
</center>
</div>
</main>

<?php if($_SESSION['acm_delete_account_success'] == true) : ?>

<?php $_SESSION['acm_delete_account_success'] = false; ?>

  <script>
    
    notif("Account Deleted Successfully");

  </script>

<?php endif; ?>

<?php require 'partial/footer.php'; ?>