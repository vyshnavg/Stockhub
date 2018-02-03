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
		$query = $this->db->get_where('tender', array('tender_id' => $id));
		return $query->row_array();
	}


        
}