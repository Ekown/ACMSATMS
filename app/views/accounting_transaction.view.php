<?php require 'partial/head.php'; ?> 

<main>
	<div class="section" />
         <center>
	 	<div class="row">
	 		<div class="col l4 push-l4 s12 m8 push-m2">
	             <div class="card blue-grey darken-1">
	               	<div class="card-content white-text">
	                  <p><center><h5>Transaction Details</h5></center></p>
	                </div>
	             </div>
	        </div>
	    </div>
	</center>
 
  <form action="/accounting-in-charge/transaction" method="POST" id="aicTransactionForm">
		<!-- Sort By Dropdown -->
    <div class="container">
	<div class="row">
           <div class="input-field col l2 offset-l5 s12">
            Tracking No.
             <select class="browser-default" name="tracking_id" id="sort" onchange="changeDropdown();">
             <option value="">-----</option>
              
              <?php for($i=0; $i<count($_SESSION['acm_all_tracking_number']); $i++) : ?>

                <option value="<?=$_SESSION['acm_all_tracking_number'][$i]->tracking_id;?>">
                  <?=$_SESSION['acm_all_tracking_number'][$i]->tracking_id;?>
                </option>

              <?php endfor; ?>

             </select>         
           </div>
    </div>
  </div>
  
   <div class="section"\>
   <div class="section"\>
   <div class="section"\>

   <div id="invoice_expenses" hidden>
        <div class="row">

        <center><h4>Tracking Number:&nbsp;&nbsp;<span id="tracking_number"></span></h4></center>
              <div class="input-field col l3 offset-l3 s12">
                <i class="material-icons prefix">mode_edit</i>
                    <input id="acm_invoice" name="acm_invoice" type="text">
                    <label for="acm_invoice">Invoice Value</label>
              </div>
              <div class="input-field col l3 s12">
                <i class="material-icons prefix">mode_edit</i>
                    <input id="acm_expenses" name="acm_expenses" type="text">
                    <label for="acm_expenses">Expenses</label>
              </div>
       </div>
       <center>
          <div class="row" id="search_button" >
          	<button type='submit' name='submit_btn2' 
                    class='btn btn-lg waves-effect waves-light light-green'>Submit</button>
          </div>
        </center>    
      </div>    
    </form>
  
</main>

<script>

  function changeDropdown()
  { 
    if(document.getElementById('sort').value == '')
    {
      document.getElementById('invoice_expenses').setAttribute("hidden","hidden");
      
    }
    else
    {
      document.getElementById('invoice_expenses').removeAttribute("hidden");
      document.getElementById('tracking_number').innerHTML = document.getElementById('sort').value;
    }
  }

</script>
<?php require 'partial/footer.php'; ?>