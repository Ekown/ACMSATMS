<?php require 'partial/head.php'; ?>

<main>
  <center><h5>Track your Package</h5></center>
  <nav class="green lighten-1">
         <div class="nav-wrapper">
           <form method="POST" action="#">
             <div class="input-field">
               <input id="search" placeholder="Tracking Number" type="search" name="acm_tracking_number" required>
               <label for="search"><i class="material-icons">search</i></label>
               <i class="material-icons">close</i>
             </div>
           </form>
         </div>
  </nav>
</main>

<?php require 'partial/footer.php'; ?>

 