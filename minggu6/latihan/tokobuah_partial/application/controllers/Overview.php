<?php
class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        // load view admin/overview.php
        $this->load->view('admin/partial/header');
        $this->load->view('admin/partial/sidebar');
        $this->load->view('admin/partial/topbar');
        $this->load->view('admin/overview');
        $this->load->view('admin/partial/footer');
    }
}
