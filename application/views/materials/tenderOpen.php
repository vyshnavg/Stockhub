<?php echo form_open('users/register',' id="tenderOpen_form"'); ?>
	<div class="row">

		<div class="col-md-4 col-md-offset-4  col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">

			<h1 class="text-center"><?= $title; ?></h1>

			<p  class="text-center"> <?php echo validation_errors(); ?></p>

			<div class="form-group">
				<label>Tender Item</label>
				<div class="input-group">
					<p class="form-control-static"><?= $material_title; ?></p>
				</div>
			</div>

			<div class="form-group">
				<label>Date of Submission</label>
				<div class="input-group">
					<p class="form-control-static"><?php echo date("d(D) - M - Y"); ?></p>
				</div>
			</div>

			<div class="form-group">
				<label>Quantity</label>
				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="text" class="form-control" name="quantity" placeholder="Quantity" required/>
				</div>
			</div>

			<div class="form-group">
				<label>Date of Expiry</label>
				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					<input type="date" class="form-control" name="doe" min="<?php echo date("Y-m-d",strtotime('tomorrow')); ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label>Time of Expiry</label>
				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
					<input type="time" class="form-control" name="toe" value="<?php echo date("H:i"); ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label>Deilvery Location</label>
				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="email" class="form-control" name="email" placeholder="Email" required/>
				</div>
			</div>

            <!-- <label>Full name</label>
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
					<input type="email" class="form-control" name="email" placeholder="Email" required/>
				</div>
			</div>
			<div class="form-group">
				<label>Username</label>
				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" name="username" placeholder="Username" required/>
				</div>
			</div>
			<div class="form-group">
				<label>Password</label>
				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" class="form-control" name="password" placeholder="Password" required/>
				</div>
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" class="form-control" name="password2" placeholder="Confirm Password" required/>
				</div>
			</div> -->

			<button type="submit" class="btn btn-success btn-block">Submit</button>

		</div>

	</div>
	
<?php echo form_close(); ?>