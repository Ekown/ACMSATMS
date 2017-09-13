<?php require 'partial/head.php'; ?>



<main>

  <center><h5>Track your Package</h5></center> <!-- //6/2 -->

  <form method="POST" action="/corporate/track">
  <br>
  <center>Tracking Number</center>

  <div class="input-field col l3 offset-l4 s12">
          <select class="browser-default" name="acm_tracking_number" id="sort" onchange="changeDropdown()">
              <option value="none">-----</option>

              <?php for($i=0;$i<count($_SESSION['acm_clienttracking_number']); $i++) : ?>

              <option value="<?=$_SESSION['acm_clienttracking_number'][$i]->tracking_id;?>" required>
              <?=$_SESSION['acm_clienttracking_number'][$i]->tracking_id;?>
              </option>

                  <?php endfor; ?>
          </select> 
  </div>

  <br>

  <div class="col l6 push-l2" id="search_button">
      <center><button type='submit' name='btn_searchweek'
        class='btn btn-lg waves-effect waves-light light-green'>Search</button></center>
  </div>

  </form>
  
  
  <center>

<div class="section"></div>



	  <h5>

	  <b>Corporate Type:</b> <?= Helper::showClientInfo('company_name'); ?> 

	  | <b>Tracking No:</b> <?= Helper::showClientInfo('tracking_id'); ?> 

	  </h5>



	  <h5>

	  <b>Contact No:</b> <?= Helper::showClientInfo('contact_no'); ?> 

	  </h5>



      <hr/>



      <h6>

      <b>Waybill No.</b> <?= Helper::showClientInfo('waybill_no'); ?> 

      </h6>



      <h6>

      <b>Origin</b> - <?= Helper::showClientInfo('origin'); ?>

      | <b>Destination</b> - <?= Helper::showClientInfo('destination'); ?>

      <br>

      <br>

      <b>ETA:</b> <?= Helper::showClientInfo('eta'); ?> 

      </h6>

      

      <hr/>



	  <h6>

	  <b>Product:</b> <?= Helper::showClientInfo('item_name'); ?>

	  </h6>



	  <h6>

	  <b>Transaction Date & Time:</b> <?= Helper::showClientInfo('trans_datetime'); ?> 

	  </h6>



	  <h6>

	  <b>Package Type:</b> <?= Helper::showClientInfo('package_types'); ?> 

	  | <b>Weight:</b> <?= Helper::showClientInfo('weight'); ?>

	  </h6>



	  <h6>

	  <b>Transaction Type:</b> <?= Helper::showClientInfo('transaction_type'); ?> 

	  </h6>



	  <hr>



	  <h6>

	  <b>Amount Total of the Package:</b> P<?= Helper::showClientInfo('net_profit'); ?>

	  </h6>

	  <hr>



      <table class="striped bordered">

      <thead>

         <tr>

			 <th>Drop-off Place</th>

			 <th>Depature</th>

			 <th>Delay</th>

			 <th>Remarks</th>

			 <th>Arrival</th>

			 <th>Delay</th>

			 <th>Remarks</th>

			 <th>Current Location</th>

		 </tr>

      </thead>

	  

      <tbody>

         <?php for($i=0; $i<count($_SESSION['acm_tracking_infos']); $i++) : ?>



         	<tr>

         		<td> <?= Helper::showTrackingInfo($i,'dropoff_province')." - ".

                      Helper::showTrackingInfo($i,'dropoff_city'); ?> </td>

         		<td> <?= Helper::showTrackingInfo($i,'departure_time'); ?> </td>

         		<td> <?= Helper::showTrackingInfo($i,'departure_delay'); ?> </td>

         		<td> <?= Helper::showTrackingInfo($i,'departure_remarks'); ?> </td>

         		<td> <?= Helper::showTrackingInfo($i,'arrival_time'); ?> </td>

         		<td> <?= Helper::showTrackingInfo($i,'arrival_delay'); ?> </td>

         		<td> <?= Helper::showTrackingInfo($i,'arrival_remarks'); ?> </td>

         		<td> <?= Helper::showTrackingInfo($i,'curr_province')." - ".

                      Helper::showTrackingInfo($i,'curr_city'); ?>  </td>

         	</tr>



         <?php endfor; ?>

      </tbody>

	  

      </table>

	 <br>

	  

</main>



<?php require 'partial/footer.php'; ?>



 