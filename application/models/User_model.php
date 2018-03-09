<?php
	class User_model extends CI_Model{
		public function register($enc_password){

			$this->db->select('m_id');
			$this->db->from('manufacturers');
			$query = $this->db->get();

			// print_r( $query->result_array());
			$checker = 0;
			foreach( $query->result_array() as $result):
				// print_r($result["id"]);
				// $len = strlen($result["id"]);
				$num= substr($result["m_id"], 1, strlen($result["m_id"]));
				if($checker < $num ):
					$checker = $num;
				endif;
			endforeach;

			$checker++;
			$idCreated = "M".$checker;

			// User data array
			$data = array(
				'm_id' => $idCreated,
				'm_firstname' => $this->input->post('firstName'),
				'm_lastname' => $this->input->post('lastName'),
				'm_email' => $this->input->post('email'),
                'm_username' => $this->input->post('username'),
                'm_password' => $enc_password
			);
			// Insert user
			return $this->db->insert('manufacturers', $data);
		}
		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->where('m_username', $username);
			$this->db->where('m_password', $password);
			$result = $this->db->get('manufacturers');
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
			$query = $this->db->get_where('manufacturers', array('m_username' => $username));
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
			$query = $this->db->get_where('manufacturers', array('m_email' => $email));
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

		public function get_address($choice = 0,$value = NULL){
			
			//ALL ADDRESS UNDER A USER ID
			if($choice === 0){
				$id = $this->session->userdata('user_id');

				if($this->session->userdata('usertype') === 'vendor'){
					$this->db->join('address', 'address.add_id = vendors.v_address_id');
					$query = $this->db->get_where('vendors', array('v_id' => $id));
					return $query->result_array();
				}
				else{
					$this->db->join('address', 'address.add_id = m_address_dict.add_id');
					$query = $this->db->get_where('m_address_dict', array('manufacturer_id' => $id));
					return $query->result_array();
				}
			}

			//WHEN HAVING A ADD_ID AND WANT ALL INFO
			elseif($choice === 1 and $value != NULL){
				$query = $this->db->get_where('address', array('add_id' => $value));
				return $query->row_array();
			}

		}

		// Check active status
		public function check_active_status($return = FALSE){
			if($return === FALSE){
				$id = $this->session->userdata('user_id');

				$this->db->join('m_address_dict','m_address_dict.manufacturer_id = manufacturers.m_id');
				$this->db->select('*');
				$this->db->from('manufacturers');
				$this->db->where('manufacturer_id', $id);
				// $this->db->where('m_address_id !=', '');
				$query = $this->db->get();
				
	
				if(empty($query->row_array())){

					$this->db->join('m_address_dict','m_address_dict.manufacturer_id = manufacturers.m_id');
					$this->db->select('*');
					$this->db->from('manufacturers');
					$this->db->where('m_id', $id);
					// $this->db->where('m_status !=', '');
					$query = $this->db->get();
	
					if(empty($query->row_array())){
						
						$data = array(
							'm_status' => 'Inactive'
						);
	
						$this->db->update('manufacturers',  $data);
					}
	
					// Set message
					$this->session->set_flashdata('flash-warning', 'You are not an Active User. Add an address in your dashboard');
				}
				else{

					$this->db->join('m_address_dict','m_address_dict.manufacturer_id = manufacturers.m_id');
					$this->db->select('m_status');
					$this->db->from('manufacturers');
					$this->db->where('m_id', $id);
					$query = $this->db->get();
	
					if($query->row_array()['m_status'] == 'Inactive'){
						$this->db->set('m_status', 'Active');
						$this->db->where('m_id', $id);
						$this->db->update('manufacturers');
					}
					
				}
			}
			else{
				$id = $this->session->userdata('user_id');
				$this->db->select('m_status');
				$this->db->from('manufacturers');
				$this->db->where('m_id', $id);
				$query = $this->db->get();

				if($query->row_array()['m_status'] === 'Inactive'){
					return FALSE;
				}
				return TRUE;
				
			}

		}

		public function newAddress(){
			// address data array
			$data = array(
				'state' => $this->input->post('listBox'),
				'city' => $this->input->post('secondlist'),
				'street' => $this->input->post('street'),
                'building_no' => $this->input->post('buildno'),
				'land_mark' => $this->input->post('landmark'),
				'pincode' => $this->input->post('pincode'),
				'country' => $this->input->post('country')
			);
			// Insert address
			$this->db->insert('address', $data);

			$insert_id = $this->db->insert_id();

			$newdata = array(
				'manufacturer_id' => $this->session->userdata('user_id'),
				'add_id' => $insert_id
			);
			// Insert address dict
			return $this->db->insert('m_address_dict', $newdata);
		}



		public function delAddress($data){
			// Delete address
			$this->db->delete('m_address_dict', array('add_id' => $data));
			return $this->db->delete('address', array('add_id' => $data));
		}

		public function editAddress($address_id){
			// address data array
			$data = array(
				'state' => $this->input->post('listBox'),
				'city' => $this->input->post('secondlist'),
				'street' => $this->input->post('street'),
                'building_no' => $this->input->post('buildno'),
				'land_mark' => $this->input->post('landmark'),
				'pincode' => $this->input->post('pincode'),
				'country' => $this->input->post('country')
			);
			// Edit address
			$this->db->where('add_id', $address_id);
			return $this->db->update('address', $data);
		}


	}