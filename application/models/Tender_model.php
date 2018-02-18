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

		public function tenderRequest($tenderID){

			// tender request data array
			$data = array(
				'vendor_id' => $this->session->userdata('user_id'),
				'tender_id' => $tenderID,
				'quantity' => $this->input->post('tender_quantity'),
				'quoted_price' => $this->input->post('quoted-price'),
				'delivery_date' => $this->input->post('dod'),
                'req_desc' => $this->input->post('extra_info')
			);
			// Insert tender request
			return $this->db->insert('diff_vendor_req', $data);
		}
        
	}