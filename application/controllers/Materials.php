<?php
	class Materials extends CI_Controller{

		public function index(){
            $data['title'] = 'Materials';

            $data['materials'] = $this->material_model->get_materials();
            $data['categorys'] = $this->material_model->get_categorys();
            
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

        public function tenderOpen($slug = NULL){

            // Check if the user is not logged in.
			if(!$this->session->userdata('logged_in')){
                // Set message
                $this->session->set_flashdata('flash-warning', 'Please Log In to continue');
                redirect('users/login');
            }
            
            $quary = $this->user_model->check_active_status("ADFDSF");

            if(!$quary){
                // Set message
                $this->session->set_flashdata('flash-warning', 'Please be Active user');
                redirect('home');
            }
            

            $data['material'] =$this ->material_model->get_materials($slug);

            if(empty($data['material'])){
                show_404();
            }

            $data['material_title'] =$data['material']['rm_name'];
            $data['slug'] =$slug;
            $data['title'] = 'Create a Tender';

            $data['addresses_arr'] =$this->user_model->get_address();
            
            $this->load->view('templates/header' , $data);
			$this->load->view('materials/tenderOpen', $data);
			$this->load->view('templates/footer');
        }

        public function homesearch(){
			$search=  $this->input->post('search');
            $query = $this->material_model->get_homesearch($search);
            // print_r(json_encode($query));
			echo json_encode ($query);
		}
        
        public function tenderRegister($slug = NULL){
			// Check if the user is already logged in.
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}

            $data['title'] = 'Create a Tender';

            $data['material'] =$this->material_model->get_materials($slug);

            if(empty($data['material'])){
                show_404();
            }

            $material_id =$data['material']['raw_material_id'];
            
            $this->material_model->tenderRegister($material_id);
            // Set message
            $this->session->set_flashdata('flash-success', 'Created a Tender');
            redirect('home');
		}
	}