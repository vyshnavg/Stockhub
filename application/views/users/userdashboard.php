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
										$sql="SELECT * from users where m_id = '$std'";
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
							<button type="button" class="btn btn-primary btn-lg btn-block login-button" onclick="location.href = '#';" >Edit</button>
						</div>

						<div class="well">
							<button type="button" class="btn btn-info btn-lg btn-block login-button" onclick="location.href = 'manageAddress';" >Manage Address Book</button>
						</div>

					</div>
				</div>
			</div>

			<div id="messages" class="tab-pane fade in">
				<h3> Under Construction</h3>
			</div>

			<div id="address" class="tab-pane fade in">
				<h3> Manage Address</h3>
			</div>

		</div>
	</div>
</div>