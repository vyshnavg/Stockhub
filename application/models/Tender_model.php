<?php
	class  Tender_model extends CI_Model{

        public function __construct(){
			$this->load->database();
        }
        
        public function get_tenders($id = FALSE){
		
			$this->db->join('raw_material','raw_material.raw_material_id = tender.raw_material_id');
			
			if($id === FALSE){
				$query = $this->db->get('tender');
				return $query->result_array();
			}

			$this->db->join('manufacturers','manufacturers.m_id = tender.m_id');
			$this->db->join('material_subcat','material_subcat.subcat_id = raw_material.material_subcat_id');
			$query = $this->db->get_where('tender', array('tender_id' => $id));
			return $query->row_array();
		}

		public function get_diffVendorReq($id){
		
			//$this->db->join('tender','diff_vendor_req.tender_id = tender.tender_id');
			$this->db->join('vendors','vendors.v_id = diff_vendor_req.vendor_id');
			$query = $this->db->get_where('diff_vendor_req', array('tender_id' => $id));
			return $query->result_array();
		}

		public function get_transaction($id){
			$this->db->join('diff_vendor_req','diff_vendor_req.request_id = transaction.diff_vendor_reqid');
			$query = $this->db->get_where('transaction', array('tender_created_id' => $id));
			return $query->row_array();
		}

		public function tenderRequest($tenderID){

			// tender request data array
			$data = array(
				'vendor_id' => $this->session->userdata('user_id'),
				'tender_id' => $tenderID,
				'quantity' => $this->input->post('tender_quantity'),
				'quantity_unit' => $this->input->post('tender_quantity_unit'),
				'quoted_price' => $this->input->post('quoted-price'),
				'delivery_date' => $this->input->post('dod'),
				'req_desc' => $this->input->post('extra_info'),
				'req_status' => 'pending'
			);
			// Insert tender request
			return $this->db->insert('diff_vendor_req', $data);
		}


		public function userTenders($passValue){
			
			$id = $this->session->userdata('user_id');

			$this->db->join('raw_material','raw_material.raw_material_id = tender.raw_material_id');
			$this->db->where('m_id', $id);
			$query = $this->db->get_where('tender', array('tender_status' => $passValue));
			return $query->result_array();
		
		}

		public function checkExpiryStatus(){

			$this->db->select('*');
			$this->db->from('tender');
			$query = $this->db->get();

			$tenders = $query->result_array();

			foreach($tenders as $tender){
				if($tender["tender_status"] === "active" ){
					$expdate = $tender['date_expire'];
					$exptime = $tender['time_expire'];
					$exp = date('Y-m-d H:i:s', strtotime("$expdate $exptime "));
					$datetime1 = new DateTime();
					$datetime2 = new DateTime($exp);
					if ( $datetime1 >  $datetime2){
						$data = array(
							'tender_status' => "expired"
						);
						$this->db->update('tender', $data, array('tender_id' => $tender['tender_id']));
					}
				}
			}


		}

		public function acptRequests($reqID){
			$data = array(
				'req_status' => "accepted"
			);
			$this->db->update('diff_vendor_req', $data, array('request_id' => $reqID));

			//convert the active tender to ongoing tender
			$this->db->select('*');
			$this->db->from('diff_vendor_req');
			$this->db->where('request_id', $reqID);
			$query = $this->db->get();
			$tender_id = $query->row_array();

			$data = array(
				'tender_status' => "ongoing"
			);
			$this->db->update('tender', $data, array('tender_id' => $tender_id["tender_id"] ));

			//putting the tender to transaction table
			$data2 = array(
				'diff_vendor_reqid' => $reqID,
				'start_date' => date("Y-m-d"),
				'start_time' => date("H:i"),
				'delvy_date' => $tender_id["delivery_date"],
				'delvy_time' => date("H:i"),
				'trans_status' => 'orderConfirmed',
			);
			return $this->db->insert('transaction', $data2);
		}


		public function declRequests($reqID){
			$data = array(
				'req_status' => "declined"
			);
			$this->db->update('diff_vendor_req', $data, array('request_id' => $reqID));
		}



        
	}