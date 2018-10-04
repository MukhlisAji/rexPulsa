<?php
 	session_start();
 	include('koneksi.php');

 		/*
		All Codes are written by RexaPulsa team
		Thanks To Boostrap , StackOverflow , Google , Our Laptop

		Shout out : 
		Ripto Sudiyarno as Front end & Back end Developer And Security Tester
		Raka Putra Wicaksana as Developer Back End And Security Tester
		Mukhlis Purnomo Aji as Developer Back End and Database Administrator


		2017 We Present this Apps For Ppl that we loved Hehe ~




	*/

?>

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


	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
<!-- 
	
	body {
	    overflow:hidden;
	}
-->
<style type="text/css">

	input:hover, input:focus {
	    outline: 0;
	    transition: all .5s linear;
	    box-shadow: inset 0px 0px 10px #ccc;
	}

	meter {
	    /* Reset the default appearance */
	    -webkit-appearance: none;
	       -moz-appearance: none;
	            appearance: none;
	            
	    margin: 0 auto 1em;
	    width: 100%;
	    height: .5em;
	    
	    /* Applicable only to Firefox */
	    background: none;
	    background-color: rgba(0,0,0,0.1);
	}

	meter::-webkit-meter-bar {
	    background: none;
	    background-color: rgba(0,0,0,0.1);
	}

	meter[value="1"]::-webkit-meter-optimum-value { background: red; }
	meter[value="2"]::-webkit-meter-optimum-value { background: orange; }
	meter[value="3"]::-webkit-meter-optimum-value { background: yellow; }
	meter[value="4"]::-webkit-meter-optimum-value { background: green; }

	meter[value="1"]::-moz-meter-bar { background: red; }
	meter[value="2"]::-moz-meter-bar { background: orange; }
	meter[value="3"]::-moz-meter-bar { background: yellow; }
	meter[value="4"]::-moz-meter-bar { background: green; }

	.feedback {
	    color: #9ab;
	    font-size: 90%;
	    padding: 0 .25em;
	    font-family: Courgette, cursive;
	    margin-top: 1em;
	}
	</style>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<script type="text/javascript" src="assets/js/pages/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/zxcvbn.js"></script>

	<!-- /theme JS files -->

	<script>


	function validateEmail(email)
	{
  		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  		return re.test(email);
	}
		$(document).ready(function()
		{
			var strength = {
		        0: "Worst ☹",
		        1: "Bad ☹",
		        2: "Weak ☹",
		        3: "Good ☺",
		        4: "Strong ☻"
		}

		var password = document.getElementById('password');
		var meter = document.getElementById('password-strength-meter');
		//var text = document.getElementById('password-strength-text');

		password.addEventListener('input', function()
		{
		    var val = password.value;
		    var result = zxcvbn(val);
		    
		    // Update the password strength meter
		    meter.value = result.score;
		   
		    // Update the text indicator
		    if(val !== "")
		    {
		       // text.innerHTML = "Strength: " + "<strong>" + strength[result.score] + "</strong>";// + "<span class='feedback'>" + result.feedback.warning + " " + result.feedback.suggestions + "</span"; 

		        if(result.score == "3" || result.score == "4")
		        {
		        	document.getElementById('password').style.borderColor='#00FF00';
		        	//return false;
		        	
		        		        	
		        }else
		        {
		        	document.getElementById('password').style.borderColor='#FF0000';
		        	//return false;

		        }

		        $("#passwordmeter").val(result.score);
		        
		    }
		    else {
		        //text.innerHTML = "";
		        document.getElementById('password').style.borderColor='#FF0000';
		        return false;
		    }
		});


			$('#email').on('input propertychange paste',function(event)
			{

				var email = document.getElementById('email');
    

			    if (!validateEmail(email.value))
			    {
			    	//alert('Please provide a valid email address');
			    	document.getElementById('email').style.borderColor='#FF0000';
			    	$("#emailX").val("0");
					//document.getElementById('email').style.border='solid';
			    	email.focus;
			    	return false;
 				}else
 				{
 					document.getElementById('email').style.borderColor='#00FF00';
 					$("#emailX").val("1");
			    	email.focus;
			    	return false;
 				}

			});

			$('#username').on('input propertychange paste',function(event)
			{

				var username = $("#username").val();
    

			    if (username.length < 6)
			    {
			    	//console.log(username.length);
			    	//alert(username.length);
			    	document.getElementById('username').style.borderColor='#FF0000';
					//document.getElementById('email').style.border='solid';
			    	username.focus;
			    	return false;
 				}else
 				{
 					document.getElementById('username').style.borderColor='#00FF00';
			    	username.focus;
			    	return false;
 				}

			});


			$('#name').on('input propertychange paste',function(event)
			{

				var name = $("#name").val();
    

			    if (name.length < 4)
			    {
			    	//console.log(username.length);
			    	//alert(username.length);
			    	document.getElementById('name').style.borderColor='#FF0000';
					//document.getElementById('email').style.border='solid';
			    	name.focus;
			    	return false;
 				}else
 				{
 					document.getElementById('name').style.borderColor='#00FF00';
			    	name.focus;
			    	return false;
 				}

			});






			//$("#email").bind("click", validateEmail);
			zoomLevel = 0.9;
			$('body').css({ zoom: zoomLevel, '-moz-transform': 'scale(' + zoomLevel + ')' });

			$('#regbutton').click(function()
            {

            	var name = $("#name").val();
				var user = $("#username").val();
				var pass = $("#password").val();
				var email = $("#email").val();
				var meter = $("#passwordmeter").val();
				var checkbox = $("#checkbox").val();
				var mlx	  = $("#emailX").val();

				if (name.length < 4)
			    {
			    	document.getElementById("name").focus();
			    	return false;
			    }



			    if (user.length < 6)
			    {
			    	document.getElementById("username").focus();
			    	return false;
			    }


			    if (meter <= 2)
			    {
			    	document.getElementById("password").focus();
			    	return false;
			    }

			    if (mlx == 0)
			    {
					document.getElementById("email").focus();
			    	return false;
			    }







				if(user != "" && pass != "" && email != "" &&  name != "" && checkbox == "on" && mlx != 0)
				{

				    $.ajax({
				        type: 'POST',
				        url: 'reg_act.php',
				        data: {
				            username 	: user,
				            password 	: pass,
				            email		: email,
				            name 		: name,
				            checkbox 	: checkbox,
				            register 	: true

				        },
				       	success: function (data)
				        {
				            //$("#statsinfo").html(data);
				            var json = $.parseJSON(data);

				            if(json.status=="OK")
				            {
				            	var headerText    = json.headerText;
				            	var changeSuccess = '<div class="icon-object border-success text-success"><i class="icon-checkmark2"></i></div>' + headerText;

				            	$("#notifwhenSuccess").html(changeSuccess);
				
				            	$("#StatsRegister").html(json.message);
				            	
				            }else
				            {
				            	$("#StatsRegister").html(json.message);
				            }
				        }
		    		});


		    	}else
		    	{
		    		if(name == "")
					{
						document.getElementById("name").focus();
						return false;
					}else if(user == "")
					{
						document.getElementById("username").focus();
						return false;
					}else if(pass == "")
					{
						document.getElementById("password").focus();
						return false;
					}else if(email == "")
					{						
						document.getElementById("email").focus();
						return false;
					}else if(checkbox != "on")
					{
						document.getElementById("checkbox").focus();
						return false;
					}
		    	}

	    	});

			//regbutton
            $('#submit').click(function()
            {

				var user = $("#user").val();
				var pass = $("#pass").val();
			    $.ajax({
			        type: 'POST',
			        url: 'login_act.php',
			        data: {
			            user 	: user,
			            pass 	: pass,
			            login   : true,
			        },
			       	success: function (data)
			        {
			            //$("#statsinfo").html(data);
			            var json = $.parseJSON(data);
			            if(json.status=="OK")
			            {
			
			            	$("#statsinfo").html(json.message);
			            	setTimeout(' window.location.href = "zone.php"; ',2000);
			            }else if(json.status=="VERIFY")
			            {
			            	$("#statsinfo").html(json.message);
			            }else
			            {
			            	$("#statsinfo").html(json.message);
			            }
			        }
	    		});

	    	});
    });
	    
	
	</script>

