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

<!-- Snackbar CSS -->
<link rel="stylesheet" type="text/css" href="/public/css/snackbar_ui.css" />

<!-- Open Sans Font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!-- Style CSS -->
<link href="/public/css/style_ui.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<!-- Ripple CSS -->
<link href="/public/css/ripple.css" rel="stylesheet" type="text/css" media="screen,projection" />

<!-- Editable Table CSS -->
<link href="/public/css/editable-table.css" rel="stylesheet" type="text/css" media="screen,projection" />

<!--Material-Bootstrap Datetime Picker CSS-->
<link href="/public/css/bootstrap-material-datetimepicker.css" rel="stylesheet" type="text/css" media="screen,projection" />

<!-- Tooltipster CSS -->
<link rel="stylesheet" type="text/css" href="/public/tooltipster/dist/css/tooltipster.bundle.min.css" />

</head>

<style type="text/css">
	.tooltipster-sidetip.tooltipster-default.tooltipster-default-customized .tooltipster-box {
	background: pink;
	border: 3px solid darkred;
	border-radius: 6px;
	box-shadow: 5px 5px 2px 0 rgba(0,0,0,0.4);
}

.tooltipster-sidetip.tooltipster-default.tooltipster-default-customized .tooltipster-content {
	color: black;
	padding: 8px;
}
</style>

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