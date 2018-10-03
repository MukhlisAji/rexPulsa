
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
	include('koneksi.php');
	include('session.php');

	$result = mysqli_query($con, "SELECT * From userlogin WHERE username='$session_id'")or die('Error In Session');
	$row = mysqli_fetch_array($result);

	function rupiah($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rexa Pulsa Dasboard | <?php echo $session_id; ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">


	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>

	<!-- /theme JS files -->
	<style type="text/css">
		.page-container { height: calc(90% - 80px); }
	</style>


	<script type="text/javascript">


    $(document).ready(function()
    {

    	//$('body').css({ webkitTransform: '80%' });
    	//ar scale = 'scale(1)';
		//document.body.style.webkitTransform =    scale;   // Chrome, Opera, Safari
 		//document.body.style.msTransform =  scale;        // IE 9
 		//document.body.style.transform = scale;     // General


			//document.body.style.zoom="100%";
			//zoomLevel =1 ;
			//$('html').css({ zoom: zoomLevel, '-moz-transform': 'scale(' + zoomLevel + ')' });



	$('#vocpublisher').on('change', function()
	{
		var target = $('#vocpublisher').val();
		$.ajax({  
        url:"demo/datane.php?target="+ target + "&type=1",  
        method:"GET",  
        
        success:function(data)
        {  
          	
            $('#nomvoucher').html(data);  
	                          
        }  
        });  
	});



	$('#nomvoucher').on('change', function()
	{
		var target = $('#vocpublisher').val();
		var id = $('#nomvoucher').val();
		$.ajax({  
        url:"demo/datane.php?target="+ target + "&type=2&id=" + id,  
        method:"GET",  
        
        success:function(data)
        {  
          	
            $('#pricevoc').val(data);  
	                          
        }  
        });  
	});

	$(document).on('click', '.view_result', function(){  
	           var testi = $('#message').val();
	           var name = $('#name').val();
	           if(testi != '')  
	           {  
	                $.ajax({  
	                     url:"add_testi.php",  
	                     method:"POST",  
	                     data:{testi:testi,name:name},  
	                     success:function(data){  
	                      $('#modal_iconified').modal('show');  
	                          $('#resultoftesti').html(data);  
	                          
	                     }  
	                });  
	           }            
	      });  


	$('#modal_iconified').on('hidden.bs.modal', function () {
    window.location.reload();
	})



	 


	$(document).on('click', '.view_resultDepo', function(){  
	           var depo = $('#totdeposit').val();
	           var bank = $('input[name=methodbank]:checked').val();
	           if(depo != '')  
	           {  
	                $.ajax({  
	                     url:"add_depo.php",  
	                     method:"POST",  
	                     data:{depo:depo,bank:bank},  
	                     success:function(data){  
	                      $('#modal_iconified').modal('show');  
	                          $('#resultofdepo').html(data);  
	                          
	                     }  
	                });  
	           }            
	      });  


	$('#modal_iconified').on('hidden.bs.modal', function () {
    window.location.reload();
	})



	});  







    </script>

</head>


							<?php


								error_reporting(0);

								if(!isset($_GET["page"]))
								{
									$incfile =  'dash.php';
									$tabname =  'Dasboard';
								}elseif($_GET["page"] == "about")
								{
									$incfile =  'about.php';
									$tabname =  'About';
								}elseif($_GET["page"] == "testi")
								{
									$incfile =  'testi.php';
									$tabname =  'Testimonial';
								}elseif($_GET["page"] == "detail")
								{
									$inv = $_GET["inv"];
									$incfile = 'detail.php';
									$tabname =  'Detail';
								}elseif($_GET["page"] == "pln")
								{
									
									$incfile = 'tokenpln.php';
									$tabname =  'Price';
									$tigatabname = 'Token PLN';
								}elseif($_GET["page"] == "depo")
								{
									$incfile = 'depo.php';
									$tabname =  'Deposit';
								}elseif($_GET['page'] == "history")
								{

									$incfile =  'history.php';
									$tabname =  'History';
									
								}elseif($_GET['page'] == "order")
								{

									$incfile =  'order.php';
									$tabname =  'Order';
									
								}else
								{
									$incfile = 'idiot.php';
									$tabname =  'Hellll yeahhhhh';
								}


							?>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>




				<!-- Update dropdown right side -->

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-git-compare"></i>
						<span class="visible-xs-inline-block position-right">New updates</span>
						<span class="badge bg-warning-400">9</span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							New updates
							<ul class="icons-list">
								<li><a href="#"><i class="icon-sync"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
								</div>
								
								<div class="media-body">
									Add full font overrides for popovers and tooltips
									<div class="media-annotation">36 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
									<div class="media-annotation">2 hours ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
									<div class="media-annotation">Dec 18, 18:36</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>
								
								<div class="media-body">
									Have Carousel ignore keyboard events
									<div class="media-annotation">Dec 12, 05:46</div>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="" data-original-title="All activity"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>


				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-people"></i>
							<span class="visible-xs-inline-block position-right">Users</span>
						</a>
						
						<div class="dropdown-menu dropdown-content">
							<div class="dropdown-content-heading">
								Users online
								<ul class="icons-list">
									<li><a href="#"><i class="icon-gear"></i></a></li>
								</ul>
							</div>

							<ul class="media-list dropdown-content-body width-300">
								<li class="media">
									<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">Ripto Sudiyarno</a>
										<span class="display-block text-muted text-size-small">Lead web developer</span>
									</div>
									<div class="media-right media-middle"><span class="status-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">Raka Putra Wicaksana</a>
										<span class="display-block text-muted text-size-small">Marketing manager</span>
									</div>
									<div class="media-right media-middle"><span class="status-mark border-danger"></span></div>
								</li>

								<li class="media">
									<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">Mukhlis Purnomo Aji</a>
										<span class="display-block text-muted text-size-small">Project manager</span>
									</div>
									<div class="media-right media-middle"><span class="status-mark border-success"></span></div>
								</li>

								
							</ul>

							<div class="dropdown-content-footer">
								<a href="#" data-popup="tooltip" title="" data-original-title="All users"><i class="icon-menu display-block"></i></a>
							</div>
						</div>
</li>







				<!-- -->
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><i class="icon-phone2"></i> (021) 240797</a></li>
				<li><a href="#"><i class="icon-instagram"></i> rexa.official</a></li>
				<li><a href="#"><i class="icon-mention"></i> support@pulsa.rexaflux.com</a></li>
				


				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/user.png" alt="">
						<span><?php print $row["name"]; ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href=""><i class="icon-coins"></i> Rp. <?php echo rupiah($row['balance']); ?></a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="./logout.php"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/user.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php print $row["name"]; ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-coins text-size-small"></i> Rp. <?php echo rupiah($row['balance']); ?>
									</div>
								</div>

								<!--<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>-->
							</div> 
						</div>
					</div>
				<!--/user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main Menu</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="zone.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li><a href="?page=order"><i class="icon-cart-add"></i> <span>Make New Order</span></a></li>
								<li><a href="?page=depo"><i class="icon-cash3"></i> <span>Deposit</span></a></li>
								<li>
									<a href="?page=history"><i class="icon-history"></i> <span>History</span></a>

								</li>
								<li><a href="#"><i class="icon-price-tag"></i> <span>Price</span></a>


									<ul>
										<li><a href="#">Pulsa</a>

											<ul>
												<li><a href="#">Pulsa Telkomsel</a></li>
												<li><a href="#">Pulsa XL dan Axis</a></li>
												<li><a href="#">Pulsa Tri 3</a></li>
												<li><a href="#">Pulsa Indosat</a></li>
											</ul>


										</li>
										<li><a href="#">Paket Internet</a></li>
										<li><a href="?page=pln">Token PLN</a></li>
									</ul>





								</li>

								<li><a href="?page=testi"><i class="icon-envelop"></i> <span>Testimonial</span></a></li>
								<li><a href="?page=about"><i class="icon-people"></i> <span>About Us</span></a></li>
								<!-- /main -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<!--<h4><i class="icon-home2"></i> <span class="text-semibold">Rexa Pulsa</span></h4>-->
						</div>

						<div class="heading-elements">
							<!--<a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>-->
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<?php
								if(isset($tigatabname) && $tigatabname != "")
								{
									echo '
									<li><a href="#">'.$tabname.'</a></li>
									<li><a href="#" class="active">'.$tigatabname.'</a></li>';
								}else
								{
									echo '<li><a href="#" class="active">'.$tabname.'</a></li>';
								}

							?>
							
						</ul>

						<!--<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Dropdown
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>-->
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Simple panel -->
							<?php
									include_once $incfile;

							?>
					<!-- /simple panel -->





	


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
