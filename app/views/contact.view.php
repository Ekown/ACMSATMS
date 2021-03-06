<?php require 'partial/head.php'; ?>



<div class="container">

	<div class="row"><br>

		<div class = "col s12 m6">

			<div class = "card grey lighten-3">

			<div class = "card-content white-text">

				<font color = "#013588">

					<b>Main Office</b>

					<p>DOOR# 315 & 317 N&N CORTES ARCADE A.C. CORTES AVE., MANDAUE CITY CEBU, PHILIPPINES</p>

					<p>TEL: (63-32) 344-6447/4228890</p>

					<p>TEL. FAX: (63-32) 238-2877</p>

					

					<br>

					<hr>

					<br>



					<b>Manila Office</b>

					<p>DOOR# 202 NUEVA CONDOMINIUM 628 YUCHENGCO ST. BINONDO, MANILA</p>

					<p>TEL: (63-02) 516-6278</p>

					<p>TEL/FAX: (63-02) 241-5711</p>



					<br>

					<br>



					<hr>

					<br>

					<b>E-MAILS:</b>

					<p><b>info@airlandcargomovers.com</b></p>

					<p><b>airland@pldtdsl.net</b></p>

					<p><b>airlandcargo@yahoo.com.ph</b></p>

				</font>

			</div>

		</div>

	</div>



	<div class="col s12 m6">

		<div class = "card grey lighten-3">

			<div class = "card-content">

				<h4 class="center-align"><b>Message Us</b></h4>	

				<hr>				

					<div class="row">

					  <form class="col l12 m12 s12" method="POST" action="/contact" id="messageUsForm">

						<div class="row">

							<div class="input-field col s12">

								<i class="material-icons prefix">account_circle</i>

								<input id="acm_message_name" name='acm_message_name' type="text">

								<label for="acm_message_name">Name</label>

							</div>

							<div class="input-field col s12">

								<i class="material-icons prefix">email</i>

								<input id="acm_message_email" name='acm_message_email' type="email" class="validate" name="acm_email">

								<label for="acm_message_email">Email</label>

							</div>

							<div class="input-field col s12">

								<i class="material-icons prefix">message</i>

								<textarea id="acm_message" class="materialize-textarea" type="text"

								name="acm_message"></textarea>

								  <label for="acm_message">Message</label>

							</div>

							<div class="input-field col s12">

								<center><button class="btn waves-effect waves-light" type="submit" name="action">Send Message</button></center>

							</div>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>	

</div>

</div>



<?php if($_SESSION['acm_email_success'] == true) : ?>



<script>

	swal({

		title: "Email was sent successfully",

		timer: 3000,

		showConfirmButton: false

	});

</script>





<?php 



	$_SESSION['acm_email_success'] = false;

	endif; 



?>



<?php require 'partial/footer.php' ?>