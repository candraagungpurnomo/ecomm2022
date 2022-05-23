<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Anda Bukan Admin!');
			redirect('login');
		}
        $this->load->model("product_model");
    }

    public function index(){
        $data["products"] = $this->product_model->getAll();
        $this->load->view("admin/product/list",$data);
    }

    public function Tambah(){
        $validation = $this->form_validation;
        $validation->set_rules($this->product_model->rules());

        if($validation->run()){
            $this->product_model->save();
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
            redirect(current_url());
        }
        $this->load->view("admin/product/new_form");
    }
    
    public function edit($id = null){
        if(!isset($id)) redirect('admin/products');

        $validation = $this->form_validation;
        $validation->set_rules($this->product_model->rules());

        if($validation->run()){
            $this->product_model->update();
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
        }

        $data["product"] = $this->product_model->getById($id);
        if(!$data["product"]) show_404();

        $this->load->view("admin/product/edit_form", $data);
    }

    public function hapus($id = null){
        if(!isset($id)) show_404();

        if($this->product_model->delete($id)){
            redirect(site_url('admin/produk'));
        }
    }

}
?>