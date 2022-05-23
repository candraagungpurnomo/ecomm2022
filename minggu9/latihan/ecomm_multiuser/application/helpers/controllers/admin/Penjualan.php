<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Anda Bukan Admin!');
			redirect('login');
		}
		
		//load model -> model_products
		$this->load->model('orders_model');
	}
	
	public function index()
	{
		$data['invoices'] = $this->orders_model->all();
		$this->load->view('admin/invoices/view_invoices', $data);
	}

    public function detail($id=null)
    {
		if(!isset($id)) redirect('admin/penjualan');
        $data['orders']  = $this->orders_model->get_detail_by_id($id);
		$this->load->view('admin/invoices/view_invoice_detail', $data);
    }
}