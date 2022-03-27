<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Upload_model');
    }
    
    public function index()
    {
        $data['uploads'] = $this->Upload_model->get_all();
        $this->load->view('upload/upload_list', $data);
    }

    public function add()
    {
        $this->load->view('upload/upload_create');
    }
    
    public function create()
    {
        $data = array(
            'author' => $this->input->post('author'),
        );
        
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $data['image'] = $image;
        }
        
        $this->Upload_model->insert($data);
        redirect('', $data);
    }

    public function edit($id)
    {
        $data['upload'] = $this->Upload_model->get_by_id($id);
        $this->load->view('upload/upload_update', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $author = $this->input->post('author');

        $data = array(
            'author' => $author,
        );

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();

            $upload = $this->Upload_model->get_by_id($id);
            if (file_exists('assets/upload/images/'.$upload->image) && $upload->image) {
                unlink('assets/upload/images/'.$upload->image);
            }

            $data['image'] = $image;
        }

        $this->Upload_model->update($data, $id);
        redirect('');
    }

    private function _do_upload()
    {
        $image_name = time().'-'.$_FILES["image"]['name'];

        $config['upload_path'] 		= 'assets/upload/images/';
        $config['allowed_types'] 	= 'gif|jpg|png';
        $config['max_size'] 		= 100;
        $config['max_widht'] 		= 1000;
        $config['max_height']  		= 1000;
        $config['file_name'] 		= $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }

    public function detail($id)
    {
        $data['upload'] = $this->Upload_model->get_by_id($id);
        $this->load->view('upload/upload_detail', $data);
    }
        
    public function delete($id)
    {
        $upload = $this->Upload_model->get_by_id($id);
        if (file_exists('assets/upload/images/'.$upload->image) && $upload->image) {
            unlink('assets/upload/images/'.$upload->image);
        }
        $this->Upload_model->delete($id);
        redirect('');
    }
}

/* End of file Upload.php */
