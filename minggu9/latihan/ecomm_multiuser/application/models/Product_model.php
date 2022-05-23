<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    private $_table = "barang";



    public $kd_barang;

    public $nm_barang;

    public $satuan;

    public $deskripsi;

    public $harga;

    public $harga_beli;

    public $stok;

    public $stok_min;

    public $gambar = "default.jpg";



    public function rules(){

        return[

            ['field' => 'nama',

            'label' => 'Nama',

            'rules' => 'required',

            'errors' =>[

                'required' => 'Kolom %s harus diisi.',

                ]                

            ],



            ['field' => 'hargabeli',

            'label' => 'Harga Beli',

            'rules' => 'required|numeric',

            'errors' =>[

                'required' => 'Kolom %s harus diisi.',

                ]                

            ],

            

            ['field' => 'harga',

            'label' => 'Harga Jual',

            'rules' => 'required|numeric|greater_than['.$this->input->post('hargabeli').']',

            'errors' =>[

                'required' => 'Kolom %s harus diisi.',

                'greater_than' => '{field} harus lebih besar dari Harga Beli ({param}).',

                ]                

            ],

            

            ['field' => 'satuan',

            'label' => 'Satuan',

            'rules' => 'required',

            'errors' =>[

                'required' => 'Kolom %s harus diisi.',

                ] 

            ],



            ['field' => 'stok',

            'label' => 'Stok Produk',

            'rules' => 'required|numeric',

            'errors' =>[

                'required' => 'Kolom %s harus diisi.',

                ]                

            ],

            

            ['field' => 'stokmin',

            'label' => 'Stok Minimal',

            'rules' => 'required|numeric',

            'errors' =>[

                'required' => 'Kolom %s harus diisi.',

                ]                

            ],

        ];

    }



    public function getAll(){

        return $this->db->get($this->_table)->result();

    }

    public function getBestSale()
    {
        $this->db->select('`kd_barang`, `nm_barang`, `satuan`, `deskripsi`, `harga`, `harga_beli`, `stok`, `stok_min`, `gambar`, sum(`jml_brg`)')
                ->from('barang')
                ->join('detail_penjualan','detail_penjualan.kd_brg=barang.kd_barang')
                ->group_by('kd_barang')
                ->limit(6)
                ->order_by('sum(`jml_brg`)', 'DESC');
        
        return $this->db->get()->result();
    }
    

    public function filter($query){

        $this->db->select('*');

        $this->db->from($this->_table);

        $this->db->like('nm_barang', $query, 'both');

        return $this->db->get()->result();

    }



    public function getById($id){

        return $this->db->get_where($this->_table, ["kd_barang" => $id])->row();

    }



    public function save(){

        $post = $this->input->post();

        $this->kd_barang = null;

        $this->nm_barang = $post["nama"];

        $this->satuan = $post["satuan"];

        $this->harga = $post["harga"];

        $this->harga_beli = $post["hargabeli"];

        $this->stok = $post["stok"];

        $this->stok_min = $post["stokmin"];

        $this->deskripsi = $post["deskripsi"];

        $this->gambar = $this->_uploadImage();

        return $this->db->insert($this->_table, $this);

    }

    

    public function update(){

        $post = $this->input->post();

        $this->kd_barang = $post["id"];

        $this->nm_barang = $post["nama"];

        $this->satuan = $post["satuan"];

        $this->harga = $post["harga"];

        $this->harga_beli = $post["hargabeli"];

        $this->stok = $post["stok"];

        $this->stok_min = $post["stokmin"];

        $this->deskripsi = $post["deskripsi"];

        if (!empty($_FILES["image"]["name"])) {

            $this->gambar = $this->_uploadImage();

        } else {

            $this->gambar = $post["gambar_lama"];

        }

        return $this->db->update($this->_table, $this, array('kd_barang'=>$post['id']));

    }

    

    public function delete($id){

        $this->_deleteImage($id);

        return $this->db->delete($this->_table, array('kd_barang'=>$id));

    }



    private function _uploadImage(){

        $config['upload_path']          = './assets/images';

        $config['allowed_types']        = 'gif|jpg|png';

        $config['file_name']            = 'foto-'.$this->nm_barang;

        $config['overwrite']			= true;

        $config['max_size']             = 5000; // 1MB

        // $config['max_width']            = 1024;

        // $config['max_height']           = 768;



        $this->load->library('upload', $config);



        if ($this->upload->do_upload('image')) {

            return $this->upload->data("file_name");

        }

        return "default.jpg";

    }



    private function _deleteImage($id){

        $product = $this->getById($id);

        if ($product->gambar != "default.jpg") {

            $filename = explode(".", $product->gambar)[0];

            return array_map('unlink', glob(FCPATH."/assets/images/$filename.*"));

        }

    }

}

?>