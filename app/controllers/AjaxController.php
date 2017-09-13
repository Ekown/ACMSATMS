<?php

class AjaxController
{
	public function checkEmails()
	{
		$check_email = App::get('database')->checkEmail($_POST['emailData']);

		if($check_email != null)
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
	}

	public function checkCompanyName()
	{
		$checkCompanyName = App::get('database')->checkCompany($_POST['compName']);

		if($checkCompanyName != null)
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
	}

public function checkUsername()
	{
		$check_username = App::get('database')
			->checkUsername($_POST['user']);

		if($check_username != null)
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
	}

	public function checkPassword()
	{
		$check_password = App::get('database')
		 	->checkPassword($_POST['acm_avail_password']);

		if($check_password != null)
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
	}

	public function checkOldPassword() //master eron (6/23)
	{
		$check_password = App::get('database')
		 	->checkPassword($_POST['acm_avail_password']);

		if($check_password != null)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}
}