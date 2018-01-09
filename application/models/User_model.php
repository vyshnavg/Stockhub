<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'm_firstname' => $this->input->post('firstName'),
				'm_lastname' => $this->input->post('lastName'),
				'm_email' => $this->input->post('email'),
                'm_username' => $this->input->post('username'),
                'm_password' => $enc_password
			);
			// Insert user
			return $this->db->insert('users', $data);
		}
		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->where('m_username', $username);
			$this->db->where('m_password', $password);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				$getres[0] = $result->row(0)->m_id;
				$getres[1] = $result->row(0)->m_firstname;
				$getres[2] = $result->row(0)->m_lastname;
				return $getres;
			} else {
				return false;
			}
		}
		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('m_username' => $username));
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
			$query = $this->db->get_where('users', array('m_email' => $email));
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

		// Check active status
		public function check_active_status(){
			
			$id = $this->session->userdata('user_id');

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('m_id', $id);
			$this->db->where('m_address_id !=', '');
			$query = $this->db->get();

			if(empty($query->row_array())){

				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('m_id', $id);
				$this->db->where('m_status !=', '');
				$query = $this->db->get();

				if(empty($query->row_array())){
					
					$data = array(
						'm_status' => 'Inactive'
					);

					$this->db->update('users',  $data);
				}

				// Set message
				$this->session->set_flashdata('flash-warning', 'You are currently inactive user. Please add Address Information to be active.');
			}
			else{

				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('m_id', $id);
				$this->db->where('m_status !=', '');
				$query = $this->db->get();

				if(empty($query->row_array())){
					
					$data = array(
						'm_status' => 'Active'
					);

					$this->db->update('users',  $data);
				}
				
			}
		}
	}