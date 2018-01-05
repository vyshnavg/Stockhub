<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'firstname' => $this->input->post('firstName'),
				'lastname' => $this->input->post('lastName'),
				'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password
			);
			// Insert user
			return $this->db->insert('users', $data);
		}
		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				$getres[0] = $result->row(0)->id;
				$getres[1] = $result->row(0)->firstname;
				$getres[2] = $result->row(0)->lastname;
				return $getres;
			} else {
				return false;
			}
		}
		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				// return false;
				$query = $this->db->get_where('vendors', array('v_username' => $username));
				if(empty($query->row_array())){
					return true;
				} else {
					return false;
				}
			}
		}
		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				// return false;
				$query = $this->db->get_where('vendors', array('v_email' => $username));
				if(empty($query->row_array())){
					return true;
				} else {
					return false;
				}
			}
		}
	}