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
  <h1> Past Transactions </h1>

	<div class="section">
	<div class="section">
	
		<h5>Company Name: <b><?= Helper::showCorpPast(0,'company_name');?></b></h5>
		<hr>
      <hr>
      <h5>E-mail Address: <b><?= Helper::showCorpPast(0,'email'); ?></b></h5>
      <hr>
      <h5>Contact Number: <b><?= Helper::showCorpPast(0,'contact_no');?></b></h5>
	</center>

	<hr>
	<br>

	<table class="striped bordered">
      <thead>
         <tr>
			 <th>Date of Transaction</th>
			 <th>Product</th>
			 <th>Transaction Type</th>
			 <th>Package Type</th>
			 <th>Total amount of the Package</th>
		 </tr>
      </thead>
	  
      <tbody>
         <?php for($i=0; $i<count($_SESSION['acm_corporate_infos']); $i++) : ?>
	   
         <tr>
         	<td><?= Helper::showCorpPast($i,'trans_datetime');?> </td>
			
         	<td><?= Helper::showCorpPast($i,'item_name');?></td>
			
         	<td><?= Helper::showCorpPast($i,'transaction_type');?></td>
			
         	<td><?= Helper::showCorpPast($i,'package_types');?></td>
			
         	<td><?= Helper::showCorpPast($i,'quantity');?></td>
         </tr> 
         <?php endfor; ?>

          
      </tbody>
	  
      </table>
     <br>
     
 </main>

<!-- Reverts back the value of the print session variable to 'none' -->
<?php $_SESSION['acm_print'] = 'none'; ?>

 <script>
   document.addEventListener("DOMContentLoaded", function(event) { 
      window.print(setTimeout(window.close, 500));
   });
 </script>