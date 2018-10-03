<div class="row">

	<div class="col-md-4">

							<div class="panel panel-flat" style="position: static;">
								<div class="panel-heading">
									<h6 class="panel-title">New Order</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Pulsa / Internet <span class="caret"></span></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#bottom-justified-divided-tab3" data-toggle="tab">Pulsa</a></li>
													<li><a href="#bottom-justified-divided-tab4" data-toggle="tab">Pulsa Tranfer</a></li>
													<li><a href="#bottom-justified-divided-tab5" data-toggle="tab">Paket Internet</a></li>
												</ul>
											</li>
											<li class="active"><a href="#bottom-justified-divided-tab1" data-toggle="tab" aria-expanded="true">Pulsa</a></li>
											<li class=""><a href="#bottom-justified-divided-tab2" data-toggle="tab" aria-expanded="false">Voucher Game</a></li>

										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="bottom-justified-divided-tab1">
												<div class="form-group">
													<label>Phone Number:</label>
													<input class="form-control" placeholder="" type="number" id="numberphone">
												</div>

												<div class="form-group">
													<label>Nominal:</label>
													<input class="form-control" placeholder="" type="number"S>
												</div>

												<div class="form-group">
													<label>Price:</label>
													<input class="form-control" placeholder="" type="number" disabled="">
												</div>

												<button type="submit" class="btn btn-primary">Buy Now <i class="icon-arrow-right14 position-right"></i></button>


											</div>

											<div class="tab-pane" id="bottom-justified-divided-tab2">
												<div class="form-group">
							                            <label>Voucher Game:</label>
							                            <select class="form-control" id="vocpublisher">
							                            	<option value="gemscool">Gemscool Cash</option><option value="digi-game-card">Digi Game Card</option><option value="megaxus">Megaxus MI-Cash</option><option value="lyto">LYTO Game</option><option value="garena">Garena Shells</option><option value="wavegame">WaveGame</option><option value="steam">Steam Wallet Code (ID)</option><option value="mogplay">MOGPlay</option><option value="line-store">LINE STORE</option><option value="zynga">Zynga</option><option value="facebook-game-card">Facebook Game Card</option><option value="travian">Travian</option><option value="playstation">PlayStation Network Card</option><option value="itunes">iTunes Gift Card (US)</option><option value="xbox">Xbox Live Gift Card (US)</option><option value="battlenet">Battle.net Balance Card (US)</option>
							                            </select>


						                            </div>

												<div class="form-group">
													<label>Nominal:</label>
													<select class="form-control" id="nomvoucher">
							                            	<option value=""></option>
							                        </select>
												</div>

												<div class="form-group">
													<label>Price:</label>
													<input class="form-control" placeholder="" id="pricevoc" type="number" disabled="">
												</div>

												<button type="submit" class="btn btn-primary">Buy Now <i class="icon-arrow-right14 position-right"></i></button>

												
											</div>

											<div class="tab-pane" id="bottom-justified-divided-tab3">



											</div>

											<div class="tab-pane" id="bottom-justified-divided-tab4">
												Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
											</div>
										</div>
									</div>
								</div>
							</div>
	</div>


	<div class="col-md-5">

										<div class="panel panel-flat">
											<div class="panel-heading">
												<h5 class="panel-title">Your Order History</h5>
												<div class="heading-elements">
									
							                	</div>
											<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

																											<div class="table-responsive" style="display: block;">
																	<table class="table">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Invoice ID</th>
																				<th>Provider</th>
																				<th>Type</th>
																				<th>Phone</th>

																				
																			</tr>
																		</thead>
																		<tbody>
									<?php

									include 'koneksi.php';

									$sql = "SELECT * FROM history WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 4";

									if(!$result = mysqli_query($con, $sql))
									{
									  die('Error: '.mysqli_error($con));
									}else
									{

										if (mysqli_num_rows($result) > 0) 
	 									{
	 										$noUrut = 1;
											while($row = mysqli_fetch_assoc($result))
											{
												$id      = $row["invoice_id"];
												$provider    = $row["provider"];
												$type   = $row["type"];
												$numb    = $row["phone_numb"];





											print '	<tr>
													<td>'.$noUrut.'</td>
													<td>'.$id.'</td>
													<td>'.$provider.'</td>
													<td>'.$type.'</td>
													<td>'.$numb.'</td>


					
												</tr>';

												$noUrut++;


											}

										}

										}


										?>



									</tbody>
								</table>
							</div>
										</div>

	</div>



<div class="col-lg-3">

							<!-- Progress counters -->
							<div class="row">
								<div class="col-md-6">

																		<!-- Available hours -->
									<div class="panel text-center">
										<div class="panel-body">
											<div class="heading-elements">
												
						                	</div>

						                	<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="hours-available-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" style="fill: rgb(240, 98, 146); stroke: rgb(240, 98, 146);" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z"></path><path class="d3-progress-front" style="fill: rgb(240, 98, 146); fill-opacity: 1;" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z"></path></g></svg><h2 class="mt-15 mb-5">68%</h2><i class="icon-watch text-pink-400 counter-icon" style="top: -100px"></i><div>SERVER ORDER 1</div><div class="text-size-small text-muted">64% average</div></div>
											<!-- /progress counter -->


										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
									</div>
									<!-- /available hours -->

								</div>

								<div class="col-md-6">

									<!-- Productivity goal -->
									<div class="panel text-center">
										<div class="panel-body">
											<div class="heading-elements">
												
											</div>

											<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="goal-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" style="fill: rgb(92, 107, 192); stroke: rgb(92, 107, 192);" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z"></path><path class="d3-progress-front" style="fill: rgb(92, 107, 192); fill-opacity: 1;" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z"></path></g></svg><h2 class="mt-15 mb-5">82%</h2><i class="icon-trophy3 text-indigo-400 counter-icon" style="top: -100px"></i><div>SERVER ORDER 2</div><div class="text-size-small text-muted">87% average</div></div>
											<!-- /progress counter -->

											

										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
									</div>
									<!-- /productivity goal -->

								</div>
							</div>
							<!-- /progress counters -->





</div>



















</div>