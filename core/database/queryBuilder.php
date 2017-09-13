<?php

class QueryBuilder
{
	protected $pdo;

	function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}

        public function activateAccount($email)
	{
		try
		{
			$statement = $this->pdo
				->prepare("UPDATE user_info SET activated = 1 WHERE  email ='{$email}'");

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}

	public function checkStatus($username, $password)
	{
		try
		{
			$statement = $this->pdo->prepare(
				"SELECT ui.activated
				FROM user_info as ui
				WHERE ui.user_name = '{$username}' and 
				ui.password = '{$password}'"
				);

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function deleteUser($user)
	{
		try
		{
			$statement = $this->pdo
				->prepare("delete from user_info where user_info.user_name = '{$user}'");

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}

	//gets all available tracking numbers
	public function getAllTrackingNumbers($filtered = false)
	{
		try
		{	
			//if the tracking numbers should be filtered
			if($filtered)
			{
				$str = "select tracking_id from client_package where package_status != 'Delivered'";
			}
			else
			{
				$str = "select tracking_id from package_info";
			}

			$statement = $this->pdo->prepare($str);

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	//gets the provinces of a selected city 
	public function getProvinces($city)
	{
		try
		{	
			$statement = $this->pdo->prepare("select distinct city.city_name from city join province on city.province_id = province.province_id where province.province_name = '{$city}'");

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function getTrackingNumber($client_no) //6/2
	{
		try
		{
			$statement = $this->pdo->prepare( "SELECT tracking_id FROM client_package WHERE client_no = '{$client_no}' ");

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	//selects all records from a table
	public function selectAll($table)
	{ 	
		try
		{
			$statement = $this->pdo->prepare("select * from {$table}");

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	//inserts values to a table with the given parameters
	public function insert($table, $parameters)
	{
		$statement = sprintf(
				'insert into %s (%s) values (%s)',
				$table,
				implode(', ', array_keys($parameters)),
				':'.implode(', :', array_keys($parameters))
			);

		try
		{
			$statement = $this->pdo->prepare($statement);


			$statement->execute($parameters);
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}

	//checks the database for the matching user from the request
	public function login($username, $password)
	{
		try
		{
			$statement = $this->pdo->prepare(
				"SELECT ui.user_name, ui.password, u.user_level, ui.activated
				FROM user_info as ui
				JOIN user as u ON ui.user_id=u.user_id
				WHERE ui.user_name = '{$username}' and 
				ui.password = '{$password}'  and ui.activated = 1 "
				);

			$statement->execute();		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	//checks if the given company name and address is already existing
	public function checkCompany($cname)
	{
		try
		{
			$statement = $this->pdo->prepare("select user_info.company_name, user_info.company_address
												from user_info
												where user_info.company_name = '{$cname}'
											");

			$statement->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function checkEmail($email)
	{
		try
		{
			$statement = $this->pdo->prepare("select email
												from user_info
												where email = '{$email}'
											");

			$statement->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	//checks if the password is valid
	public function checkPassword($password)
	{
		try
		{
			$statement = $this->pdo->prepare("SELECT ua.password 
				FROM  user_info as ua
				WHERE ua.password = '{$password}' 
				");

			$statement->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);	
	}

	//checks if the names given by the user is already existing in the database
	public function checkNames($fname, $lname)
	{
		try
		{
			$statement = $this->pdo->prepare("select user_info.first_name, user_info.last_name
					from user_info
					where user_info.first_name = '{$fname}' and user_info.last_name = '{$lname}'");

			$statement->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	//checks if the given username is already taken
	public function checkUsername($username)
	{
		try
		{
			$statement = $this->pdo->prepare("select user_info.user_name
										from user_info
										where user_info.user_name = '{$username}'
									");

			$statement->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	//updates the database and changes the password
	public function changePassword($old_password,$new_password)
	{
		try
		{
			$statement = $this->pdo->prepare("UPDATE `user_info` 
				SET `password`='{$new_password}' 
				WHERE `password`='{$old_password}' 
				");

			$statement->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}



	//gets the package's client details from the database
	public function packageClientDetails($tracking_number)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT user_info.company_name, client_package.tracking_id, user_info.contact_no, transaction_info.waybill_no,
				package_info.origin, package_info.destination, package_info.eta, package_info.item_name, transaction_info.trans_datetime,
				package_type.package_types, package_info.weight, transaction_info.transaction_type,	package_info.net_profit
				FROM user_info
				JOIN client_info ON user_info.user_name = client_info.user_name
				JOIN client_package ON client_info.client_no = client_package.client_no
				JOIN transaction_info ON client_package.tracking_id = transaction_info.tracking_id
				JOIN package_info ON transaction_info.tracking_id = package_info.tracking_id
				JOIN package_type ON package_info.package_id = package_type.package_id
				WHERE client_package.tracking_id = {$tracking_number}");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function packageCorporateDetails($tracking_number, $username, $password)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT user_info.company_name, client_package.tracking_id, user_info.contact_no, transaction_info.waybill_no,
				package_info.origin, package_info.destination, package_info.eta, package_info.item_name, transaction_info.trans_datetime,
				package_type.package_types, package_info.weight, transaction_info.transaction_type,	package_info.net_profit
				FROM user_info
				JOIN client_info ON user_info.user_name = client_info.user_name
				JOIN client_package ON client_info.client_no = client_package.client_no
				JOIN transaction_info ON client_package.tracking_id = transaction_info.tracking_id
				JOIN package_info ON transaction_info.tracking_id = package_info.tracking_id
				JOIN package_type ON package_info.package_id = package_type.package_id
				WHERE client_package.tracking_id = '{$tracking_number}' and user_info.user_name = '{$username}' and user_info.password = '{$password}'");

			$statement->execute();


		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}
	
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function test($tracking_number, $username, $password)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT user_info.company_name
				FROM user_info
				JOIN client_info ON user_info.user_name = client_info.user_name
				JOIN client_package ON client_info.client_no = client_package.client_no

				WHERE client_package.tracking_id = '{$tracking_number}' and user_info.user_name = '{$username}' and user_info.password = '{$password}'");

			$statement->execute();


		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	

	public function packageClientDetailsPastTransac($username, $password)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT transaction_info.trans_datetime, package_info.item_name, user_info.company_name, user_info.email,
			user_info.contact_no, transaction_info.transaction_type, package_type.package_types,
			package_info.quantity FROM transaction_info JOIN package_info ON transaction_info.tracking_id = 
			package_info.tracking_id JOIN package_type ON package_info.package_id = package_type.package_id
			JOIN client_package ON package_info.tracking_id = client_package.tracking_id 
			JOIN client_info ON client_package.client_no = client_info.client_no
			JOIN user_info ON client_info.user_name = user_info.user_name
		    WHERE user_info.user_name = '{$username}' and user_info.password = '{$password}'");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function InsertAvail($tracking_no, $item_name, $quan, $weig, $origin, $destination, $receiver, $address, $contact, $company, $package)
	{
		try 
		{
			$statement = $this->pdo->prepare("INSERT INTO package_info (`tracking_id`, `item_name`, `quantity`, `weight`, `origin`, 											`destination`, `receiver_name`, `receiver_address`, `contact_no`, 														`receiver_comp`, `package_id`) 
											  VALUES ('{$tracking_no}', '{$item_name}', '{$quan}', '{$weig}', '{$origin}', '{$destination}', '{$receiver}', '{$address}', '{$contact}', '{$company}', '{$package}')");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

	}
	
	public function Inserttt($tracking_no, $client_no)
	{
		try 
		{
			$statement = $this->pdo->prepare("INSERT INTO client_package (`tracking_id`, `client_no`) VALUES ('{$tracking_no}', '{$client_no}')");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

	}

	public function InsertBillNo($tracking_no, $waybill_no, $airland_waybill_no, $trans_type)
	{
		try 
		{
			$statement = $this->pdo->prepare("INSERT INTO transaction_info (`tracking_id`, `waybill_no`, `airland_waybill`, `transaction_type`) VALUES ('{$tracking_no}', '{$waybill_no}', '{$airland_waybill_no}', '{$trans_type}')");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

	}


	public function ClientInsert($client_no, $username)
	{
		try 
		{
			$statement = $this->pdo->prepare("INSERT INTO client_info (`client_no`, `user_name`) VALUES ('{$client_no}', '{$username}')");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

	}

	public function GetMaxClientNumber($table)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT MAX({$table}.client_no) FROM {$table}");
			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

			
			return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function GetPackageID($package_type)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT package_type.package_id FROM package_type
								WHERE package_type.package_types = '{$package_type}'");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function GetClientNumber($username, $password, $table)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT client_info.client_no FROM {$table}
			JOIN user_info ON client_info.user_name = user_info.user_name
			WHERE user_info.user_name = '{$username}' and user_info.password = '{$password}'");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	
	//gets the package's tracking details from the database
	public function packageTrackingDetails($tracking_number)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT *
				FROM track_tbl
				WHERE tracking_id = {$tracking_number}");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function packageCorporateTrackingDetails($tracking_number, $username, $password)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT *
				FROM track_tbl JOIN client_package
				ON track_tbl.tracking_id = client_package.tracking_id
				JOIN client_info ON client_package.client_no = client_info.client_no
				JOIN user_info ON client_info.user_name = user_info.user_name
				WHERE track_tbl.tracking_id = '{$tracking_number}' and user_info.user_name = '{$username}' and user_info.password = '{$password}'");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function resetPassword($new_password, $email)
	{
		try 
		{
			$statement = $this->pdo->prepare("UPDATE user_info
					SET password = '{$new_password}'
					WHERE email = '{$email}' ");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

	}
	
	public function GetMaxTrackingNumber($table)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT MAX({$table}.tracking_id) FROM {$table}");
			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

			
			return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function GetMaxWaybillNumber($table)
		{
			try 
			{
				$statement = $this->pdo->prepare("SELECT MAX({$table}.waybill_no) FROM {$table}");
				$statement->execute();
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}

				
				return $statement->fetchAll(PDO::FETCH_OBJ);
		}

	public function GetMaxAirlandWaybillNumber($table)
		{
			try 
			{
				$statement = $this->pdo->prepare("SELECT MAX({$table}.airland_waybill) FROM {$table}");
				$statement->execute();
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}

				
				return $statement->fetchAll(PDO::FETCH_OBJ);
		}


	public function getProductionReportDetails($sort, $something)
	{
		try 
		{
			if($sort == 'acm_by_year')
			{
				$statement = $this->pdo->prepare("SELECT transaction_info.trans_datetime,client_package.client_no, user_info.company_name, package_info.date_received,
					package_type.package_types, package_info.invoice_val, package_info.expenses, package_info.net_profit
					FROM user_info JOIN client_info ON user_info.user_name  = client_info.user_name 
					JOIN client_package ON client_info.client_no  = client_package.client_no 
					JOIN package_info ON client_package.tracking_id = package_info.tracking_id 
					JOIN package_type ON package_info.package_id = package_type.package_id
					JOIN transaction_info ON package_info.tracking_id = transaction_info.tracking_id 
					WHERE transaction_info.trans_datetime >= '{$something}-1-1 00:00:00'
  						AND transaction_info.trans_datetime < '{$something}-12-31 00:00:00'" );
			}
			else
			{
				$statement = $this->pdo->prepare("SELECT transaction_info.trans_datetime,client_package.client_no, user_info.company_name, package_info.date_received,
					package_type.package_types, package_info.invoice_val, package_info.expenses, package_info.net_profit
					FROM user_info JOIN client_info ON user_info.user_name  = client_info.user_name 
					JOIN client_package ON client_info.client_no  = client_package.client_no 
					JOIN package_info ON client_package.tracking_id = package_info.tracking_id 
					JOIN package_type ON package_info.package_id = package_type.package_id
					JOIN transaction_info ON package_info.tracking_id = transaction_info.tracking_id 
					WHERE user_info.company_name = '{$something}'" );
			}

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function getWeeklyReportDetails($start, $end, $company)
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT client_package.tracking_id, user_info.company_name, transaction_info.airland_waybill, package_info.receiver_comp,
				package_info.destination, client_package.pickup_datetime, transaction_info.waybill_no, package_info.date_received,
				package_info.receiver_name, transaction_info.trans_datetime, client_package.package_status
				FROM client_package 
				JOIN transaction_info ON client_package.tracking_id = transaction_info.tracking_id 
				JOIN package_info ON transaction_info.tracking_id = package_info.tracking_id 
				JOIN client_info ON client_package.client_no = client_info.client_no
				JOIN user_info ON client_info.user_name = user_info.user_name 
				WHERE transaction_info.trans_datetime >= '{$start}' AND transaction_info.trans_datetime <= '{$end}'
				AND user_info.company_name = '{$company}' ");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function getYears()
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT * from year");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function getCompanyNames()
	{
		try 
		{
			$statement = $this->pdo->prepare("SELECT company_name 
				from user_info where company_name != 'null'");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function updateInvoiceExpenses($invoice, $expenses, $tracking_number)
	{
		$profit = $invoice - $expenses;
     
		if($profit < 0)
                  {
			$profit = 0;
                  }
else {
		try 
		{
			$statement = $this->pdo->prepare("update package_info set invoice_val = '{$invoice}'
					where tracking_id = {$tracking_number};");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		try 
		{
			$statement = $this->pdo->prepare("update package_info set expenses = '{$expenses}'
					where tracking_id = {$tracking_number};");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

		try 
		{
			$statement = $this->pdo
				->prepare("update package_info set net_profit = '{$profit}'
					where tracking_id = {$tracking_number};");

			$statement->execute();
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}

	}
 }	
}