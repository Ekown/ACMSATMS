 <?php
	//autoloads every class
	require 'vendor/autoload.php';
	
	require 'core/bootstrap.php';

	require 'core/phpMailer/PHPMailerAutoload.php';

	//loads and filters the routes of the user
Router::load('app/routes.php')
	->direct(Request::uri(), Request::method());

