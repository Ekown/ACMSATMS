<?php require 'partial/head.php'; ?>
<main>
<center><h5>Search Package</h5></center>
<nav class="green lighten-1 container  col l3 s12">
    <div class="nav-wrapper">
      <form method="POST" action="/agent/search" id="agentSearchForm">
        <div class="input-field">
          <input id="acm_tracking_number" placeholder="Input Tracking Number" type="search" name="acm_tracking_number">
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
</nav>
</main>
<?php require 'partial/footer.php'; ?>