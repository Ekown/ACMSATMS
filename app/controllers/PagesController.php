<?php

/**
* 	controller that manages your pages
*/
class PagesController
{
	public function __construct()
	{
		if($_SESSION['acm_authorized'] == true)
		{
			Helper::redirect('administrator/index');
		}
	}
 
        public function activateAccount()
	{
		$activateUserAccount = App::get('database')->activateAccount($_SESSION['acm_create_account']['email']);

		return Helper::redirect('login');
	}
	
	public function createAccount()
	{

		// if(isset($_POST['acm_corporate_name']) && isset($_POST['acm_corporate_address']))
		// {
		// 	$check_company_details = App::get('database')
		// 	->checkCompany($_POST['acm_corporate_name'],$_POST['acm_corporate_address']);
		// }
		// else
		// {
		// 	$check_company_details = null;
		// 	$_POST['acm_corporate_name'] = null;
		// 	$_POST['acm_corporate_address'] = null;
		// }

		Helper::active('');

			$_SESSION['acm_create_account'] = [
			'first_name' => $_POST['acm_avail_fname'],
			'last_name' => $_POST['acm_avail_lname'],
			'email' => $_POST['acm_avail_email'],
			'contact_no' => $_POST['acm_avail_cnum'],
			'address' => $_POST['acm_avail_address'],
			'user_name' => $_POST['acm_avail_user'],
			'password' => $_POST['acm_avail_password'],
			'user_id' => 7,
			'company_name' => $_POST['acm_corporate_name'],
			'company_address' => $_POST['acm_corporate_address']
		];
	
		//$check_name = App::get('database')->checkNames($_POST['acm_avail_fname'],$_POST['acm_avail_lname']);

		// $check_username = App::get('database')
		// 	->checkUsername($_POST['acm_avail_user']);

		// $check_password = App::get('database')
		// 	->checkPassword($_POST['acm_avail_password']);

		// $check_email = App::get('database')->checkEmail($_POST['acm_avail_email']);

		// //if the name and last name is already taken
		// if($check_name != null)
		// {
		// 	$_SESSION['acm_error'] = 'name';
		// }
		//if the username and password is already taken
		// if($check_username != null || $check_password != null)
		// {
		// 	$_SESSION['acm_error'] = 'login_details';
		// }
		// // //if the email is already used
		// // elseif($check_email != null)
		// // {
		// // 	$_SESSION['acm_error'] = 'email_exists';
		// // }
		// //if the password and confirm password didn't match
		// elseif($_POST['acm_avail_password'] != $_POST['acm_avail_con_password'])
		// {
		// 	$_SESSION['acm_error'] = 'mismatch';
		// }
		// //if the company name and address is already taken
		// elseif($check_company_details != null)
		// {
		// 	$_SESSION['acm_error'] = 'company_details';
		// }
		// //if there were no errors in creating the account
		// else
		// {

			$verification_mail_sent = new Mail;

			if($verification_mail_sent->sendVerifyMail())
			{
				// $_SESSION['acm_email_success'] = true;
			}
			else
			{
				// $_SESSION['acm_error'] = 'email';
			}

			//<<EMIL>>
			$max_client_number = App::get('database')->GetMaxClientNumber('client_info');

			$maxnum2 = json_decode(json_encode($max_client_number), true); //For the corporate number
			foreach($maxnum2 as $maxnum2)
			{
	    		foreach($maxnum2 as $key => $val)
	    		{
	        		$max2 = intval($val);
	    		}
			}
			$max2 = $max2 + 1;
			//<<EMIL>>

			$_SESSION['acm_create_account_success'] = true;

			$_SESSION['acm_user'] = $_POST['acm_avail_user'];

			$create_account = App::get('database')->insert('user_info',$_SESSION['acm_create_account']);

			$ClientInsert = App::get('database')->ClientInsert($max2, $_SESSION['acm_user']);	//<<<<<<EMIL>>>>>

			//automatically redirects the user to the homepage of the user module 
			$_POST['acm_username'] = $_POST['acm_avail_user'];

			$_POST['acm_pass'] = $_POST['acm_avail_password'];

			$_SESSION['acm_send_verify_email'] = true;

			// $login = new LoginController;

			// return $login->authenticate();

			return Helper::redirect('login');
		

		// return Helper::redirect('create-account');

	}

