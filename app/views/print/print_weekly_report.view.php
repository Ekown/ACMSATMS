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
  <h1> Weekly Report </h1>
  <br>
      <center>
      <b>Company Name: </b> <?=$_SESSION['acm_weekreport'][0]->company_name;?>&nbsp;&nbsp;
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
      
  </main>    
 
<!-- Reverts back the value of the print session variable to 'none' -->
<?php $_SESSION['acm_print'] = 'none'; ?>

 <script>
   document.addEventListener("DOMContentLoaded", function(event) { 
      window.print(setTimeout(window.close, 500));
   });
 </script>