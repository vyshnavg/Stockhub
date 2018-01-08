<?php
	class Materials extends CI_Controller{

		public function index(){
            $data['title'] = 'Materials';

            $data['materials'] = $this->material_model->get_materials();
            
            $this->load->view('templates/header' , $data);
			$this->load->view('materials/index', $data);
			$this->load->view('templates/footer');
            
        }

        public function view($slug = NULL){
            $data['material'] =$this ->material_model->get_materials($slug);

            if(empty($data['material'])){
                show_404();
            }

            $data['title'] =$data['material']['rm_name'];

            $this->load->view('templates/header' , $data);
			$this->load->view('materials/view', $data);
			$this->load->view('templates/footer');
        }

        public function tenderOpen(){
            // $data['material'] =$this ->material_model->get_materials($slug);

            // if(empty($data['material'])){
            //     show_404();
            // }

            // $data['title'] =$data['material']['rm_name'];
            $data['title'] = 'tenderOpen';

            $this->load->view('templates/header' , $data);
			$this->load->view('materials/tenderOpen', $data);
			$this->load->view('templates/footer');
        }
        
	}