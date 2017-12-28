

<?php echo form_open('users/register',' id="reg_form"'); ?>
	<div class="row">

		<div class="col-md-4 col-md-offset-4  col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">

			<h1 class="text-center"><?= $title; ?></h1>

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
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>

		</div>

	</div>
	
<?php echo form_close(); ?>

<div class="row">

	<div class="col-md-4 col-md-offset-4  col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">

		<h3  class="text-center">OR</h3>

		<button class="btn btn-primary btn-block">Sign Up for Vendor</button>

	</div>

</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

        <!-- <script src="js/index.js"></script> -->
<script type="text/javascript">
 
   $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        framework: 'bootstrap',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
					},
					regexp: {
                        regexp: /^[a-z]+$/i,
                        message: 'Can consist of only alphabetical characters'
                    }
                }
			},
			lastName: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your last name'
					},
					regexp: {
                        regexp: /^[a-z]+$/i,
                        message: 'Can consist of only alphabetical characters'
                    }
                }
			},
			email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
			},
			username: {
                validators: {
                    // stringLength: {
                    //     min: 2,
                    // },
                    // notEmpty: {
                    //     message: 'Please supply a username'
					// },
					regexp: {
                        regexp: /^[a-zA-Z0-9]([._](?![._])|[a-zA-Z0-9]){6,20}[a-zA-Z0-9]$/u,
                        message: '<ul> <li>Only alphanumeric characters, underscore and dot.</li> <li>Length at least 6 characters and maximum of 20</li>'
					}
                }
			},
			password: {
				validators: {
					notEmpty: {
                        message: 'Please supply a password'
					},
					regexp: {
                        regexp: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,30}$/u,
                        message: '<ul><li>Must contain atleast one digit from 0-9</li> <li>Must contain atleast one lowercase character</li> <li>Must contain atleast one uppercase character</li> <li>Must contain atleast one special symbol in the list "#?!@$%^&*-"</li> <li>Length at least 8 characters and maximum of 30</li></ul>'
					}
				}
			},
			password2: {
				validators: {
					notEmpty: {
                        message: 'Please supply a password'
					},
					identical: {
						field: 'password',
						message: 'The password and its confirm are not the same'
					}
				}
			},
			
            
            }
        })
		
 	
});


 
 </script>