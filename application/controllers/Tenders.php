<?php

	class Tenders extends CI_Controller{

		public function index(){

            $data['title'] = 'Tenders';

            $data['tenders'] = $this->tender_model->get_tenders();

            print_r( $data['tenders']);
            

            $this->load->view('templates/header', $data);
            $this->load->view('tenders/index', $data);
            $this->load->view('templates/footer');
        }
        



	}