	public function forgotPassword()
	{
		Helper::active('');

		//checks if the email is valid
		$check_email = App::get('database')->checkEmail($_POST['acm_forgot_email']);


		//if the email is valid
		if($check_email != null)
		{
			$_SESSION['acm_forgot_email'] = $_POST['acm_forgot_email'];

			$reset_mail = new Mail;

			$reset_mail->sendResetMail();

			return Helper::redirect('confirm_email');

		}
		else
		{	
			 $_SESSION['acm_error'] = 'forgot-password';

			 return Helper::redirect('forgot-password');

		}	
	}

	public function home()
	{	

		Helper::active('home');

		return Helper::view('index');
	}

	public function services()
	{
		Helper::active('services');
		return Helper::view('services');
	}

	public function viewAbout()
	{	
		Helper::active('about');
		return Helper::view('about');
	}

	public function contact()
	{
		Helper::active('contact');
		return Helper::view('contact');
	}

	public function email()
	{
		Helper::active('contact');					

		$mail_sent = new Mail;

		if($mail_sent->sendMessageUs())
		{
			$_SESSION['acm_email_success'] = true;
		}
		else
		{
			$_SESSION['acm_error'] = 'email';
		}

		return Helper::redirect('contact');
	}


	public function track()
	{
		Helper::active('track');
		return Helper::view('track');
	}

	public function viewCreateAccount()
	{

		Helper::active('');

		return Helper::view('create_account');
	}

	public function viewForgotPassword()
	{
		Helper::active('');

		return Helper::view('forgot_password');
	}

	public function result()
	{
		Helper::active('result');
		$number = $_POST['acm_tracking_number'];
		Helper::active('track');

		$acm_client_info = App::get('database')->packageClientDetails($number);

		$acm_tracking_info = App::get('database')->packageTrackingDetails($number);

		//if the tracking number is correct		
		if($acm_client_info)
		{	
			$_SESSION['acm_client_infos'] = $acm_client_info;

			$_SESSION['acm_tracking_infos'] = $acm_tracking_info;

			return Helper::view('result');
		}
		else
		{
			$_SESSION['acm_error'] = 'track';

			if(App::get('track') == 'active')
				return Helper::redirect('track');
			
		}
		
	}

	public function resetPassword()
	{
		Helper::active('');

		$reset_pass = App::get('database')->resetPassword($_POST['acm_new_pass'], 
			$_SESSION['acm_forgot_email']);

		$_SESSION['acm_reset_success'] = true;

		unset($_SESSION['acm_shuffle_url']);

		return Helper::redirect('login');
	}

	public function viewResetPassword()
	{
		Helper::active('');

		$_SESSION['acm_reset_pass'] = true;

		return Helper::view('forgot_password');
	}

	public function viewConfirmEmail()
	{
		Helper::active('');

		return Helper::view('confirm_email');
	}

	public function login()
	{
		Helper::active('login');
		return Helper::view('login');
	}

	public function avail()
	{
		Helper::active('avail');
		return Helper::view('avail');
	}
	
	public function pasttransactions()
	{
		Helper::active('pasttransactions');
		return Helper::view('pasttransactions');
	}

	public function corporate_track()
	{
		Helper::active('corporate_track');
		return Helper::view('corporate_track');
	}

	public function corporate_avail()
	{
		Helper::active('corporate_avail');
		return Helper::view('corporate_avail');
	}

	public function corporate_result()
	{
		Helper::active('corporate_result');
		return Helper::view('corporate_result');
	}
	public function printTrackResult()
	{
		Helper::active('');
		$_SESSION['acm_print'] = 'track';
		return Helper::view('print/print_track');
	}
		
}