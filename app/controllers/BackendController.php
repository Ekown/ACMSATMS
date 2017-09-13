<?php

class BackendController
{
	public function __construct()
	{
		//clears the result container
		App::bind('result','');

		//if an unauthorized user would access the back-end, the user will be redirected back
		if($_SESSION['acm_authorized'] == false)
		{
			Helper::redirect('login');
		}
	}

	public function corpocontact() //6/2
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}
                $_SESSION['acm_corpemail_success'] = null;

		Helper::active('corpcontact');
		return Helper::view('corporate_contact');
	}

	public function corpoemail() //6/2
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}


		Helper::active('corpcontact');					

		$mail_sent = new Mail;

		if($mail_sent->sendMessageUs())
		{
			$_SESSION['acm_corpemail_success'] = true;
		}
		else
		{
			$_SESSION['acm_error'] = 'email';
		}

		return Helper::redirect('/');
	}

	public function corporatePastTransactions()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}

		Helper::active('pasttransactions');

		$acm_corporate_info = App::get('database')->packageClientDetailsPastTransac($_SESSION['acm_username'], $_SESSION['acm_pass']);

		$_SESSION['acm_corporate_infos'] = $acm_corporate_info;

		return Helper::view('corporate_pasttransactions');
	}

	public function userPastTransactions()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'User')
		{
			return Helper::redirect('/');
		}

		Helper::active('userpasttransactions');

		return Helper::view('user_pasttransactions');
	}

	public function user_avail()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'User')
		{
			return Helper::redirect('/');
		}

		//gets all the province from the database
		$get_all_province = App::get('database')->selectAll('province');

		//gets all the city from the database
		$get_all_city = App::get('database')->selectAll('city');

		if(($get_all_province != null)&&($get_all_city != null))
		{
			$_SESSION['acm_province'] = $get_all_province;
			$_SESSION['acm_city'] = $get_all_city;
		}

		Helper::active('user_avail');

		return Helper::view('user_avail');
	}

	public function corporate_avail()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}

		$_SESSION['acm_avail_success'] = false;

		//gets all the province from the database
		$get_all_province = App::get('database')->selectAll('province');

		//gets all the city from the database
		$get_all_city = App::get('database')->selectAll('city');

		$get_all_types = App::get('database')->selectAll('package_type');

		if(($get_all_province != null)&&($get_all_city != null)&&($get_all_types != null))
		{
			$_SESSION['acm_province'] = $get_all_province;
			$_SESSION['acm_city'] = $get_all_city;
			$_SESSION['acm_types'] = $get_all_types;
		}


		Helper::active('corporate_avail');

		return Helper::view('corporate_avail');
	}

	public function postCorporateAvail() //EMIL <!--//6/2-->
	{

		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}

		//gets all the province from the database
		$get_all_province = App::get('database')->selectAll('province');

		//gets all the city from the database
		$get_all_city = App::get('database')->selectAll('city');

		$get_all_types = App::get('database')->selectAll('package_type');

		if(($get_all_province != null)&&($get_all_city != null)&&($get_all_types != null))
		{
			$_SESSION['acm_province'] = $get_all_province;
			$_SESSION['acm_city'] = $get_all_city;
			$_SESSION['acm_types'] = $get_all_types;
		}

		
		$max_tracking_number = App::get('database')->GetMaxTrackingNumber('client_package');
		$max_waybill_number = App::get('database')->GetMaxWaybillNumber('transaction_info');
		$max_airlandwaybill_number = App::get('database')->GetMaxAirlandWaybillNumber('transaction_info');
		$get_corporate_number = App::get('database')->GetClientNumber($_SESSION['acm_username'], $_SESSION['acm_pass'], 'client_info');

		Helper::active('corporate_avail');

			$item = $_POST['acm_avail_item'];
			$quantity = $_POST['acm_avail_quantity'];
			$weight = $_POST['acm_avail_weight'];
			
			$packagetype = App::get('database')->GetPackageID($_POST['type']);



			$orgprovince = $_POST['prov_name'];
			$orgcity = $_POST['orgcity'];
			$destination_prov = $_POST['des_prov'];
			$destination_city = $_POST['des_city'];
			$receiver_name = $_POST['acm_receiver_name'];
			$receiver_address = $_POST['acm_receiver_address'];
			$contact = $_POST['acm_receiver_cnum'];
			$company_name = $_POST['acm_company_name'];
				
			$maxnum = json_decode(json_encode($max_tracking_number), true); //For the max tracking id
			foreach($maxnum as $maxnum)
			{
	    		foreach($maxnum as $key => $val)
	    		{
	        		$max = intval($val);
	    		}
			}

			$maxnum2 = json_decode(json_encode($get_corporate_number), true); //For the corporate number
			foreach($maxnum2 as $maxnum2)
			{
	    		foreach($maxnum2 as $key => $val)
	    		{
	        		$max2 = intval($val);
	    		}
			}

			$maxnum3 = json_decode(json_encode($max_waybill_number), true); //For the max waybill no
			foreach($maxnum3 as $maxnum3)
			{
	    		foreach($maxnum3 as $key => $val)
	    		{
	        		$max3 = intval($val);
	    		}
			}

			$maxnum4 = json_decode(json_encode($max_airlandwaybill_number), true); //For the max airland waybill no
			foreach($maxnum4 as $maxnum4)
			{
	    		foreach($maxnum4 as $key => $val)
	    		{
	        		$max4 = intval($val);
	    		}
			}

			$packagenum = json_decode(json_encode($packagetype), true); //For the max tracking id
			foreach($packagenum as $packagenum)
			{
	    		foreach($packagenum as $key => $val)
	    		{
	        		$packagenumber = intval($val);
	    		}
			}

			$max = $max + 1;
			$max3 = $max3 + 1;
			$max4 = $max4 + 1;

			$insertt = App::get('database')->Inserttt($max, $max2);	
		
			$insert = App::get('database')->InsertAvail($max, $item, $quantity, $weight, $orgcity, $destination_city, $receiver_name, $receiver_address, $contact, $company_name, $packagenumber);

			$insertBillNo = App::get('database')->InsertBillNo($max, $max3, $max4, "Air");

			$_SESSION['acm_avail_success'] = true;	


		return Helper::view('corporate_avail'); 
	}


	/* /////TRY CORPORATE AVAIL 

	public function corporateAvail()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}

		//gets all the province from the database
		$get_all_province = App::get('database')->selectAll('province');

		//gets all the city from the database
		$get_all_city = App::get('database')->selectAll('city');

		$get_all_types = App::get('database')->selectAll('package_type');

		if(($get_all_province != null)&&($get_all_city != null)&&($get_all_types != null))
		{
			$_SESSION['acm_province'] = $get_all_province;
			$_SESSION['acm_city'] = $get_all_city;
			$_SESSION['acm_types'] = $get_all_types;
		}
		
		Helper::active('corporate_avail');
		

		<<<<<<<<<<<<<<<<TRY EMIL>>>>>>>>>>>>>>>>>>>>>>>>>>>

		//$max_tracking_number = App::get('database')->GetMaxTrackingNumber('client_package');
		//$maxnum = $max_tracking_number[0];
		//var_dump($maxnum);
		//$max = intval($maxnum);
		//$max = $max_tracking_number;
		//$get_corporate_number = App::get('database')->GetClientNumber($_SESSION['acm_username'], $_SESSION['acm_pass'], 'client_info');
		$item = $_POST['acm_avail_item'];
		$quantity = $_POST['acm_avail_quantity'];
		$weight = $_POST['acm_avail_weight'];
		$packagetype = App::get('database')->GetPackageID($_POST['type']);
		$orgprovince = $_POST['prov_name'];
		$orgcity = $_POST['orgcity'];
		$destination_prov = $_POST['des_prov'];
		$destination_city = $_POST['des_city'];
		$receiver_name = $_POST['acm_receiver_name'];
		$receiver_address = $_POST['acm_receiver_address'];
		$contact = $_POST['acm_receiver_cnum'];
		$company_name = $_POST['acm_company_name'];

		$insertt = App::get('database')->Inserttt($max, $get_corporate_number);	
		
		$insert = App::get('database')->InsertAvail($max, $item, $quantity, $weight, $orgcity, $destination_city, $receiver_name, $receiver_address, $contact, $company_name);

		<<<<<<<<<<<<<<<<TRY EMIL>>>>>>>>>>>>>>>>>>>>>>>>>>>


		<<<<<<<<<<<<<<<<TRY ROLDAN>>>>>>>>>>>>>>>>>>>>>>>>>

		$max_tracking_number = App::get('database')->GetMaxTrackingNumber('client_package');
		$maxnum = $max_tracking_number[0];
		$max = intval($maxnum);
		$max = $max + 1;
		$get_corporate_number = App::get('database')->GetClientNumber($_SESSION['acm_username'], $_SESSION['acm_pass'], 'client_info');
		$item = $_POST['acm_avail_item'];
		$item = $_POST['acm_avail_item'];
		$quantity = $_POST['acm_avail_quantity'];
		$weight = $_POST['acm_avail_weight'];
		$packagetype = App::get('database')->GetPackageID($_POST['type']);
		$orgprovince = $_POST['prov_name'];
		$orgcity = $_POST['orgcity'];
		$destination_prov = $_POST['des_prov'];
		$destination_city = $_POST['des_city'];
		$receiver_name = $_POST['acm_receiver_name'];
		$receiver_address = $_POST['acm_receiver_address'];
		$contact = $_POST['acm_receiver_cnum'];
		$company_name = $_POST['acm_company_name'];

		$insertt = App::get('database')->Inserttt($max, $get_corporate_number);	
		
		$insert = App::get('database')->InsertAvail($max, $item, $quantity, $weight, $orgcity, $destination_city, $receiver_name, $receiver_address, $contact, $company_name);
												
		<<<<<<<<<<<<<<<<TRY ROLDAN>>>>>>>>>>>>>>>>>>>>>>>>>
		
		return Helper::view('corporate_avail');
	}
	*/


	public function user_track()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'User')
		{
			return Helper::redirect('/');
		}

		Helper::active('user_track');

		return Helper::view('user_track');
	}

	public function corporate_track() //6/2 -->
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}

		Helper::active('corp_track');

		$get_corporate_number = App::get('database')->GetClientNumber($_SESSION['acm_username'], $_SESSION['acm_pass'], 'client_info');

		$clientnum = json_decode(json_encode($get_corporate_number), true); //For the max tracking id
			foreach($clientnum as $clientnum)
			{
	    		foreach($clientnum as $key => $val)
	    		{
	        		$clientnum = intval($val);
	    		}
			}

		$_SESSION['acm_clienttracking_number'] = App::get('database')->getTrackingNumber($clientnum);



		return Helper::view('corporate_track');
	}
	
	public function corporateResult()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Corporate')
		{
			return Helper::redirect('/');
		}

		Helper::active('track');
		
		$number = $_POST['acm_tracking_number'];

		

		$acm_client_info = App::get('database')->packageCorporateDetails($number, $_SESSION['acm_username'], $_SESSION['acm_pass']);

		$acm_tracking_info = App::get('database')->packageCorporateTrackingDetails($number, $_SESSION['acm_username'], $_SESSION['acm_pass']);


		//if the tracking number is correct		
		if($acm_client_info)
		{	
			$_SESSION['acm_client_infos'] = $acm_client_info;

			$_SESSION['acm_tracking_infos'] = $acm_tracking_info;

			return Helper::view('corporate_result');
		}
		else
		{
			$_SESSION['acm_error'] = 'track';

			if(App::get('track') == 'active')
				return Helper::redirect('track');
			
		}

		return Helper::view('corporate_result');
	}

	public function admin_index()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Admin')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$_SESSION['acm_users'] = App::get('database')->selectAll('user_info');

		return Helper::view('admin_index');
	}

	public function viewAdminAddemployee()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Admin')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		return Helper::view('admin_addemployee');
	}

	public function adminAddemployee()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Admin')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$check_name = App::get('database')
			->checkNames($_POST['acm_add_fname'],$_POST['acm_add_lname']);

		$check_email = App::get('database')->checkEmail($_POST['acm_add_email']);

		$check_username = App::get('database')
			->checkUsername($_POST['acm_add_uname']);

		$check_password = App::get('database')
			->checkPassword($_POST['acm_add_password']);

		//if the name and last name is already taken
		if($check_name != null)
		{
			$_SESSION['acm_error'] = 'name';
		}
		//if the username and password is already taken
		elseif($check_username != null || $check_password != null)
		{
			$_SESSION['acm_error'] = 'login_details';
		}
		//if the email is already used
		elseif($check_email != null)
		{
			$_SESSION['acm_error'] = 'email_exists';
		}
		//if the password and confirm password didn't match
		elseif($_POST['acm_add_password'] != $_POST['acm_add_cpassword'])
		{
			$_SESSION['acm_error'] = 'mismatch';
		}
		//if there were no errors in creating the account
		else
		{

			$_SESSION['acm_add_account_success'] = true;

			$_SESSION['acm_add_account'] = [
				'first_name' => $_POST['acm_add_fname'],
				'middle_initial' => strtoupper($_POST['acm_add_mname']).".",
				'last_name' => $_POST['acm_add_lname'],
				'email' => $_POST['acm_add_email'],
				'contact_no' => $_POST['acm_add_cnumber'],
				'address' => $_POST['acm_add_address'],
				'user_name' => $_POST['acm_add_uname'],
				'password' => $_POST['acm_add_password'],
				'user_id' => $_POST['acm_user_type']
			];

			$add_account = App::get('database')->insert('user_info',$_SESSION['acm_add_account']);
		}
		
		return Helper::redirect('administrator/index');
	}

	public function viewAdminDeleteemployee()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Admin')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		return Helper::view('admin_deleteemployee');
	}

	public function adminDeleteemployee()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Admin')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		//deletes the user from the database
		$delete_user = App::get('database')
			->deleteUser($_SESSION['acm_users'][$_POST['acm_delete_user']]->user_name);

		$_SESSION['acm_delete_account_success'] = true;

		return Helper::redirect('administrator/index');
	}

	public function agent_search()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Agent')
		{
			return Helper::redirect('/');
		}
		
		Helper::active('search');

		return Helper::view('agent_search');
	}

	public function agentResult()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Agent')
		{
			return Helper::redirect('/');
		}

		Helper::active('track');

		$number = $_POST['acm_tracking_number'];

		$acm_client_info = App::get('database')->packageClientDetails($number);

		$acm_tracking_info = App::get('database')->packageTrackingDetails($number);

		//if the tracking number is correct		
		if($acm_client_info)
		{	
			$_SESSION['acm_client_infos'] = $acm_client_info;

			$_SESSION['acm_tracking_infos'] = $acm_tracking_info;

			return Helper::view('agent_result');
		}
		else
		{
			$_SESSION['acm_error'] = 'track';

			if(App::get('track') == 'active')
				return Helper::redirect('track');
			
		}

		return Helper::view('agent_result');
	}

	public function admin_details()
	{
		//the user can't access the admin module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Admin')
		{
			return Helper::redirect('/');
		}

		Helper::active('dashboard');

		return Helper::view('admin_details');
	}

	public function aic_index()
	{
		//the user can't access the accounting in-charge module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Accounting In-Charge')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$_SESSION['acm_years'] = App::get('database')->getYears();

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();

		return Helper::view('accounting_index');
	}
        
    public function aic_transaction()
	{
		//the user can't access the accounting in-charge module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Accounting In-Charge')
		{
			return Helper::redirect('/');
		}

		Helper::active('transaction');

		$_SESSION['acm_all_tracking_number'] =  App::get('database')->getAllTrackingNumbers();

		return Helper::view('accounting_transaction');
	}  

	public function aicInvoiceExpenses()
	{
		//the user can't access the accounting in-charge module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Accounting In-Charge')
		{
			return Helper::redirect('/');
		}

		Helper::active('transaction');

		$_SESSION['acm_all_tracking_number'] =  App::get('database')->getAllTrackingNumbers();

		$transactionDetails = App::get('database')
			->updateInvoiceExpenses($_POST['acm_invoice'], 
									$_POST['acm_expenses'], 
									$_POST['tracking_id']);

		return Helper::view('accounting_transaction');
	}    
  
	public function aic_result()
	{
		//the user can't access the accounting in-charge module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Accounting In-Charge')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$_SESSION['acm_years'] = App::get('database')->getYears();

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();

		$_SESSION['acm_sort_by'] = $_POST['acm_sort_by'];

		$_SESSION['acm_sort_year'] = $_POST['acm_sort_year'];

		//if the sort is by year
		if($_POST['acm_sort_by'] == 'acm_by_year')
		{
			$_SESSION['prodreport'] = App::get('database')
				->getProductionReportDetails($_POST['acm_sort_by'],$_POST['acm_sort_year']);
		}
		//if the sort is by company
		elseif($_POST['acm_sort_by'] == 'acm_by_company')
		{
			$_SESSION['prodreport'] = App::get('database')
				->getProductionReportDetails($_POST['acm_sort_by'],$_POST['acm_sort_company']);
		}
	
		return Helper::view('accounting_index');
	}

	public function agent_index()
	{
		//the user can't access the agent module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Agent')
		{
			return Helper::redirect('/');
		}

		Helper::active('update');

		$_SESSION['acm_all_tracking_number'] =  App::get('database')->getAllTrackingNumbers(true);

		//gets all the province from the database
		$get_all_province = App::get('database')->selectAll('province');

		//gets all the city from the database
		$get_all_city = App::get('database')->selectAll('city');

		if(($get_all_province != null)&&($get_all_city != null))
		{
			$_SESSION['acm_province'] = $get_all_province;
			$_SESSION['acm_city'] = $get_all_city;
		}

		return Helper::view('agent');
	}

	public function branch_index()
	{
		//the user can't access the branch manager module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Branch Manager')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();	

		return Helper::view('branch_index');
	}

	public function branchWeeklyReport()
	{
		//the user can't access the branch manager module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Branch Manager')
		{
			return Helper::redirect('/');
		}
		
		Helper::active('index');

		//gets the start and end of the week
		Helper::getWeekDays();

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();

		//var_dump($_SESSION['acm_start_week']);
		//die();

		$_SESSION['acm_weekreport'] = App::get('database')
			->getWeeklyReportDetails(
					$_SESSION['acm_start_week'],$_SESSION['acm_end_week'], $_POST['acm_sort_company']);

		return Helper::view('branch_index');
	}

	public function dic_index()
	{
		//the user can't access the domestic in-charge module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Domestic In-Charge')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$_SESSION['acm_years'] = App::get('database')->getYears();

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();

		return Helper::view('domestic_index');
	}

	public function dic_result()
	{
		//the user can't access the domestic in-charge module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Domestic In-Charge')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$_SESSION['acm_years'] = App::get('database')->getYears();

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();

		$_SESSION['acm_sort_by'] = $_POST['acm_sort_by'];

		$_SESSION['acm_sort_year'] = $_POST['acm_sort_year'];

		//if the sort is by year
		if($_POST['acm_sort_by'] == 'acm_by_year')
		{
			$_SESSION['prodreport'] = App::get('database')
				->getProductionReportDetails($_POST['acm_sort_by'],$_POST['acm_sort_year']);
		}
		//if the sort is by company
		elseif($_POST['acm_sort_by'] == 'acm_by_company')
		{
			$_SESSION['prodreport'] = App::get('database')
				->getProductionReportDetails($_POST['acm_sort_by'],$_POST['acm_sort_company']);
		}

		return Helper::view('domestic_index');
	}

	public function domestic_prodreport()
	{
		//the user can't access the domestic in-charge module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Domestic In-Charge')
		{
			return Helper::redirect('/');
		}

		Helper::active('prodreport');

		return Helper::view('domestic_prodreport');
	}

	public function operations_index()
	{	
		//the user can't access the operations manager module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Operations Manager')
		{
			return Helper::redirect('/');
		}

		Helper::active('index');

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();

		return Helper::view('operations_index');
	}

	public function operations_transreport()
	{
		//the user can't access the operations manager module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Operations Manager')
		{
			return Helper::redirect('/');
		}

		Helper::active('transreport');

		return Helper::view('operations_transreport');
	}
	
	public function operationsWeeklyReport()
	{
		//the user can't access the branch manager module if doesn't have the corresponding rights
		if($_SESSION['acm_userlevel'] != 'Operations Manager')
		{
			return Helper::redirect('/');
		}
		
		Helper::active('index');

		//gets the start and end of the week
		Helper::getWeekDays();

		$_SESSION['acm_companies'] = App::get('database')->getCompanyNames();

		$_SESSION['acm_weekreport'] = App::get('database')
			->getWeeklyReportDetails(
					$_SESSION['acm_start_week'],$_SESSION['acm_end_week'], $_POST['acm_sort_company']);

		return Helper::view('operations_index');
	}

	public function viewchangepass()
	{
		Helper::active('');

		return Helper::view('changepass');
	}
	
	public function changepass()
	{
		//variable that tells if the old password is correct
		$old_pass_check = App::get('database')->checkPassword($_POST['acm_password']);

		//variable that tells whether if the new password is usable
		$password_check = App::get('database')->checkPassword($_POST['acm_newpass']);

		//if the username and old password is wrong
		if($old_pass_check == null)
		{
			$_SESSION['acm_error'] = 'old_password';
			return Helper::redirect('changepass');
		}
		//if the new password and confirm new password fields mismatch
		elseif($_POST['acm_newpass'] != $_POST['acmconnewpass'])
		{
			$_SESSION['acm_error'] = 'mismatch';
			return Helper::redirect('changepass');
		}
		//if the new password is already used
		elseif($password_check != null)
		{
			$_SESSION['acm_error'] = 'pass_exists';
			return Helper::redirect('changepass');
		}
		else
		{
			//updates the password
			$pass_result = App::get('database')->changePassword($_POST['acm_password'],$_POST['acm_newpass']);

			Helper::active('changepass');
			
			Helper::view('newpass');
		}
	}


	public function printCorporatePastTransactions()
	{
		Helper::active('');
		$_SESSION['acm_print'] = 'corpasttrans';
		return Helper::view('print/print_corporatepasttrans');
	}
	
	public function printProdreportAIC()
	{
		Helper::active('');
		$_SESSION['acm_print'] = 'prodreport_aic';
		return Helper::view('print/print_prodreport_aic');

	}

	public function printProdreportDIC()
	{
		Helper::active('');
		$_SESSION['acm_print'] = 'prodreport_dic';
		return Helper::view('print/print_prodreport_dic');
	}

	public function printWeeklyReport()
	{
		Helper::active('');
		$_SESSION['acm_print'] = 'weekly_report';
		return Helper::view('print/print_weekly_report');
	}

	public function printUserPastTransactions()
	{
		Helper::active('');
		$_SESSION['acm_print'] = 'userpasttrans';
		return Helper::view('print/print_userpasttrans');
	}
	
        //gets all the filtered provinces (MASTER ERON)
        public function agentGetProvinces()
	{
		$agentProvinces = App::get('database')->getProvinces($_POST['acm_sel_city']);

		// Helper::die(json_encode($agentProvinces));

		echo json_encode($agentProvinces);
		exit;
	}

	//inserts the updated tracking info of the package from the agent to the database
	public function agentUpdate()
	{
		Helper::active('update');

		$_SESSION['acm_tracking_number'] =  $_POST['acm_tracking_number'];

		$new_data = [
			'tracking_id' => $_POST['acm_tracking_number'],
			//'eta' => $_POST['acm_eta'],
			'dropoff_province' => $_POST['acm_dropoff_province'],
			'dropoff_city' => $_POST['acm_dropoff_city'],
			'departure_time' => $_POST['acm_dep_time'],
			'departure_delay' => $_POST['acm_dep_delay'],
			'departure_remarks' => $_POST['acm_dep_remark'],
			'arrival_time' => $_POST['acm_arr_time'],
			'arrival_delay' => $_POST['acm_arr_delay'],
			'arrival_remarks' => $_POST['acm_arr_remark'],
			'curr_province' => $_POST['acm_currloc_province'],
			'curr_city' => $_POST['acm_currloc_city']
		];

		$update_tracking_info = App::get('database')
			->insert('track_tbl', $new_data);

		//if there are no errors
		if(true)
		{

			$_SESSION['acm_update_success'] = true;
		}
		else
		{

		}
		
		return Helper::redirect('agent/index');
		
	}
	

	//clears and destroys the session then logs out
	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		return Helper::redirect('login');
	}

}