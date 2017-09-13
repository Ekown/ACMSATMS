<?php

//class for mail functions that uses the phpMailer library
class Mail
{	

	public function getServerDetails()
	{	
		$mail = new PHPMailer;
		
		//$mail->isSMTP();      

		//configures the ssl encryption 

		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);     
                
		$mail->Host = gethostbyname('smtp.gmail.com'); 
		$mail->Port = 465; 
		$mail->SMTPSecure = 'ssl'; 
		$mail->SMTPAuth = true;                               
		$mail->Username = 'tancioco.eron@gmail.com';                 
		$mail->Password = 'platinumic';                           
		
		return $mail;
	}

	//sends the email for message us function
	public function sendMessageUs()
	{
		
		//filters the inputted email if its valid
		$acm_check_email = filter_input(INPUT_POST, 'acm_message_email', FILTER_VALIDATE_EMAIL);

		//filters the message for any html tags
		$_POST['acm_message'] = filter_input(INPUT_POST, 'acm_message', 
			FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
		
		
		if($acm_check_email)
		{

			$message_mail = $this->getServerDetails();

			$message_mail->ClearReplyTos();
	    	$message_mail->addReplyTo($_POST['acm_message_email'], $_POST['acm_message_name']);
			$message_mail->setFrom('info@airlandcargomovers.com', 'ACM-SATMS');
			$message_mail->addAddress('tancioco.eron@yahoo.com', 'ACM Customer Support');
			$message_mail->Subject  = 'Customer Response from ' . $_POST['acm_message_name'];
			$message_mail->Body     = $_POST['acm_message'];

			if(!$message_mail->send()) 
			{
			  return null;
			} 
			else 
			{
			  return 'Message has been sent.';
			}
		}
		else
		{
			return null;
		}	
	}

	//sends a reset mail for forgot password function
	public function sendResetMail()
	{
		//filters the inputted email if its valid
		$acm_check_email = filter_input(INPUT_POST, 'acm_forgot_email', FILTER_VALIDATE_EMAIL);

		if($acm_check_email)
		{
			$reset_mail = $this->getServerDetails();

			$reset_mail->ClearReplyTos();
			$reset_mail->setFrom('info@airlandcargomovers.com', 'ACM');
			$reset_mail->addAddress($_POST['acm_forgot_email']);
			$reset_mail->Subject  = "Password Reset";
			$reset_mail->Body     = "This is a password reset email. \n\nPlease follow this link to reset your password: http://".$_SERVER['HTTP_HOST']."/forgot-password/".$_SESSION['acm_shuffle_url'];

			if(!$reset_mail->send()) 
			{
			  return null;
			} 
			else 
			{
			  return 'Message has been sent.';
			}
		}
		else
		{
			return null;
		}
	}

        public function sendVerifyMail()
	{
		$verifyMail = $this->getServerDetails();

		$verifyMail->ClearReplyTos();
		$verifyMail->setFrom('info@airlandcargomovers.com', 'ACM');
		$verifyMail->addAddress($_SESSION['acm_create_account']['email']);
		$verifyMail->Subject  = "Account Verification";
		$verifyMail->Body     = "Welcome to ACM-SATMS!\n\n
		Your account details are as follows:\nUsername: ".$_SESSION['acm_create_account']['user_name']."\nPassword: ".$_SESSION['acm_create_account']['password']."\nPlease follow this link to activate your account: http://".$_SERVER['HTTP_HOST']."/activate-account/".$_SESSION['acm_shuffle_url'];

		if(!$verifyMail->send()) 
		{
		  return null;
		} 
		else 
		{
		  return 'Message has been sent.';
		}
	}

}