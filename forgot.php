<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Forgot Your Password | Rexa Pulsa</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>

	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!-- /theme JS files -->

	  <script type="text/javascript">


  	function validateEmail(email)
	{
  		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  		return re.test(email);
	}

 		$(document).ready(function() {



			$('#email').on('input propertychange paste',function(event)
			{

				var email = document.getElementById('email');
    

			    if (!validateEmail(email.value))
			    {
			    	//alert('Please provide a valid email address');
			    	document.getElementById('email').style.borderColor='#FF0000';
					//document.getElementById('email').style.border='solid';
			    	email.focus;
			    	grecaptcha.reset();
			    	
 				}else
 				{
 					document.getElementById('email').style.borderColor='#00FF00';
			    	email.focus;


 				}

			});


  			var ForgotForm = $("#ForgotForm");
  
  			ForgotForm.on("submit", function(e)
  			{

				e.preventDefault();
				var email = $("#email").val();
				

			if(email != "")
			{

			
				$.ajax({
			      type: "POST",
			      url: "forgot_act.php",
			      data: {

			        email: email,
	        		captcha: grecaptcha.getResponse()
	      		},

	      		success: function(data)
	      		{
	      			var json = $.parseJSON(data);

		            if(json.status=="OK")
		            {
	        			$("#statsinfo").html(json.message);
	        		}else
	        		{
	        			$("#statsinfo").html(json.message);
	        			//setTimeout('window.location.href = "forget.php"; ',2000);

	        		}
	      		}


	    		})

			}else
			{
				document.getElementById("email").focus();
				grecaptcha.reset();
			}
  });
});

  </script>

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="./"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<!--<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Password recovery -->
					<form id="ForgotForm">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
							</div>


						<div id="statsinfo">
							<div class="form-group has-feedback">
								<input type="email" class="form-control" placeholder="Your email" id="email">
								
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback">
								<div class="g-recaptcha" data-sitekey="6LeEkTwUAAAAAOzG0syJTLp_7-ObeS3Jw1xFcMtm" style="transform:scale(0.92);transform-origin:0;-webkit-transform:scale(0.92);
transform:scale(0.92);-webkit-transform-origin:0 0;transform-origin:0 0;"></div>

							</div>

							<button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
						</div>

						</div>

						
					</form>
					
					<!-- /password recovery -->


					<!-- Footer -->
					<div class="footer text-muted">
						Rexa Pulsa <i class="icon-cup2"></i> 2017 by <a href="" target="_blank">Rexa Official</a> and Made with <i class="icon-heart-broken2"></i>
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
