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

	<?php 
		//the navbar will not appear if the user is trying to print something
		if($_SESSION['acm_print'] == 'none')
		{
			//if the user is authenticated, the navbar will change into the backend type
			if($_SESSION['acm_authorized'] == true)
				require 'inner_nav.php';
			else
			{
				require 'nav.php';
			}
		}		
			
	?>
<main>


<center>
  <img class="responsive-img" src = "/public/img/acm.jpg" style = "height:85px">
  <center><h3>Production Report</h3></center>
  <hr>
 
   <div class="section">
  
  <?php if($_SESSION['acm_sort_by'] == 'acm_by_year') : ?>

   <!-- ____________________Year Table_________________________ -->

  <div id="year_results">
      <div class="row">
        <center>
        <b>Year: </b><?=$_SESSION['acm_sort_year'];?>
        </center>
      </div>
      <hr/>
  
      <table class="striped bordered">
      <thead>
         <tr>
       <th>Client No.</th>
       <th>Company Name</th>
       <th>Date Received</th>
       <th>Package Type</th>
       <th>Invoice Value</th>
       <th>Expenses</th>
       <th>Net Profit</th>
     </tr>
     
      </thead>
    
      <tbody>
        <?php for($i=0; $i<count($_SESSION['prodreport']); $i++) : ?>
         <tr>
            <td><?=$_SESSION['prodreport'][$i]->client_no;?></td>
            <td><?=$_SESSION['prodreport'][$i]->company_name;?></td>
            <td><?=$_SESSION['prodreport'][$i]->date_received;?></td>
            <td><?=$_SESSION['prodreport'][$i]->package_types;?></td>
            <td><?=$_SESSION['prodreport'][$i]->invoice_val;?></td>
            <td><?=$_SESSION['prodreport'][$i]->expenses;?></td>
            <td><?=$_SESSION['prodreport'][$i]->net_profit;?></td>
         </tr>
        <?php endfor; ?>
      </tbody>
    
      </table>

   <?php else : ?>

     <div id="company_results"> 
      <div class="row">
        <center>
        <b>Company Name:</b> <?=$_SESSION['prodreport'][0]->company_name;?>
        </center>
      </div>
      <hr/>
  
      <table class="striped bordered">
      <thead>
         <tr>
       <th>Client No.</th>
       <th>Date Received</th>
       <th>Package Type</th>
       <th>Invoice Value</th>
       <th>Expenses</th>
       <th>Net Profit</th>
     </tr>
     
      </thead>
    
      <tbody>
        <?php for($i=0; $i<count($_SESSION['prodreport']); $i++) : ?>
         <tr>
            <td><?=$_SESSION['prodreport'][$i]->client_no;?></td>
            <td><?=$_SESSION['prodreport'][$i]->date_received;?></td>
            <td><?=$_SESSION['prodreport'][$i]->package_types;?></td>
            <td><?=$_SESSION['prodreport'][$i]->invoice_val;?></td>
            <td><?=$_SESSION['prodreport'][$i]->expenses;?></td>
            <td><?=$_SESSION['prodreport'][$i]->net_profit;?></td>
         </tr>
        <?php endfor; ?>
      </tbody>
    
      </table>

    <?php endif; ?>

     </div>
  </main>
 
<!-- Reverts back the value of the print session variable to 'none' -->
<?php $_SESSION['acm_print'] = 'none'; ?>

 <script>
   document.addEventListener("DOMContentLoaded", function(event) { 
      window.print(setTimeout(window.close, 500));
   });
 </script>