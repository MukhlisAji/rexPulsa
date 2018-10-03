<!DOCTYPE html>
<html>
<head>
	<title>Activation Page | Rexa Pulsa</title>
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
        var fiveMinutes = 7,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>
</head>
<body>
<br><br>
<center><h2> Activation Page | Rexa Pulsa </h2></center>
<br>
<div class="container">  
  <div class="row">
  	<div class="col-lg-3"></div>
    <div class="col-lg-6">

<?php


	error_reporting(false);
	include('koneksi.php');


	//if(isset($_SERVER['HTTP_REFERER']))
	//{
		if(isset($_GET['code']) && isset($_GET['u']))
		{
			$username = mysqli_real_escape_string($con, strip_tags($_GET['u']));
			$code 	  = $_GET['code'];

			$query		= mysqli_query($con, "SELECT * FROM userlogin WHERE  username='$username' AND active='no'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);

			//print $query;

			if ($query && $num_row > 0 && $row['activation_code'] == $code) 
			{

				$sql = "UPDATE userlogin SET active='yes' WHERE username='$username'";
	 
					if (mysqli_query($con, $sql))
					{
						print '<div class="form-group has-feedback has-feedback-left">
										<div class="alert alert-success">
  											<strong> Hello '.$row["name"].' !</strong> Your Registration is completed.<br>
  											This page Will redirect to login page in <span id="time">00:07</span> .
										</div>

									</div>';
						//header( "Refresh:7; url=./cre.php", true, 303);

					}else
					{					print '<div class="form-group has-feedback has-feedback-left">
										<div class="alert alert-warning">
  											<strong> Hello '.$row["name"].' !</strong> We failed to verify your account <br>

  											Please contact us at admin@pulsa.rexaflux.com .
										</div>

									</div>';

					}


			}else
			{
				print '<div class="form-group has-feedback has-feedback-left">
										<div class="alert alert-danger">
  											<strong>Oh sorry !</strong> Your Activation Code isn\'t corrects. a
										</div>

									</div>';
			}

		}else
		{
							print '<div class="form-group has-feedback has-feedback-left">
										<div class="alert alert-danger">
  											<strong>Oh sorry !</strong> Your Activation Code isn\'t corrects. b
										</div>

									</div>';
		}
	/*}else
	{
						print '<div class="form-group has-feedback has-feedback-left">
										<div class="alert alert-danger">
  											<strong>Oh sorry !</strong> Please open this link directly from your mailbox :)
										</div>

									</div>';

	}*/



?>

		</div>
		<div class="col-lg-3"></div>
	</div>
</div>


</body>
</html>