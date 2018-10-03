
		            <!-- Iconified modal -->
					<div id="modal_iconified" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Your Testimonial</h5>
								</div>

								<div class="modal-body">
									<div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Thanks</span> For your testi and it helps us to fix our lack
						                <button type="button" class="close" data-dismiss="alert">×</button>
						            </div>

						            <div id="resultofdepo"></div>

								</div>

								<div class="modal-footer">
									<button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
									<!--<button class="btn btn-primary"><i class="icon-check"></i> Save</button>-->
								</div>
							</div>
						</div>
					</div>
					<!-- /iconified modal -->

<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Deposit / Top up Balance <i class="icon-heart5"></i></h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse" class=""></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body" style="display: block;">

								<!--<div class="container">-->
									<div class="row">


									<div class="col-md-4">

										<div class="panel panel-flat">
											<div class="panel-heading">
												<h5 class="panel-title">Deposit</h5>
												<div class="heading-elements">
													<!--<ul class="icons-list">
			                		<li><a data-action="collapse" class=""></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>-->
							                	</div>
											<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

											<div class="panel-body">
												<div class="form-group">
													<label>Total Deposit:</label>
													<input class="form-control" placeholder="10000" type="number" id="totdeposit">
												</div>
												<!--
												<div class="form-group">
													<label>Total Pay:</label>
													<input class="form-control" placeholder="" type="number" disabled="">
												</div>-->

												<div class="form-group">
													<label>Payment Via:</label>
													<br>
													<label class="radio-inline">
														<input name="methodbank" type="radio" value="mandiri">
															 BANK MANDIRI
													</label>

													<label class="radio-inline">
														<input name="methodbank" type="radio" value="bca">
															 BANK BCA
													</label>
												</div>




												<div class="text-right">
													<button type="submit" class="btn btn-primary view_resultDepo">Top Up Now <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
										</div>

									</div>








										<div class="col-md-8">
											<div class="panel panel-flat">
																<div class="panel-heading">
																	<h5 class="panel-title">Your Deposit History</h5>
																	<div class="heading-elements">
																		<!--<ul class="icons-list">
			                		<li><a data-action="collapse" class=""></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>-->
												                	</div>
																<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

																<div class="panel-body" style="display: block;">
																	Thanks For a Trustment for us We guarantee your satisfied
																</div>

																<div class="table-responsive" style="display: block;">
																	<table class="table">
																		<thead>
																			<tr>
																				<th>ID</th>
																				<th>Total Deposit</th>
																				<th>Total Pay</th>
																				<th>Payment By</th>
																				<th>Date</th>
																				<th>Status</th>

																				
																			</tr>
																		</thead>
																		<tbody>
					


									<?php

									include 'koneksi.php';



									$sql = "SELECT * FROM deposit WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 5";

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
												//$id      = $row["id"];
												$totdepo    = $row["total_depo"];
												$totpay   = $row["total_pay"];
												$method    = $row["method"];
												$date    = $row["dated"];
												$status    = $row["status"];


												if($method == "mandiri" || $method == "bca")
												{
													$method = "Bank ".strtoupper($method);
												}

												if($status == "success")
												{
													$status = '<span class="label label-success">Success</span>';
												}elseif($status == "pending")
												{
													$status = '<span class="label label-danger">Pending</span>';
												}





											print '	<tr>
													<td>'.$noUrut.'</td>
													<td>Rp. '.rupiah($totdepo).'</td>
													<td>Rp. '.rupiah($totpay).'</td>
													<td>'.$method.'</td>
													<td>'.$date.'</td>
													<td>'.$status.'</td>


					
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


									</div>

								<!--</div>-->
									






								</div>
							</div>