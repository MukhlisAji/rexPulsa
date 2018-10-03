<!DOCTYPE html>
<html>
<head>
	<title>Recover Page | Rexa Pulsa</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">

	<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var end =setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                window.location = "./cre.php";
                clearInterval(end);
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 15,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>
</head>
<body>
<br><br>
<center><h2> Recover Page | Rexa Pulsa</h2></center>
<br>
<div class="container">  
  <div class="row">
  	<div class="col-lg-3"></div>
    <div class="col-lg-6">

<?php


	error_reporting(false);
	include('koneksi.php');

	function makePassword($password, $salt)
  	{
    	return hash('sha256', $password.$salt);
	}

	function salt($length)
	{
    	return mcrypt_create_iv($length);
	}

	function generateRandomString($length = 7){
	    $characters = 'abcdefghijklmnopqrstuvwxyz1234567890';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}


	if(isset($_GET['code']) && isset($_GET['u']))
	{
		$username = mysqli_real_escape_string($con, strip_tags($_GET['u']));
		$code 	  = $_GET['code'];

		$query		= mysqli_query($con, "SELECT * FROM userlogin WHERE  username='$username'");
		$row		= mysqli_fetch_array($query);
		$num_row 	= mysqli_num_rows($query);

		//print $query;

		if ($query && $num_row > 0 && $row['activation_code'] == $code) 
		{

			$password 		= "RX".generateRandomString();

			$salt 			= salt(32);
			$newPassword 	= makePassword($password, $salt);

			$sql = "UPDATE userlogin SET password='$newPassword' , salt='$salt', activation_code='' WHERE username='$username' AND activation_code='$code'";
 
				if (mysqli_query($con, $sql))
				{
					print '<div class="form-group has-feedback has-feedback-left">
									<div class="alert alert-success">
											<strong> Hello '.$row["name"].' !</strong> Your Recover is completed.<br>
											Your New Password : <b>'.$password.'</b><br>
											If you want to change the password just going to dashboard menu. <br>
											This page Will redirect to login page in <span id="time">00:15</span> .
									</div>

								</div>';
					//header( "Refresh:7; url=./cre.php", true, 303);

				}else
				{					print '<div class="form-group has-feedback has-feedback-left">
									<div class="alert alert-warning">
											<strong> Hello '.$row["name"].' !</strong> We failed to verify your account <br>'.mysqli_error($con).'

											Please contact us at admin@pulsa.rexaflux.com .
									</div>

								</div>';

				}


		}else
		{
			print '<div class="form-group has-feedback has-feedback-left">
									<div class="alert alert-danger">
											<strong>Oh sorry !</strong> Your Recover link isn\'t corrects.
									</div>

								</div>';
		}

	}else
	{
						print '<div class="form-group has-feedback has-feedback-left">
									<div class="alert alert-danger">
											<strong>Oh sorry !</strong> Your Recover link isn\'t corrects.
									</div>

								</div>';
	}




?>

		</div>
		<div class="col-lg-3"></div>
	</div>
</div>


</body>
</html>