<?php
	//connects to the database
	class Connection
	{
		public static function make($config)
		{
			//tries to execute the code inside
			try
			{
				//connects the defined database type, host, name, username and password using PDO
				return new PDO(
					$config['connection'].';dbname='.$config['name'],
					$config['username'],
					$config['password'],
					$config['options']
				);
			}
			//catches any thrown exception by the code
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
		}
	
	}

