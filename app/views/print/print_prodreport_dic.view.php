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
  <div class="section">
  <center><h3>Production Report</h3></center>
  <hr>
  <form action="" method="POST">
    <!-- Sort By Dropdown -->
    <div class="row">
           <div class="input-field col l2 offset-l3 s12">
             Sort By
             <select class="browser-default" name="acm_sort_by" id="sort" onchange="changeDropdown()">
              <option value="none">-----</option>
               <option value="acm_by_year">Year</option>
               <option value="acm_by_company">Company Name</option>
             </select>         
           </div>

           <!-- Year Dropdown -->
           <div class="input-field col l2 offset-l2 s12" id="by_year" hidden>
             Year
             <select class="browser-default" name="acm_sort_year" onchange="showYearTable()">
              <option value="year_none">-----</option>
               
               <?php for($i=0; $i<count($_SESSION['acm_years']); $i++) : ?>
                  <option value="<?=$_SESSION['acm_years'][$i]->curr_year;?>"> 
                    <?=$_SESSION['acm_years'][$i]->curr_year;?> 
                  </option>
               <?php endfor; ?>

             </select>         
           </div>

           <!-- Company Dropdown -->
           <div class="input-field col l2 offset-l2 s12" id="by_company" hidden>
             Company Name
             <select class="browser-default" name="acm_sort_company" onchange="showCompanyTable()">
              <option value="company_none">-----</option>
               
                <?php for($i=0; $i<count($_SESSION['acm_companies']); $i++) : ?>
                  <option value="<?=$_SESSION['acm_companies'][$i]->company_name;?>"> 
                    <?=$_SESSION['acm_companies'][$i]->company_name;?> 
                  </option>
                <?php endfor; ?>

             </select>         
           </div>
         </div>

         <center>
         <div class="row" id="search_button" hidden>
          <button type='submit' name='btn_search' 
          class='btn btn-lg waves-effect waves-light light-green'>Search</button>
        </div>
        </center>
      </form>
   <div class="section">
  
  <div id="year_results" hidden> 
      <h6>Company Name</h6>
      <hr/>
      <h6>JANUARY 1 2016 - December 31 2016</h6>
    <hr/>
      <h6>Client Number: 24</h6>
    <hr/>
      <table class="striped bordered">
      <thead>
         <tr>
       <th>Date</th>
       <th>Package Type</th>
       <th>Package Cost</th>
       <th>Invoice Value</th>
       <th>Expenses</th>
       <th>Net Profit</th>
     </tr>
     
      </thead>
    
      <tbody>
         <tr>
       <td>7/23/10</td>
       <td></td>
       <td></td>
       <td>P20,000</td>
       <td>P15,000</td>
       <td>P5,000</td>
     </tr>
     
          <tr>
       <td>9/13/10</td>
       <td></td>
       <td></td>
       <td>P15,000</td>
       <td>P9,000</td>
       <td>P6,000</td>
     </tr>
     
     <tr>
       <td>11/3/10</td>
       <td></td>
       <td></td>
       <td>P30,000</td>
       <td>P20,000</td>
       <td>P10,000</td>
     </tr>
      </tbody>
    
      </table>

     <div class="wrap">
        <a class="button green lighten-1" target="_blank" href="print/prodreport"><b>Print</b></a>
      </div>
     </div>

     <div id="company_results" hidden> 
      <h6>
        <?=$_SESSION['prodreport'][0]->company_name;?>
      </h6>
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
      </tbody>
    
      </table>

    <?php endfor; ?>

     <div class="wrap">
        <a class="button green lighten-1" target="_blank" href="print/prodreport"><b>Print</b></a>
      </div>
     </div>
  </main>
      
 
<!-- Reverts back the value of the print session variable to 'none' -->
<?php $_SESSION['acm_print'] = 'none'; ?>

 <script>
   document.addEventListener("DOMContentLoaded", function(event) { 
      window.print(setTimeout(window.close, 500));
   });
 </script>