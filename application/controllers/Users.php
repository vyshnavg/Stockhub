<?php

	class Users extends CI_Controller{

		// Register user
		public function register(){

			// Check if the user is already logged in.
			if($this->session->userdata('logged_in')){
				redirect('home');
			}

            $data['title'] = 'Sign Up';
            
			$this->form_validation->set_rules('firstName', 'FirstName', 'required');
			$this->form_validation->set_rules('lastName', 'LastName', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);
				// Set message
				$this->session->set_flashdata('flash-success', 'You are now registered and can log in');
				redirect('home');
			}
		}


		// Log in user
		public function login(){
			
			// Check if the user is already logged in.
			if($this->session->userdata('logged_in')){
				redirect('home');
			}

			$data['title'] = 'Login';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				
				
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// CHECKING IN USERS TABLE
				// Login user
				$getres = $this->user_model->login($username, $password);

				if($getres){
					// Create session
					$user_data = array(
						'user_id' => $getres[0],
						'first_name' => $getres[1],
						'last_name' => $getres[2],
						'username' => $username,
						'usertype' => 'manufacturer',
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					// Set message
					$this->session->set_flashdata('flash-success', 'You are now logged in');
					redirect('home');
				} else {

						// CHECKING IN VENDORS TABLE
						// Login admin
						$getres = $this->vendor_model->login($username, $password);
						if($getres){
							// Create session
							$user_data = array(
								'user_id' => $getres[0],
								'first_name' => $getres[1],
								'last_name' => $getres[2],
								'username' => $username,
								'usertype' => 'vendor',
								'logged_in' => true
							);
							$this->session->set_userdata($user_data);
							// Set message
							$this->session->set_flashdata('flash-success', 'You are now logged in');
							redirect('home');
						} else {
							
								// CHECKING IN ADMINS TABLE
								// Login admin
								$getres = $this->admin_model->login($username, $password);
								if($getres){
									// Create session
									$user_data = array(
										'user_id' => $getres[0],
										'first_name' => $getres[1],
										'last_name' => $getres[2],
										'username' => $username,
										'usertype' => 'shadmin',
										'logged_in' => true
									);
									$this->session->set_userdata($user_data);
									// Set message
									$this->session->set_flashdata('flash-success', 'You are now logged in');
									redirect('home');
								} else {
									// Set message
									$this->session->set_flashdata('flash-danger', 'Login is invalid');
									redirect('users/login');
								}
						}	
				}		
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('first_name');
            $this->session->unset_userdata('last_name');
            $this->session->unset_userdata('usertype');
			// Set message
			$this->session->set_flashdata('flash-success', 'You are now logged out');
			redirect('home');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}



		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

		public function userdashboard(){
			
			// Check if the user is not logged in.
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('usertype') === 'manufacturer') {

					$this->user_model->check_active_status();

					$data['title'] = "Manufacturer Dashboard";
					
					$data['addresses_arr'] =$this->user_model->get_address();
					
					$this->load->view('templates/header', $data);
					$this->load->view('users/userdashboard', $data);
					$this->load->view('templates/footer');

				}
				elseif($this->session->userdata('usertype') === 'vendor') {

					$this->vendor_model->check_active_status();

					$data['title'] = "Vendor Dashboard";
					
					$data['addresses_arr'] =$this->user_model->get_address();
					
					$this->load->view('templates/header', $data);
					$this->load->view('vendors/vendordashboard', $data);
					$this->load->view('templates/footer');

				}
				elseif($this->session->userdata('usertype') === 'shadmin') {

					$data['title'] = "Admin Dashboard";
					
					$data['addresses_arr'] =$this->user_model->get_address();
					
					$this->load->view('templates/header', $data);
					$this->load->view('users/userdashboard', $data);
					$this->load->view('templates/footer');

				}

				else{
					redirect('home');
				}
			}

			
		}


		//Add new address
		public function newAddress(){

			$data['addresses_arr'] =$this->user_model->get_address();
			
			// Check if the user is already logged in.
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			elseif(sizeof($data['addresses_arr']) >= 2){
				$this->session->set_flashdata('flash-warning', 'Only can add 2 Address');
				redirect('userdashboard');
			}
			
			$this->user_model->newAddress();
			// Set message
			$this->session->set_flashdata('flash-success', 'You added new Address');
			redirect('userdashboard');
			
		}

		//Delete address
		public function delAddress($address = NULL){

			// Check if the user is already logged in.
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			// No address passed
			elseif($address === NULL){
				$this->session->set_flashdata('flash-warning', 'Non Existing Address');
				redirect('userdashboard');
			}
			//execute code
			else{
				$this->user_model->delAddress($address);
				// Set message
				$this->session->set_flashdata('flash-success', 'You deleted a Address');
				redirect('userdashboard');
			}
			
		}


		//View address before editing
		public function viewAddress($address = NULL){

			// Check if the user is already logged in.
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			// No address passed
			elseif($address === NULL){
				$this->session->set_flashdata('flash-warning', 'Non Existing Address');
				redirect('userdashboard');
			}
			//execute code
			else{
				$data['title'] = "Edit Address";
				$data['address_arr'] =$this->user_model->get_address(1,$address);
				$this->load->view('templates/header', $data);
				$this->load->view('users/viewAddress', $data);
				$this->load->view('templates/footer');
			}
			
		}



		//Edit address
		public function editAddress($address = NULL){

			// Check if the user is already logged in.
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			// No address passed
			elseif($address === NULL){
				$this->session->set_flashdata('flash-warning', 'Non Existing Address');
				redirect('userdashboard');
			}
			//execute code
			else{
				$this->user_model->editAddress($address);
				// Set message
				$this->session->set_flashdata('flash-success', 'You edited a Address');
				redirect('userdashboard');
			}
			
		}


		public function userTenders(){
			
			$data['title'] = "Manage Tenders";

			$data['openTenders'] = $this->tender_model->userTenders("open");
			
			$this->load->view('templates/header', $data);
			$this->load->view('users/userTenders', $data);
			$this->load->view('templates/footer');
		}


		
	}