<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Register extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('konsumen_model');
		}
		public function index(){
			$validation = $this->form_validation;
        	$validation->set_rules($this->konsumen_model->rulesRegister());
			if($validation->run()){
				$success = $this->konsumen_model->register();
				if($success){
					$this->session->set_flashdata('success', 'Pendaftaran Berhasil');
					redirect(current_url());
				}
				$this->session->set_flashdata('error', 'Maaf, Email sudah digunakan');
			}
			$this->load->view('user/form_regis');
		}
		public function member(){
			
			$this->load->view('user/form_regis');
		}
		public function tambah(){
			$this->load->view('form_login');
		}
	}
?>