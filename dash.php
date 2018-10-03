<?php
	//GET SERVER LOADS
	$result = @exec('uptime');
	preg_match("/averages?: ([0-9\.]+),[\s]+([0-9\.]+),[\s]+([0-9\.]+)/", $result , $avgs );

?>

<div class="row">
								<div class="col-lg-4">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											<div class="heading-elements">
												<span class="heading-text badge bg-teal-800">+53,6%</span>
											</div>

											<h3 class="no-margin">3,450</h3>
											Members online
											<div class="text-muted text-size-small">489 avg</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

										
									</div>
									<!-- /members online -->

								</div>

								<div class="col-lg-4">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div>

											<h3 class="no-margin">49.4%</h3>
											Current server load
											<div class="text-muted text-size-small">34.6% avg</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

										
									</div>
									<!-- /current server load -->

								</div>

								<div class="col-lg-4">

									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin">$18,390</h3>
											Today's revenue
											<div class="text-muted text-size-small">$37,578 avg</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

										
									</div>
									<!-- /today's revenue -->

								</div>
							</div>









<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Dashboard Log</h5>
							<div class="heading-elements">
								<!--<ul class="icons-list">
			                		<li><a data-action="collapse" class=""></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>-->
		                	</div>
						<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

						<div class="panel-body" style="display: block;">
							Update Log : <br>
							1. Validasi email before submit <br>
							2. Enter key alt for submit button
						</div>


</div>