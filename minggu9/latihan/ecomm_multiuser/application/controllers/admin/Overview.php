<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("admin/overview");
	}
}