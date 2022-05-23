<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Konsumen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Anda Bukan Admin!');
			redirect('login');
		}
		$this->load->model('konsumen_model');
	}
	public function index()
	{
		$data['users'] = $this->konsumen_model->getAll();
		$this->load->view('admin/users', $data);
	}
    public function detail($id=null)
    {
		if(!isset($id)) redirect('admin/penjualan');
        $data['orders']  = $this->konsumen_model->get_detail_by_id($id);
		$this->load->view('admin/invoices/view_invoice_detail', $data);
    }
}