<?php require 'partial/head.php'; ?>

<main>
	<div class="section">
	<div class="section">
	<center>
		<h5>Client Name: </h5>
		<hr>
		<h5>Address:</h5>
		<hr>
		<h5>E-mail Address:</h5>
		<hr>
		<h5>Contact Number:</h5>
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
			 <th>Destination</th>
       <th>Status</th>
       <th>Date Received</th>
		 </tr>
      </thead>
	  
      <tbody>
         <tr>
         	<td>28/02/2017</td>
         	<td>Jacket</td>
         	<td>Land</td>
         	<td>Box</td>
         	<td>Davao</td>
          <td>Delivered</td>
          <td>1/03/2017</td>
         </tr> 

          <tr>
         	<td>22/01/2017</td>
         	<td>Nike Shoes</td>
         	<td>Land</td>
         	<td>Box</td>
          <td>Cebu</td>
          <td>Delivered</td>
          <td>26/01/2017</td>
         </tr>       
      </tbody>
	  
      </table>
      <br>
      <center>
       <a class="button green lighten-1" target="_blank" href="print/pasttransactions"><b>Print!</b></a>
     </center>

 </main>


<?php require 'partial/footer.php'; ?>