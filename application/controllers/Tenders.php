<?php

	class Tenders extends CI_Controller{

		public function index(){

            $data['title'] = 'Tenders';

            $data['tenders'] = $this->tender_model->get_tenders();
            

            $this->load->view('templates/header', $data);
            $this->load->view('tenders/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['tender'] =$this ->tender_model->get_tenders($slug);

            if(empty($data['tender'])){
                show_404();
            }

            $data['title'] =$data['tender']['tender_id'];

            $this->load->view('templates/header' , $data);
			$this->load->view('tenders/view', $data);
			$this->load->view('templates/footer');
        }

        public function tenderRequest($tenderID){

            
            
        }
        



	}