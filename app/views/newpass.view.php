<?php require 'partial/head.php'; ?>

<?php for ($i=0; $i < 17 ; $i++) : ?>

<div class="section"></div>

<?php endfor; ?>

<script>
	swal({
		title: "Password change was successful!",
		type: "success",
		timer: 2000
	},
	function()
	{
		<?php if($_SESSION['acm_userlevel'] == 'Admin') : ?>

			window.location = "/administrator/index";

		<?php elseif($_SESSION['acm_userlevel'] == 'Accounting In-Charge') : ?>

			window.location = "/accounting-in-charge/index";

		<?php elseif($_SESSION['acm_userlevel'] == 'Branch Manager') : ?>

			window.location = "/branch-manager/index";

		<?php elseif($_SESSION['acm_userlevel'] == 'Domestic In-Charge') : ?>

			window.location = "/domestic-in-charge/index";

		<?php elseif($_SESSION['acm_userlevel'] == 'Operations Manager') : ?>

			window.location = "/operations-manager/index";

		<?php elseif($_SESSION['acm_userlevel'] == 'Agent') : ?>

			window.location = "/agent/index";

		<?php elseif($_SESSION['acm_userlevel'] == 'User') : ?>

			window.location = "/user/track";

		<?php elseif($_SESSION['acm_userlevel'] == 'Corporate') : ?>

			window.location = "/corporate/track";

		<?php endif; ?>
	});
</script>

<?php require 'partial/footer.php'; ?>