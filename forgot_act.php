<?php

	/*
		All Codes are written by RexaPulsa team
		Thanks To Boostrap , StackOverflow , Google , Our Laptop

		Shout out : 
		Ripto Sudiyarno as Front end & Back end Developer And Security Tester
		Raka Putra Wicaksana as Developer Back End And Security Tester
		Mukhlis Purnomo Aji as Database Administrator


		2017 We Present this Apps For Ppl that we loved Hehe ~




	*/


	
	include('koneksi.php');

	if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_SERVER['HTTP_REFERER']))
	{

		$email 	  = mysqli_real_escape_string($con, strip_tags($_POST['email']));
		$secret   = "6LeEkTwUAAAAAFdf4_JNzVki3umbbbXexmaWF0Oj";
		$response = $_POST["captcha"];


		$verify	  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
		$captcha_success = json_decode($verify);
		
		if($captcha_success->success==false)
		{
			
			$result = array('status' => 'NO','message' => '<div class="form-group has-feedback has-feedback-left">
									<div class="alert alert-danger">
											<strong>Oh sorry !</strong> You Forget something bro  ~  
									</div>

								</div>');

			$result = json_encode($result);

			print $result;
			


		}elseif($captcha_success->success==true)
		{			
			$query 		= mysqli_query($con, "SELECT * FROM userlogin WHERE email='$email'");
  			$row		= mysqli_fetch_array($query);
  			$number 	= mysqli_num_rows($query);



			$username 	= $row["username"]; 
			$name 		= $row["name"]; 
			$uuid 		= generateUUID(true);


			if ($number > 0) 
			{
				$queryX 	= mysqli_query($con, "UPDATE userlogin SET activation_code='$uuid' WHERE username='$username'");
				if($queryX)
				{
					$result = array("status" => "OK","username" => $username,"name" => $name,"uuid" => $uuid);
				}else
				{
					$result = array("status" => "NO","message" => "Gagal Update bro".mysqli_error($con));
				}
			}else
			{
				$result = array("status" => "NO","message" => $email." not Registered.");
			}



			if($result["status"] == "OK")
			{

				$username 	= $result["username"];
				$name 		= $result["name"];
				$uuid 		= $result["uuid"];

				@sendActivation($email,$name,$uuid,$username);
						
				$result = array('status' => 'OK','message' => '<div class="form-group has-feedback has-feedback-left">
										<div class="alert alert-success">										
												<div class="content-divider text-muted form-group"><span>Result</span></div>
												<small>We already sent to you an email to recover your password <br>
												Please check your Inbox or Spam.</small>

					
												

									</div>

									</div>','headerText' => '<h5 class="content-group"> Hello '.$name.' !<small class="display-block" style="letter-spacing: 1px;"> Your Registration is almost done.<br>
												Please check your email to <b>verify</b> it.</small></h5>');


				//Create new account All fields are required

				$result = json_encode($result);

				print $result;
			}else
			{
					$result = array('status' => 'NO','message' => '<div class="form-group has-feedback has-feedback-left">
											<div class="alert alert-danger">
													<strong>Oh sorry !</strong> '.$result["message"].' 
											</div>

										</div>');

					$result = json_encode($result);

					print $result;	

			}

			


		}
	}else
	{
			$result = array('status' => 'NO','message' => '<div class="form-group has-feedback has-feedback-left">
									<div class="alert alert-danger">
											<strong>Oh sorry !</strong> You Forget something bro  ~  
									</div>

								</div>');

			$result = json_encode($result);

			print $result;		
	}

	function sendActivation($to,$name,$verificationCode,$username)
	{

	// Subject
	$subject = '[RexaPulsa] Recover Your password Right now ';


	$verificationLink = "https://pulsa.rexaflux.com/recover.php?code=" . $verificationCode."&u=".$username;

    $htmlStr = "";
    $htmlStr .= "Hi ".$name." [ " . $to . " ] ,<br /><br />";


    $htmlStr .= "Your username : ".$username."<br />";
    $htmlStr .= "Please click the button below to recover your password.<br /><br /><br />";
    $htmlStr .= "<a href='{$verificationLink}' style='padding:1em; font-weight:bold; background-color:blue; color:#fff; text-decoration: none !important;'>RECOVER PASSWORD</a><br><br><br>";

    $htmlStr .= "Kind regards,<br />";
    $htmlStr .= "<a href='https://pulsa.rexaflux.com/' target='_blank'>Rexa Pulsa</a><br />";

	// Message
	$message = '
	<html>
	<head>
	  <title>Recover Password</title>
	</head>
	<body>
	'.$htmlStr.'
	</body>
	</html>
	';

	// To send HTML mail, the Content-type header must be set
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

	// Additional headers
	$headers[] = 'To: '.$name.' <'.$to.'>';
	$headers[] = 'From: RexaPulsa <support@rexaflux.com>';
	//$headers[] = 'Cc: birthdayarchive@example.com';
	//$headers[] = 'Bcc: birthdaycheck@example.com';

	// Mail it
	mail($to, $subject, $message, implode("\r\n", $headers));

	}

	function generateUUID($type)
  	{
	    $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	      mt_rand(0, 0xffff), mt_rand(0, 0xffff),
	      mt_rand(0, 0xffff),
	      mt_rand(0, 0x0fff) | 0x4000,
	      mt_rand(0, 0x3fff) | 0x8000,
	      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
	    );
	    return $type ? $uuid : str_replace('-', '', $uuid);
  	}




   



?>