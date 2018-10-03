


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


	session_start();
	include('koneksi.php');

	//print $dir =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']. '/cre.php';
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


  	function makePassword($password, $salt)
  	{
    	return hash('sha256', $password.$salt);
	}

	function salt($length)
	{
    	return mcrypt_create_iv($length);
	}


	function sendActivation($to,$name,$verificationCode,$username)
	{

	// Subject
	$subject = '[RexaPulsa] Your Registration almost done';


	$verificationLink = "https://pulsa.rexaflux.com/activation.php?code=" . $verificationCode."&u=".$username;

    $htmlStr = "";
    $htmlStr .= "Hi ".$name." [ " . $to . " ] ,<br /><br />";


    $htmlStr .= "Your username : ".$username."<br />";
    $htmlStr .= "Please click the button below to verify your Registration and have access to the dashboard.<br /><br /><br />";
    $htmlStr .= "<a href='{$verificationLink}' style='padding:1em; font-weight:bold; background-color:green; color:#fff; text-decoration: none !important;'>VERIFY EMAIL</a><br /><br /><br />";

    $htmlStr .= "Kind regards,<br />";
    $htmlStr .= "<a href='https://pulsa.rexaflux.com/' target='_blank'>Rexa Pulsa</a><br />";

	// Message
	$message = '
	<html>
	<head>
	  <title>Your Registration almost done</title>
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


	if (isset($_POST['register']) && isset($_SERVER['HTTP_REFERER']) && $_POST['checkbox'] == "on")
	{
	

		$username = mysqli_real_escape_string($con, strip_tags($_POST['username']));
		$password = mysqli_real_escape_string($con, strip_tags($_POST['password']));

		$email 	  = mysqli_real_escape_string($con, strip_tags($_POST['email']));
		$name     = mysqli_real_escape_string($con, strip_tags($_POST['name']));

		$emailStatus = "";

		if (strpos($email, '+') !== false)
		{
			$emailStatus = "blocked";
		}

		if(strlen($username) < 6)
		{
			$randx = rand(33334,99999);
			$username = $username.$randx;
		}

		if(strlen($name) < 4)
		{
			
			$name = $name." Rexa";
		}



		//====================== Check username

		//$sql = "SELECT * FROM userlogin WHERE username='$username'";
		//$result = mysqli_query($con, $sql);
		//if (mysqli_num_rows($result) == 0) 
			//{


				//$activation = base64_encode(md5($username));
				$uuid 			= generateUUID(true);

				$salt 			= salt(32);
				$newPassword 	= makePassword($password, $salt);

				//$newActivation = $activation."+".$uuid;

				if($emailStatus == "")
				{
				
					$query 		= mysqli_query($con, "INSERT INTO userlogin VALUES (null,'$username','$name','$newPassword','$salt','$email','0','no','$uuid')");

				
					if($query) 
					{

						@sendActivation($email,$name,$uuid,$username);

						$len  = strlen($password) - 4;
						$sub = substr($password, 0,$len);
						
						$result = array('status' => 'OK','message' => '<div class="form-group has-feedback has-feedback-left">
												<div class="alert alert-success">										
		  											<div class="content-divider text-muted form-group"><span>Your Detail</span></div>
		  											<center>
		  											Username : '.$username.'<br>
		  											Password : '.$sub.'****<br>
		  											Email 	 : '.$email.'<br>
		  											</center>

											</div>

											</div>','headerText' => '<h5 class="content-group"> Hello '.$name.' !<small class="display-block" style="letter-spacing: 1px;"> Your Registration is almost done.<br>
		  											Please check your email to <b>verify</b> it.</small></h5>');


						//Create new account All fields are required

						$result = json_encode($result);

						print $result;

			
					}
					else
					{

						preg_match('/Duplicate entry \'(.*?)\' for key \'(.*?)\'/', mysqli_error($con), $matches);

						$matches = ucfirst($matches[2]);
						
						$result = array('status' => 'NO','message' => '<div class="form-group has-feedback has-feedback-left">
												<div class="alert alert-danger">
		  											<strong>Oh sorry !</strong> '.$matches.' Already taken my broo ~  
												</div>

											</div>');

						$result = json_encode($result);

						print $result;
					}

				}else{
						$result = array('status' => 'NO','message' => '<div class="form-group has-feedback has-feedback-left">
												<div class="alert alert-danger">
		  											<strong>Oh sorry !</strong> Your Email detected as extracted mail <br>or Already taken my broo ~  
												</div>

											</div>');

						$result = json_encode($result);

						print $result;
				}



	}else{
		print "idiot cunt";
	}
	

?>