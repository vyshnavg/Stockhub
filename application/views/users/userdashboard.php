<div class="container"> 
    <h2> <?= $title ?> </h2>
</div>



<div id="tabnav" class="tabnav">

	<div class="container">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
			<li><a data-toggle="tab" href="#messages">Messages</a></li>
			<li><a data-toggle="tab" href="#address">Address</a></li>
			<!-- <li><a data-toggle="tab" href="#menu2">My Storage</a></li>
			<li><a data-toggle="tab" href="#menu3">My Booking</a></li> -->
		</ul>

		<div class="tab-content">

			<!-- ========================= PROFILE SECTION ========================= -->

			<div id="profile" class="tab-pane fade in active">
				<div class="row">
					
					<div class="col-md-6 img-align-center">
						<img class="img-circle" src="<?php echo asset_url().'images/web-req/noimg.png'?>" alt="no image">
					</div>
					
					<div class="col-md-6">
						<div class="well">
							<?php

										$std = ucfirst($this->session->userdata('user_id'));

										include '..\stockhub\assets\dbh.php';
										$sql="SELECT * from manufacturers where m_id = '$std'";
										$result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
										
										if($row=mysqli_fetch_assoc($result)){
											
											echo "	<h3>Name : ".$row['m_firstname']." ".$row['m_lastname']."</h3>
													<h3>Email : ".$row['m_email']."</h3>
													<h3>Status : ".$row['m_status']."</h3>";
									// 			if (is_null($row['dob'])) {
									// 				echo "<h3>Date of Birth : <i>Null</i></h3>";
									// 			}
									// 			else{
									// 				echo "<h3>Date of Birth : ".$row['dob']."</h3>";
									// 			}
									// 			if (is_null($row['aadhar_card'])) {
									// 				echo "<h3>Aadhar Card : <i>Null</i></h3>";
									// 			}
									// 			else{
									// 				echo "<h3>Aadhar Card : ".$row['aadhar_card']."</h3>";
									// 			}
											}
							?>
							<button type="button" class="btn btn-primary btn-lg btn-block login-button" data-toggle="modal" data-target="#editProModal" >Edit</button>
						</div>

							<!-- Add Modal -->
							<div class="modal fade" id="editProModal" role="dialog">
								<div class="modal-dialog">
								
								<!-- Add Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add New Address</h4>
									</div>
									<div class="modal-body">
										
										<?php echo form_open('users/newAddress',' id="address_form"'); ?>
											<div class="row">

												<div class="col-md-8 col-md-offset-2">

													<p  class="text-center"> <?php echo validation_errors(); ?></p>



													<label>Full name</label>
													<div class="row">
														<div class="col-xs-6">
															<div class="form-group">
																<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
																	<input type="text" class="form-control" name="firstName" placeholder="First name" />
																</div>
															</div>
														</div>
														<div class="col-xs-6">
															<div class="form-group">
																<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
																	<input type="text" class="form-control" name="lastName" placeholder="Last name" />
																</div>
															</div>
														</div>
													</div>


													<div class="form-group">
														<label>Email</label>
														<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
															<input type="email" class="form-control" name="email" placeholder="Email" readonly="readonly"/>
														</div>
													</div>
													<div class="form-group">
														<label>Username</label>
														<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
															<input type="text" class="form-control" name="username" placeholder="Username" required/>
														</div>
													</div>
												




													
													<button type="submit" class="btn btn-success btn-block">Submit</button>

												</div>

											</div>
											
										<?php echo form_close(); ?>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- ========================= MESSAGES SECTION ========================= -->

			<div id="messages" class="tab-pane fade in">
				<h3> Under Construction</h3>

				<?php echo form_open('vendors/tester'); ?>
					<div class="row">

						<div class="col-md-4 col-md-offset-4  col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">

							<div class="form-group">
								<label>Username</label>
								<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="username" placeholder="Username" required/>
								</div>
							</div>
		
							<button type="submit" class="btn btn-success btn-block">Submit</button>

						</div>

					</div>
					
				<?php echo form_close(); ?>
			</div>

			<!-- ========================= ADDRESS SECTION ========================= -->

			<div id="address" class="tab-pane fade in">
				<h3> Manage Address</h3>

				<div class="row is-flex">

					<!-- == DISPLAY ADDRESS == -->

					<?php foreach($addresses_arr as $address_arr) : ?>
					<div class="col-sm-6 col-md-3">
						<div class="well">
							<div class="caption">
								<h3 class="h3-margin-top-change"><?php echo ($address_arr['building_no']." , ".$address_arr['street']." , ".$address_arr['city']." , ".$address_arr['state']." , ".$address_arr['country'].". Pincode : ".$address_arr['pincode']); ?></h3>
									
									<div class="row">
										
										<div class="col-md-6">
											<button class="btn btn-warning btn-block" type="button" onclick="location.href='<?php echo base_url(); ?>users/viewAddress/<?php echo ($address_arr['add_id'])?>'"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></span></button> 
										</div>
										<div class="col-md-6">
											<button class="btn btn-danger btn-block" type="button" href="#" title="Do you want to delete this Address?" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<form action='<?php echo base_url(); ?>users/delAddress/<?php echo($address_arr['add_id']) ?>'><input class='btn btn-danger btn-block' type='submit' value='Yes' /></form> <button class='btn btn-info btn-block' href='home'>No</button>"><span class=" glyphicon glyphicon-trash" aria-hidden="true"></span></button>
										</div>

									</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

					<!-- == ADD ADDRESS == -->

					<div class="col-sm-6 col-md-3">
						
						<button class="btn btn-info plus-button-larger" type="button" data-toggle="modal" data-target="#addModal"><i class="glyphicon glyphicon-plus"></i></button>  


						<!-- Add Modal -->
						<div class="modal fade" id="addModal" role="dialog">
							<div class="modal-dialog">
							
							<!-- Add Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add New Address</h4>
								</div>
								<div class="modal-body">
									
									<?php echo form_open('users/newAddress',' id="address_form"'); ?>
										<div class="row">

											<div class="col-md-8 col-md-offset-2">

												<p  class="text-center"> <?php echo validation_errors(); ?></p>



												<div class="form-group">
													<label>Building/Flat No: </label>
														<input type="text" class="form-control" id="buildno" name="buildno" maxlength="24" required/>
												</div>

												<div class="form-group">
													<label>Street: </label>
													<textarea class="form-control" rows="3" id="street" name="street" placeholder="Max 100 characters" maxlength="100"></textarea>
												</div>

												<div class="form-group">
													<label>Pincode No: </label>
														<input type="number" class="form-control" id="pincode" name="pincode"  min="100000" max="999999" required/>
												</div>

												<div class="form-group">
													<label>Landmark (Optional): </label>
														<input type="text" class="form-control" id="landmark" name="landmark" maxlength="49" />
												</div>

												<div class="form-group">
													<label>State: </label>
													<select class="form-control" id="listBox" name="listBox" maxlength="24" onchange='selct_district(this.value)' ></select>
												</div>

												<div class="form-group">
													<label>City: </label>
													<select class="form-control" id='secondlist' maxlength="29" name="secondlist" ></select>
												</div>

												<div class="form-group">
													<label>Country: </label>
													<input type="text" class="form-control" value="India" id="country" name="country" data-toggle="popover" data-trigger="hover" data-content="Only available in India now." readonly="readonly"/>
												</div>




												
												<button type="submit" class="btn btn-success btn-block">Submit</button>

											</div>

										</div>
										
									<?php echo form_close(); ?>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
							
							</div>
						</div>


					</div>

				</div>
			</div>

		</div>
	</div>
</div>