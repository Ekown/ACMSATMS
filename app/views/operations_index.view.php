<?php require 'partial/head.php'; ?>

<main>
	<div class="section">
             <center>
	 	<div class="row">
	 		<div class="col l4 push-l4 s12 m8 push-m2">
	             <div class="card blue-grey darken-1">
	               	<div class="card-content white-text">
	                  <p><center><h5>Weekly Report</h5></center></p>
	                </div>
	             </div>
	        </div>
	    </div>
	</center>
	<form action="/operations-manager/weekreport/result" method="POST">
	  <!-- Company Dropdown -->
	  	<div class="row">
           <div class="input-field col col l2 offset-l5 s12">
             Company Name
             <select class="browser-default" id="company_dropdown" name="acm_sort_company" onchange="showCompanyTable()">
              <option value="company_none">-----</option>
               
              	<?php for($i=0; $i<count($_SESSION['acm_companies']); $i++) : ?>
               		<option value="<?=$_SESSION['acm_companies'][$i]->company_name;?>"> 
                    <?=$_SESSION['acm_companies'][$i]->company_name;?> 
                  </option>
               	<?php endfor; ?>

             </select>
             <br>
             <div class="row">
                <div class="col l6 push-l2 s12" id="search_button" hidden>
	       	<button type='submit' name='btn_searchweek'
	          class='btn btn-lg waves-effect waves-light light-green'>Search</button>
	        </div>
             </div>
           </div>
        </div>
	</form>

	<div id="weekly_table" hidden>

      <br>
      <center>
      <b>Company Name: </b> <?=$_POST['acm_sort_company'];?>&nbsp;&nbsp;
      <b>Week <?= idate('W');?> </b>: <?= $_SESSION['acm_start_week']; ?> - <?= $_SESSION['acm_end_week']; ?>
      </center>
      <br>
 
      <table class="striped bordered">
      <thead>
         <tr>
			 <th>Tracking No.</th>
			 <th>Airland Waybill No.</th>
			 <th>Area</th>
			 <th>Pick-Up Date</th>
			 <th>Waybill No.</th>
			 <th>Date Received</th>
			 <th>Status</th>
			 <th>Received by</th>
		 </tr>
      </thead>
	  
      <tbody>
         
      	<?php for($i=0; $i<count($_SESSION['acm_weekreport']); $i++) : ?>

      		<tr>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->tracking_id; ?> </td>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->airland_waybill; ?> </td>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->destination; ?> </td>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->pickup_datetime; ?> </td>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->waybill_no; ?> </td>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->date_received; ?> </td>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->package_status; ?> </td>
      			<td> <?=$_SESSION['acm_weekreport'][$i]->receiver_name; ?> </td>
      		</tr>

      	<?php endfor; ?>

      </tbody>
	  
      </table>
	
      <hr/>
      <br>
	  
	   <div class="wrap">
        <a class="button green lighten-1" target="_blank" href="/operations-manager/print/weekly-report"><b>Print</b></a>
      </div>
	 </div>

	 <div class="row" id="no_results" hidden>
        <div class="col l4 push-l4 s12 m8 push-m2">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
               <h5>No results found</h5>
            </div>
          </div>
        </div>
      </div>

  </main>

<script>

	<?php if(isset($_POST['btn_searchweek'])) :?>

		<?php if($_SESSION['acm_weekreport'] == null) : ?>
	          document.getElementById('no_results').removeAttribute("hidden");
	    <?php else : ?>
	    	  document.getElementById('weekly_table').removeAttribute("hidden");
	   	<?php endif; ?>
	    
	<?php else : ?>
		 document.getElementById('no_results').setAttribute("hidden","hidden");
		 document.getElementById('weekly_table').setAttribute("hidden","hidden");	  
  	<?php endif; ?>
	
	function showCompanyTable()
	{
		if(document.getElementById('company_dropdown').value == 'company_none')
		{
			document.getElementById('search_button').setAttribute("hidden", "hidden");
		}
		else
		{
			document.getElementById('search_button').removeAttribute("hidden");
		}
		

	}

</script>
<?php require 'partial/footer.php'; ?>