</head>

<body class="login-cover">

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Tabbed form -->
					<div class="tabbable panel login-form width-400">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a href="#basic-tab1" data-toggle="tab"><h6><i class="icon-checkmark3 position-left"></i> Already a user?</h6></a></li>
							<li><a href="#basic-tab2" data-toggle="tab"><h6><i class="icon-plus3 position-left"></i> Create an account</h6></a></li>
						</ul>

						<div class="tab-content panel-body">
							<div class="tab-pane fade in active" id="basic-tab1">
								
									<div class="text-center">
										<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
										<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
									</div>

									<div id="statsinfo"> </div>


									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" placeholder="Username" name="username" id="user" required="required">
										
										<div class="form-control-feedback">
											<i class="icon-user text-muted"></i>
										</div>
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" placeholder="Password" name="password" id="pass" required="required" autocomplete="off">
										<div class="form-control-feedback">
											<i class="icon-lock2 text-muted"></i>
										</div>
									</div>

									<div class="form-group login-options">
										<div class="row">
											<div class="col-sm-6">
												<label class="checkbox-inline">
													<input type="checkbox" class="styled" checked="checked">
													Remember
												</label>
											</div>

											<div class="col-sm-6 text-right">
												<a href="./forgot.php">Forgot password?</a>
											</div>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn bg-blue btn-block" id="submit">Login <i class="icon-arrow-right14 position-right"></i></button>
									</div>
								

								<!--<div class="content-divider text-muted form-group"><span>or sign in with</span></div>
								<ul class="list-inline form-group list-inline-condensed text-center">
									<li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
									<li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
									<li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
									<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
								</ul>-->

								<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
							</div>

							<div class="tab-pane fade" id="basic-tab2">
								
									<div class="text-center">

										<div id="notifwhenSuccess">
											<div class="icon-object border-success text-success"><i class="icon-user-plus"></i></div>
											<h5 class="content-group">Create new account <small class="display-block">All fields are required</small></h5>
										</div>
									</div>

									<div id="StatsRegister">
									

										<div class="form-group has-feedback has-feedback-left">
											<input type="text" class="form-control" placeholder="Full Name" name="name" id="name" required="required" autocomplete="off">
											<div class="form-control-feedback">
												<i class="icon-user text-muted"></i>
											</div>
										</div>

										<div class="form-group has-feedback has-feedback-left">
											<input type="text" class="form-control" placeholder="Your username" name="username" id="username" required="required" autocomplete="off">
											<div class="form-control-feedback">
												<i class="icon-user-check text-muted"></i>
											</div>
										</div>

										<div class="form-group has-feedback has-feedback-left">
											<input type="password" class="form-control" placeholder="Create password" name="password" id="password" required="required" autocomplete="off">
											        <meter max="4" id="password-strength-meter"></meter>
											       	<input type="hidden" id="passwordmeter" value="0">
											       	<!--<p id="password-strength-text"></p>-->
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>

										<div class="form-group has-feedback has-feedback-left">
											<input type="text" class="form-control" placeholder="Your email" name="email" id="email" required="required" autocomplete="off">
											<input type="hidden" id="emailX" value="0">
											<div class="form-control-feedback">
												<i class="icon-mention text-muted"></i>
											</div>
										</div>




										<div class="form-group">


										<div class="checkbox">
												<label>
													<input type="checkbox" class="styled" id="checkbox" required="">
													Accept <a href="#">terms of service</a>
												</label>
											</div>
										</div>
										

										<button type="submit" class="btn bg-indigo-400 btn-block" id="regbutton">Register <i class="icon-circle-right2 position-right"></i></button>

										</div>
									</div>
							</div>
						</div>
					</div>
					<!-- /tabbed form -->


					<!-- Footer -->
					<br><br>
					<div class="footer text-white">
						<center>
						<div class="alert text-violet-800 alpha-violet no-border" style="width: 400px;">
							Rexa Pulsa <i class="icon-cup2"></i> 2017 by <a href="" target="_blank">Rexa Official</a> and Made with <i class="icon-heart-broken2"></i>
						</div>
						</center>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
