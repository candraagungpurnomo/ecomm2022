<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		
		$this->load->model('konsumen_model');
		$validation = $this->form_validation;
        $validation->set_rules($this->konsumen_model->rulesLogin());
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_login');
		} else {
			$valid_user = $this->konsumen_model->check_credential();
			
			if($valid_user == FALSE)
			{
				$this->session->set_flashdata('error','Username atau Password salah');
				$this->load->view('form_login');
			} else {
				// if the username and password is a match
				$this->session->set_userdata('id', $valid_user->kd_konsumen);
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('group', $valid_user->group);
				
				switch($valid_user->group){
					case 1 : //admin
								redirect('admin/produk'); 
								break;
					case 2 : //member
								redirect(base_url());
								break;
					default: break; 
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}