<?php

//all functions for the user
class User
{
	public static function getUserLevel($user)
	{
		switch ($user[0]->userlevel) 
		{
			case '1':
				return 'Admin';
				break;		
			case '2':
				return 'Branch Manager';
				break;
			case '3':
				return 'Operations Manager';
				break;
			case '4':
				return 'Accountant-in-Charge';
				break;
			case '5':
				return 'Agent';
				break;
		
		}
	}
	
}