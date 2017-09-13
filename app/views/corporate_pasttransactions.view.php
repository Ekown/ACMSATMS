<?php require 'partial/head.php'; ?>

<main>
	<div class="section">
	<div class="section">
	<center>

      <h5>Company Name: <b><?= Helper::showCorpPast(0,'company_name');?></b> </h5>
      <hr>
      <h5>E-mail Address: <b> <?= Helper::showCorpPast(0,'email'); ?></b> </h5>
      <hr>
      <h5>Contact Number: <b> <?= Helper::showCorpPast(0,'contact_no');?> </b></h5>
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
	  
      </table>
     <br>
     <center>
       <a class="button green lighten-1" target="_blank" href="print/pasttransactions"><b>Print!</b></a>
     </center>
 </main>


<?php require 'partial/footer.php'; ?>