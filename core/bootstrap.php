<?php
	//starts a session for the page
	session_start();
	
	//initializes the session variables
	if(!isset($_SESSION['acm_authorized']) || !isset($_SESSION['acm_error']) || !isset($_SESSION['acm_print']) || !isset($_SESSION['acm_email_success']) || !isset($_SESSION['acm_update_success'])
		|| !isset($_SESSION['acm_reset_pass']) || !isset($_SESSION['acm_reset_success'])
		|| !isset($_SESSION['prodreport']) || !isset($_SESSION['acm_add_account_success'])
		|| !isset($_SESSION['acm_delete_account_success']))	
	{
		$_SESSION['acm_authorized'] = false;
		$_SESSION['acm_error'] = '';
		$_SESSION['acm_print'] = 'none';
		$_SESSION['acm_email_success'] = false;
		$_SESSION['acm_update_success'] = false;
		$_SESSION['acm_reset_pass'] = false;
		$_SESSION['acm_reset_success'] = false;
		$_SESSION['prodreport'] = 'start';
		$_SESSION['acm_add_account_success'] = false;
		$_SESSION['acm_delete_account_success'] = false;
	}	

	//var_dump($_SESSION);

	if(!isset($_SESSION['acm_shuffle_url']))
	{
		//randonly shuffles the session_id
		$shuffle_string = str_shuffle(session_id());

		//calculates the SHA-1 hash of the shuffled session_id
		$_SESSION['acm_shuffle_url'] = sha1($shuffle_string);
	}
	
	

	//binds the config dependency
	App::bind('config', require 'config.php');
	
	//binds the database connection
	App::bind('database', new QueryBuilder(
			Connection::make(App::get('config')['database'])
		));