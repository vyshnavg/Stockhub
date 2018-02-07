<?php
	class Vendor_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'v_firstname' => $this->input->post('firstName'),
				'v_lastname' => $this->input->post('lastName'),
				'v_email' => $this->input->post('email'),
                'v_username' => $this->input->post('username'),
                'v_password' => $enc_password
			);
			// Insert user
			return $this->db->insert('vendors', $data);
		}
		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->where('v_username', $username);
			$this->db->where('v_password', $password);
			$result = $this->db->get('vendors');
			if($result->num_rows() == 1){
				$getres[0] = $result->row(0)->v_id;
				$getres[1] = $result->row(0)->v_firstname;
				$getres[2] = $result->row(0)->v_lastname;
				return $getres;
			} else {
				return false;
			}
		}
		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('vendors', array('v_username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		public function get_address(){
			$id = $this->session->userdata('user_id');

			// $this->db->select('m_address_id');
			// $this->db->from('users');
			// $this->db->where('m_id', $id);
			// $query = $this->db->get();

			$this->db->join('address', 'address.add_id = users.m_address_id');
			
			$query = $this->db->get('vendors', array('m_id' => $id));
			return $query->row_array();


		}
	}