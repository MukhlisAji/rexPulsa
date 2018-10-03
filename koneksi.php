<?php


error_reporting(false);

$u = "rexaoykt_pulsa";
$p = "014014014a";
$d = "rexaoykt_pulsa";
$s = "localhost";

@$con = mysqli_connect($s,$u,$p,$d);

// Need internet conenction bcoz i need to load some file on cdn such as CSS or JS files ..

if (!$con)
{
	$Pesan = '<br><br><br><br><br><br><br><center>
	<h2><font color=red> Failed to Connect Database </font> </h2>
	<h4> Check Configurasi pada file <i>koneksi.php</i> </h4>

	<br>
	1. configurasi haruslah sama dengan Localhost anda .
	<br>
	2. Oke thanks xixi

	<br><br>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<p> Rexa Pulsa <i class="fa fa-coffee"></i> 2017 All Right Reserved and Made with <i class="fa fa-heart" style="color:#ff695d;"></i>


	';
 	die($Pesan); 
}


?>