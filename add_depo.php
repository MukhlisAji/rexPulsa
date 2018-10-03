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


	include 'koneksi.php';
	include 'session.php';

	date_default_timezone_set("Asia/Jakarta");

	$today = date("d-m-Y");


	function rupiah($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}


if(isset($_POST["depo"]))
{

	$r = $_POST;
	$totdepo = $r["depo"];
	
	// ambil kode unique

			$sqlunik    = "SELECT * FROM unique_code";
			$resultunik = mysqli_query($con, $sqlunik);
			$rowunik    = mysqli_fetch_assoc($resultunik);


			$kode_unik = $rowunik["id"];
			$date 	   = $rowunik["dated"];

			if($date != $today)
			{

				$sqlupdateunik    = mysqli_query($con, "UPDATE unique_code SET id='1001', dated='$today'");
				$kode_unik		  = 1001;
			}




		$totpay = $totdepo + $kode_unik;
		$bank = $r["bank"];
		$date 	  = date("d/m/Y");

	


		$sql = "INSERT INTO deposit VALUES (null,'$user_id','$totdepo','$totpay','$bank','$date','pending')";

		if($bank == "mandiri" || $bank == "bca")
		{
			$bank = "Bank ".strtoupper($bank);
		}
		 
		if (mysqli_query($con, $sql))
		{
		 	print '<h6 class="text-semibold"><i class="icon-cash4 position-left"></i> Your deposit status is Pending , Please transfer ( '.rupiah($totpay).' ) to '.$bank.':)</h6>
			<p>Your Deposit : '.rupiah($totdepo).'</p>
			<p>Mandiri Account : 11111232323232 (Ripto S******)
			<p>Deposit Date : '.$date.'</p>';

			$kode_last = $kode_unik + 1;


			$sqlupdateunik    = mysqli_query($con, "UPDATE unique_code SET id='$kode_last', dated='$today'");
		}else
		{

			print '<strong>Error!</strong> '.mysqli_error($con);
		 
		}


}


?>