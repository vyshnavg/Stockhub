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
            $data['tender'] = $this->tender_model->get_tenders($slug);
            $data['DiffVendorRequests'] = $this->tender_model->get_diffVendorReq($data['tender']['tender_id']);
            $data['transaction'] = $this->tender_model->get_transaction($data['tender']['tender_id']);
            print_r( $data['transaction']);

            if(empty($data['tender'])){
                show_404();
            }

            $data['title'] =$data['tender']['tender_id'];


            $this->load->view('templates/header' , $data);
			$this->load->view('tenders/view', $data);
			$this->load->view('templates/footer');
        }

        public function tenderRequest($tenderID){
            
            // Check if the user is not logged in.
			if(!$this->session->userdata('logged_in')){
                // Set message
                $this->session->set_flashdata('flash-warning', 'Please Log In to continue');
                redirect('users/login');
            }

            //Check if the user is vendor or not
            if($this->session->userdata('usertype') === 'manufacturer'){
                // Set message
                $this->session->set_flashdata('flash-warning', 'Only Vendors can send requests.');
                redirect('home');
            }

            $this->tender_model->tenderRequest($tenderID);
            $this->session->set_flashdata('flash-success', 'Tender Request Send');
			redirect('home');
        }

        public function acptRequests($reqID){
            
            // Check if the user is not logged in.
			if(!$this->session->userdata('logged_in')){
                // Set message
                $this->session->set_flashdata('flash-warning', 'Please Log In to continue');
                redirect('users/login');
            }

            $this->tender_model->acptRequests($reqID);

            $this->session->set_flashdata('flash-success', 'Vendor Request Accepted');
			redirect('users/userTenders');
        }

        public function declRequests($reqID){
            
            // Check if the user is not logged in.
			if(!$this->session->userdata('logged_in')){
                // Set message
                $this->session->set_flashdata('flash-warning', 'Please Log In to continue');
                redirect('users/login');
            }

            $this->tender_model->declRequests($reqID);
            
            $this->session->set_flashdata('flash-success', 'Vendor Request Declined');
			redirect('users/userTenders');
        }
        
	}