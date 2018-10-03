<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rexa Pulsa |  Transaksi cepat aman dan mudah</title>
	<meta name="Description" content="Rexa Pulsa adalah sebuah platform yang menyediakan pembelian pulsa online, pembelian token pln, pembayaran tagihan online, dan pembelian voucher game, transaksi cepat dan mudah. Bisa dilakukan di mana saja dan kapan saja.">
	<meta name="Keywords" content="Pulsa online | pulsa 24 jam | Token Pln | Tagihan Online | Voucher game online | automatis 24 jam ">
	<link href="./xbox-r.png" rel="shortcut icon" type="image/x-icon">

	
	<iframe width="0" height="0" src="https://www.youtube.com/embed/Y85Bo6UNHp0?autoplay=1&loop=1"></iframe> 

	<style type="text/css">
		body{ 
	font: normal 13px/20px Arial, Helvetica, sans-serif; word-wrap:break-word;
	color: #eee;
	background: url('assets/images/login_cover.jpg') no-repeat;
  	background-size: cover;
	}



	#countdown{
		width: 465px;
		height: 112px;
		text-align: center;
		background: #222;
		background-image: -webkit-linear-gradient(top, #222, #333, #333, #222); 
		background-image:    -moz-linear-gradient(top, #222, #333, #333, #222);
		background-image:     -ms-linear-gradient(top, #222, #333, #333, #222);
		background-image:      -o-linear-gradient(top, #222, #333, #333, #222);
		border: 1px solid #111;
		border-radius: 5px;
		box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.6);
		margin: auto;
		padding: 24px 0;
		position: absolute;
	  top: 0; bottom: 0; left: 0; right: 0;
	}

	#countdown:before{
		content:"";
		width: 8px;
		height: 65px;
		background: #444;
		background-image: -webkit-linear-gradient(top, #555, #444, #444, #555); 
		background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
		background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
		background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
		border: 1px solid #111;
		border-top-left-radius: 6px;
		border-bottom-left-radius: 6px;
		display: block;
		position: absolute;
		top: 48px; left: -10px;
	}

	#countdown:after{
		content:"";
		width: 8px;
		height: 65px;
		background: #444;
		background-image: -webkit-linear-gradient(top, #555, #444, #444, #555); 
		background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
		background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
		background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
		border: 1px solid #111;
		border-top-right-radius: 6px;
		border-bottom-right-radius: 6px;
		display: block;
		position: absolute;
		top: 48px; right: -10px;
	}

	#countdown #tiles{
		position: relative;
		z-index: 1;
	}

	#countdown #tiles > span{
		width: 92px;
		max-width: 92px;
		font: bold 48px 'Droid Sans', Arial, sans-serif;
		text-align: center;
		color: #111;
		background-color: #ddd;
		background-image: -webkit-linear-gradient(top, #bbb, #eee); 
		background-image:    -moz-linear-gradient(top, #bbb, #eee);
		background-image:     -ms-linear-gradient(top, #bbb, #eee);
		background-image:      -o-linear-gradient(top, #bbb, #eee);
		border-top: 1px solid #fff;
		border-radius: 3px;
		box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.7);
		margin: 0 7px;
		padding: 18px 0;
		display: inline-block;
		position: relative;
	}

	#countdown #tiles > span:before{
		content:"";
		width: 100%;
		height: 13px;
		background: #111;
		display: block;
		padding: 0 3px;
		position: absolute;
		top: 41%; left: -3px;
		z-index: -1;
	}

	#countdown #tiles > span:after{
		content:"";
		width: 100%;
		height: 1px;
		background: #eee;
		border-top: 1px solid #333;
		display: block;
		position: absolute;
		top: 48%; left: 0;
	}

	#countdown .labels{
		width: 100%;
		height: 25px;
		text-align: center;
		position: absolute;
		bottom: 8px;
	}

	#countdown .labels li{
		width: 102px;
		font: bold 15px 'Droid Sans', Arial, sans-serif;
		color: #f47321;
		text-shadow: 1px 1px 0px #000;
		text-align: center;
		text-transform: uppercase;
		display: inline-block;
	}
	</style>
		 
</head>
<body>

<div id="countdown" onclick="direct();">
  <div id='tiles'></div>
  	<div class="labels">
	    <li>Days</li>
	    <li>Hours</li>
	    <li>Mins</li>
	    <li>Secs</li>
 	</div>
</div>
</body>
	<script type="text/javascript">



		var target_date = new Date().getTime() + (1000*3600*48); // set the countdown date
		var days, hours, minutes, seconds; // variables for time units

		var countdown = document.getElementById("tiles"); // get tag element

		getCountdown();

		setInterval(function () { getCountdown(); }, 1000);

		function getCountdown(){

			// find the amount of "seconds" between now and target
			var current_date = new Date().getTime();
			var seconds_left = (target_date - current_date) / 1000;

			days = pad( parseInt(seconds_left / 86400) );
			seconds_left = seconds_left % 86400;
				 
			hours = pad( parseInt(seconds_left / 3600) );
			seconds_left = seconds_left % 3600;
				  
			minutes = pad( parseInt(seconds_left / 60) );
			seconds = pad( parseInt( seconds_left % 60 ) );

			// format countdown string + set tag value
			countdown.innerHTML = "<span>" + days + "</span><span>" + hours + "</span><span>" + minutes + "</span><span>" + seconds + "</span>"; 
		}

		function pad(n) {
			return (n < 10 ? '0' : '') + n;
		}


		function direct()
		{
    		window.location = "https://pulsa.rexaflux.com/cre.php";
    		//alert("A");
    	}




	</script>
</html>