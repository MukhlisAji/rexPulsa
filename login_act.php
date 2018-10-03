<?php
	session_start();
	include('koneksi.php');

	//print $dir =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']. '/cre.php';

	function makePassword($password, $salt)
  	{
    	return hash('sha256', $password.$salt);
	}

	function salt($length)
	{
    	return mcrypt_create_iv($length);
	}

	if (isset($_POST['login']) && isset($_SERVER['HTTP_REFERER']))
	{
		$username = mysqli_real_escape_string($con, strip_tags($_POST['user']));
		$password = mysqli_real_escape_string($con, strip_tags($_POST['pass']));


		$query		= mysqli_query($con, "SELECT * FROM userlogin WHERE  username='$username'");
		$row		= mysqli_fetch_array($query);
		$num_row 	= mysqli_num_rows($query);



		$salt = $row['salt'];
		$newPassword = makePassword($password, $salt);
		
		//$query 		= mysqli_query($con, "SELECT * FROM userlogin WHERE  password='$newPassword' and username='$username'");
		//$row		= mysqli_fetch_array($query);
		//$num_row 	= mysqli_num_rows($query);
		
			if ($num_row > 0 && $row['password'] == $newPassword) 
			{	

				if($row['active'] == "yes")
				{
					$_SESSION['username'] = $row['username'];
					$_SESSION['user_id']  = $row['user_id'];

					$result = array('status' => 'OK','message' => '<div class="form-group has-feedback has-feedback-left">
											<div class="alert alert-success">
	  											<strong> Hello '.$row["name"].' !</strong> Welcome back to Rexa Pulsa 
											</div>

										</div>');

					$result = json_encode($result);

					print $result;
				}else
				{
					$result = array('status' => 'VERIFY','message' => '<div class="form-group has-feedback has-feedback-left">
						<div class="alert alert-warning">
								<strong> Hello '.$row["name"].' !</strong> Please check your Email <br>( Inbox / Spam ) to verify your account. 
						</div>

					</div>');

					$result = json_encode($result);

					print $result;
				}

				
			}
			else
			{
				//header('location:cre.php?error=1');
				$result = array('status' => 'NO','message' => '<div class="form-group has-feedback has-feedback-left">
										<div class="alert alert-danger">
  											<strong>Oh sorry !</strong> Please Check Your Credentials 
										</div>

									</div>');

				$result = json_encode($result);

				print $result;
			}
	}else
	{
		print "idiot cunt";
	}
  ?>