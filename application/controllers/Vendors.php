<?php

	class Vendors extends CI_Controller{

		// Register user
		public function register(){

			// Check if the user is already logged in.
			if($this->session->userdata('logged_in')){
				redirect('home');
			}

            $data['title'] = 'Sign Up for Vendors';
            
			$this->form_validation->set_rules('firstName', 'FirstName', 'required');
			$this->form_validation->set_rules('lastName', 'LastName', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('vendors/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->vendor_model->register($enc_password);
				// Set message
				$this->session->set_flashdata('flash-success', 'You are now registered. Log In to continue');
				redirect('userdashboard');
			}
		}


		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Username is taken');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This e-mail has already been registered');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}


	}