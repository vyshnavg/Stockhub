<?php
	class Material_model extends CI_Model{

        public function __construct(){
			$this->load->database();
		}


        public function get_materials($slug = FALSE){

			if($slug === FALSE){

				$this->db->join('material_subcat','material_subcat.subcat_id = raw_material.material_subcat_id');
				
				$query = $this->db->get('raw_material');
				return $query->result_array();
			}
			$this->db->join('material_subcat','material_subcat.subcat_id = raw_material.material_subcat_id');
			$query = $this->db->get_where('raw_material', array('rm_slug' => $slug));
			return $query->row_array();
		}
		
		public function get_homesearch($search){
			$this->db->select("*");
			$this->db->from('raw_material');
			$this->db->join('material_subcat','material_subcat.subcat_id = raw_material.material_subcat_id');

			$this->db->like('rm_name' ,$search);
			$this->db->or_like('subcat_name', $search);
			
			$query = $this->db->get();
			return $query->result();
		}
        
	}