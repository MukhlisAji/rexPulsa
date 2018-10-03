<?php


include 'koneksi.php';
include 'session.php';
date_default_timezone_set("Asia/Jakarta");


if(isset($_POST["testi"]))
{

	$r = $_POST;
	$name = $r["name"];
	$testi = $r["testi"];
	$date 	  = date("d-m-Y H:m:s");
	


		$sql = "INSERT INTO testi VALUES (null,'$name','$testi','$date')";
		 
		if (mysqli_query($con, $sql))
		{
		 	print '<h6 class="text-semibold"><i class="icon-user position-left"></i> Thank You :)</h6>
			<p>'.$testi.'</p>
			<p>'.$date.'</p>';
		}else
		{

			print '<strong>Error!</strong> '.mysqli_error($con);
		 
		}


}


?>