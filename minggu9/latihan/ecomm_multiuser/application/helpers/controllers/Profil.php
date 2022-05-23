<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Profil extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('konsumen_model');
		}
		public function index(){
			$validation = $this->form_validation;
			$validation->set_rules($this->konsumen_model->rulesUpdate());
			
			if($validation->run()){
				$this->konsumen_model->update();
				$this->session->set_flashdata('success', 'Data Berhasil Diperbarui');
				redirect(current_url());
			}else{
				$this->session->set_flashdata('Error', 'Data Gagal Diperbarui');
			}

			$data['konsumenDetail'] = $this->konsumen_model->getProfile();
			$this->load->view('user/update_profil', $data);
		}			

	}
?>