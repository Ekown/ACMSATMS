<?php

class Helper
{
	//dumps data and then dies
	static public function dd($data)
	{
		die(var_dump($data));
	}

	//returns the specified view
	static public function view($name, $data = [])
	{
		//turns the data object into variables
		extract($data);

		return require "app/views/{$name}.view.php";
	}	

	//redirects the user to the specified path
	static public function redirect($path)
	{
		header("Location: /{$path}");
		exit();
	}

	//dynamically changes the active header for the nav
	public static function active($active)
	{
		$nav = [
				'home', 
				'about', 
				'contact',
				'corpcontact',  //6/2
				'track',
				'login',
				'check',
				'result',
				'avail',
				'corporate_avail',
				'index',
				'search',
				'update',
				'changepass',
				'prodreport',
				'pasttransactions',
				'corp_track',
				'user_track',
				'user_avail',
				'userpasttransactions',
                'transaction',
				'transreport' 
				];

		compact($nav);

		foreach ($nav as $header) 
		{
			App::bind($header, ' ');
		}

		App::bind($active, 'active');
	}

	//returns the client info from the session superglobal
	public function showClientInfo($object_name)
	{
		return $_SESSION['acm_client_infos'][0]->{$object_name};
	}

	//returns the tracking info from the session superglobal
	public function showTrackingInfo($row_number, $object_name)
	{
		//prevent an error notice that the variable is trying to access a null value
		if(isset($_SESSION['acm_tracking_infos'][$row_number]->{$object_name}))
			return $_SESSION['acm_tracking_infos'][$row_number]->{$object_name};
		else
			return null;
	}
	
	public function showCorpPast($row_number, $object_name)
	{
		if($_SESSION['acm_corporate_infos'] != NULL)
		return $_SESSION['acm_corporate_infos'][$row_number]->{$object_name};
		else
			echo "No Past Transaction/s Existing";
	}
	

	public function getWeekDays()
	{
		//check the current day
		if(date('D')!='Mon')
		{    
			//take the last monday
			$_SESSION['acm_start_week'] = date('Y-m-d',strtotime('last Monday'));    

		}
		else
		{
		   $_SESSION['acm_start_week'] = date('Y-m-d');   
		}

		//always next saturday
		if(date('D')!='Sat')
		{
		    $_SESSION['acm_end_week'] = date('Y-m-d',strtotime('next Saturday'));
		}
		else
		{

		    $_SESSION['acm_end_week'] = date('Y-m-d');
		}
	}

}