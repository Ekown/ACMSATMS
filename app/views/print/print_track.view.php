<!DOCTYPE html>
<html lang="en">
<head>
<title>Airland Cargo Movers Inc.</title>

<link rel="icon" type="image/x-icon" href="/favicon.ico" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<!-- Material Icons Font -->		
<link href="/public/css/materialdesignicons.css" rel="stylesheet" />

<!-- 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
-->

<!-- Font Awesome CSS -->
<link href="/public/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<!-- Materialize CSS -->
<link href="/public/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" integrity="sha256-fGJODaGYSINeMscXSbyu3k+sCt9ON9XOpsVOcvco3Qg=" crossorigin="anonymous" />
-->

<!-- SweetAlert CSS (Alert() substitute) -->
<link rel="stylesheet" type="text/css" href="/public/css/sweetalert.css" />

<!-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha256-iXUYfkbVl5itd4bAkFH5mjMEN5ld9t3OHvXX3IU8UxU=" crossorigin="anonymous" />
-->

<!-- SweetAlert Script (Alert() Substitute) -->
<script src="/public/js/sweetalert.min.js"></script>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha256-egVvxkq6UBCQyKzRBrDHu8miZ5FOaVrjSqQqauKglKc=" crossorigin="anonymous"></script>
-->

<!-- Open Sans Font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!-- Style CSS -->
<link href="/public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<!-- Ripple CSS -->
<link href="/public/css/ripple.css" rel="stylesheet" type="text/css" media="screen,projection" />

</head>

<body>
<main>
<center>
  <img class="responsive-img" src = "/public/img/acm.jpg" style = "height:85px">
  <h1> Package Info </h1>
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
	
      <hr/>
      <br>
	  <br>
	 </center>  
  </main>
 </body>
 
<!-- Reverts back the value of the print session variable to 'none' -->
<?php $_SESSION['acm_print'] = 'none'; ?>

 <script>
   document.addEventListener("DOMContentLoaded", function(event) { 
      window.print(setTimeout(window.close, 500));
   });
 </script>