<?php Helper::active(''); ?>
<?php require 'partial/head.php'; ?>


<center>
<div class="section">
<div class="section">
<div class="section">
<div class="section">
<div class="section">

<h3><b>ERROR 404</b></h3>
<span>Oops, sorry we can't find that page!</span>
<br />
<span>Either something went wrong or the page doesn't exist anymore.</span>
<br />
<a href="/" class="readon">Home Page</a>
</center>



<footer class="page-footer light-blue">
		<div class="container">
		  <div class="row">
			<div class="col l6 s12">
			  <h5 class="white-text">Company Bio</h5>
			  <p class="grey-text text-lighten-4">
				In our thrust to become a major player in Philippine Market for International and Domestic Freight Forwarding, we have formally established a corporation on February 14, 2007.
			  We believe that as a budding corporation, we are backed by our more than 20 years of experience in this industry that enabled us to capture a good addition to our already existing clientele base: with the best composite of major accounts which are strongholds in Cebu and Manila as corporations of excellent standing.
			  </p>


			</div>
			<!-- <div class="col l3 s12">
			  <h5 class="white-text">About Us</h5>
			  <ul>
				<li><a class="white-text" href="#!">About Us</a></li>
				<li><a class="white-text" href="#!">Certifications</a></li>
				<li><a class="white-text" href="#!">Services</a></li>
				<li><a class="white-text" href="projects">Projects</a></li>
			  </ul>
			</div> -->
			<div class="col l3 s12">
			  <h5 class="white-text">Contact Us</h5>
			  <ul>
				<a class="white-text" href="https://www.facebook.com/profile.php?id=100009525266202&ref=br_rs" target="_blank"><img src = "/public/img/facebook-box.png"></a>
				<a class="white-text" href="https://www.twitter.com" target="_blank"><img src = "/public/img/twitter.png"></a>
			 </ul>
			</div>
		  </div>
		</div>
		<div class="footer-copyright">
		  <div class="container">
		  © 2016 Airland Cargo Movers Inc. All rights Reserved.
		  Made by <a class="white-text" href="#"><b>PLM ITerates</b></a>		  
		  </div>
		</div>
	  </footer>

<!-- JQuery script -->
<script src="/public/js/jquery.min.js"></script>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
-->

<!-- Materialize Script -->
<script src="/public/js/materialize.min.js"></script>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js" integrity="sha256-pVJ6toFhRjat2LSvxugXvMnNDp33i00nfn0CpPXZevs=" crossorigin="anonymous"></script>
-->

<!-- Init Script for Mobile View (Materialize) -->
<script src="/public/js/init.js"></script>

<!-- Ripple Script -->
<script src="/public/js/ripple.js"></script>

<script>

	//error messages
	<?php 
		switch($_SESSION['acm_error'])
		{
			case 'track':
				echo "error_msg('Wrong tracking number!');";
				break;

			case 'login':
				echo "error_msg('Wrong username or password!');";
				break;

			case 'mismatch':
				echo "error_msg('Your passwords mismatched!');";
				break;

			case 'old_password':
				echo "error_msg('Your old password is incorrect!');";
				break;

			case 'pass_exists':
				echo "error_msg('Your new password already exists!');";
				break;

			case 'email':
				echo "error_msg('There was an error sending your email. Please check your entered details.');";
				break;

			case 'name':
				echo "error_msg('The name you entered is already taken.');";
				break;

			case 'login_details':
				echo "error_msg('The username and password you entered are already taken.');";
				break;

			case 'company_details':
				echo "error_msg('The company name and address you entered are already taken.');";
				break;

			case 'email_exists':
				echo "error_msg('The email is already in use!');";
				break;

			case 'forgot-password':
				echo "error_msg('The email is invalid!')";
				break;

		}

	//resets the variable
	$_SESSION['acm_error'] = '';	

	?>

	//error message alert function
	function error_msg($text)
	{
		swal({
			title: $text,
			showConfirmButton: true
		});
	}

	function logout()
	{
		swal({
			title: 'Are you sure you want to logout?',
			showCancelButton: true,
			closeOnConfirm: false
		},
		function()
		{
			window.location = "/logout";
		});
	}

</script>

</body>
</html>