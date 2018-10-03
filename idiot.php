<div class="content">


<?php

include 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");

 function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ip = getRealUserIp();
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$date = date("d-m-Y H:m:s");



		$sql = "INSERT INTO log_attack VALUES (null,'$session_id','$url','$ip','$user_agent','$date')";
		 
		if (mysqli_query($con, $sql))
		{
		 	//echo 'Hmm trapped';

		}else
		{

			//echo 'Better go back dude';
		 
		}

?>

					<!-- Error wrapper -->
					<div class="container-fluid text-center">
						<h1 class="error-title">404</h1>
						<h6 class="text-semibold content-group">Oops, an error has occurred. Page not found!</h6>

						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
								<form action="#" class="main-search">
									<div class="input-group content-group">
										<input class="form-control input-lg" placeholder="Search" type="text">

										<div class="input-group-btn">
											<button type="submit" class="btn bg-slate-600 btn-icon btn-lg"><i class="icon-search4"></i></button>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-6">
											<a href="?page=history" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> Go to dashboard</a>
										</div>

										<div class="col-sm-6">
											<a href="#" class="btn btn-default btn-block content-group"><i class="icon-menu7 position-left"></i> Are You drunk boy ??</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
</div>
					<!-- /error wrapper -->
