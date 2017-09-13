<?php



class LoginController

{

	public function authenticate()

	{	 

		

		if($_SESSION['acm_authorized'] == false)

		{



			//gets the login details from the session variables

			$_SESSION['acm_username'] = $_POST['acm_username'];

			$_SESSION['acm_pass'] = $_POST['acm_pass'];



			//performs the login operation with the database

			$user = App::get('database')->login($_POST['acm_username'],$_POST['acm_pass']);



			//if the login details are incorrect af

	 		if($user == null)

			{

				$checkStatus = App::get('database')->checkStatus($_POST['acm_username'],$_POST['acm_pass']);

				if($checkStatus)
				{
					$_SESSION['acm_error'] = 'deactivated_account';

					$_SESSION['acm_username'] = '';

					$_SESSION['acm_pass'] = '';
				}
				else
				{
					/* overwrites the error for user to true

					and clears the username and password variable */

					$_SESSION['acm_error'] = 'login';

					$_SESSION['acm_username'] = '';

					$_SESSION['acm_pass'] = '';

				}

	

				return Helper::redirect('login');

			}

		}	



		//gets the userlevel of the logged-in user

		$_SESSION['acm_userlevel'] = $user[0]->user_level;



		//sets the auth variable into true

		$_SESSION['acm_authorized'] = true;



		switch ($user[0]->user_level) 

		{

			case 'Admin':

				return Helper::redirect('administrator/index');

				break;



			case 'Accounting In-Charge':

				return Helper::redirect('accounting-in-charge/index');

				break;



			case 'Branch Manager':

				return Helper::redirect('branch-manager/index');

				break;



			case 'Domestic In-Charge':

				return Helper::redirect('domestic-in-charge/index');

				break;



			case 'Operations Manager':

				return Helper::redirect('operations-manager/index');

				break;



			case 'Agent':

				return Helper::redirect('agent/index');

				break;



			case 'Corporate':

				return Helper::redirect('corporate/track');

				break;



			case 'User':

				return Helper::redirect('user/track');

				break;		



		}

					

	}

}