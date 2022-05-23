<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Konsumen_model extends CI_Model{

		private $_table = "konsumen";



		public $kd_konsumen;

		public $nm_konsumen;

		public $alamat;

		public $kodepos;

		public $kota;

		public $no_hp;

		public $email;

		public $username;

		public $password;

		public $foto;

		public $group;

		



		public function rulesRegister(){

			return[

				['field' => 'username',

				'label' => 'Username',

				'rules' => 'required',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					]                

				],

				

				['field' => 'email',

				'label' => 'Email',

				'rules' => 'required|valid_email',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					'valid_email' => 'Email tidak valid',

					]                

				],

				

				['field' => 'password',

				'label' => 'Password',

				'rules' => 'required|min_length[8]',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					'min_length' => 'Passsword minimal 8 karakter',

					]                

				],

				

				['field' => 'confpassword',

				'label' => 'Password Confirmation',

				'rules' => 'required|matches[password]',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					'matches' => 'Password tidak sama',

					]                

				],

			];

		}



		public function rulesLogin(){

			return[

				['field' => 'username',

				'label' => 'Username',

				'rules' => 'required',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					]                

				],



				['field' => 'password',

				'label' => 'Password',

				'rules' => 'required|min_length[8]',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					'min_length' => 'Passsword minimal 8 karakter',

					]                

				],

			];

		}



		public function rulesUpdate(){

			return[

				['field' => 'username',

				'label' => 'Nama Pengguna',

				'rules' => 'required',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					]                

				],

				

				['field' => 'password',

				'label' => 'Kata Sandi',

				'rules' => 'required|min_length[8]',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					'min_length' => 'Passsword minimal 8 karakter.',

					]                

				],

				

				['field' => 'nm_konsumen',

				'label' => 'Nama Lengkap',

				'rules' => 'alpha_numeric_spaces',

				'errors' =>[

					'alpha_numeric_spaces' => '%s tidak valid.'

					]                       

				],

				

				['field' => 'email',

				'label' => 'Email',

				'rules' => 'required|valid_email',

				'errors' =>[

					'required' => 'Kolom %s harus diisi.',

					'valid_email' => '%s tidak valid',

					]                

				],

				

				

				['field' => 'no_hp',

				'label' => 'Nomer Telp/HP.',

				'rules' => 'numeric',

				'errors' =>[

					'numeric' => '%s harus berisi angka'

					]                

				],

				

				

				['field' => 'kodepos',

				'label' => 'Kode POS',

				'rules' => 'exact_length[5]',

				'errors' =>[

					'exact_length' => '%s harus berisi 5 angka.',

					]                

				],

				

				

				['field' => 'kota',

				'label' => 'Kota',

				'rules' => ''     

				],

				

				

				['field' => 'alamat',

				'label' => 'Alamat',

				'rules' => ''       

				]			

				

			];

		}





		//daftar konsumen

		public function register(){

			$post = $this->input->post();

			$this->kd_konsumen = null;

			$this->username = $post["username"];

			$this->email = $post["email"];

			$this->password = md5($post["password"]);

			$this->group = "2";

			

			$checkEmail = $this->db->get_where($this->_table, ["email" => $this->email]);

			if($checkEmail->num_rows() == 0){

				return $this->db->insert($this->_table, $this);

			}else{

				return false;

			}



		}

		



		//cek login

		public function check_credential(){
			$post = $this->input->post();
			$this->username = $post["username"];
			$this->password = md5($post["password"]);

			$hasil = $this->db->where('username', $this->username)
							->where('password', $this->password)
							->limit(1)
							->get($this->_table);

			if($hasil->num_rows() > 0){
				return $hasil->row();
			} else {
				return array();
			}

		}



		public function getAll(){

			return $this->db->get($this->_table)->result();

		}



		//update profil

		public function getProfile($id=0){

			if($id<1){
				$id = $this->session->userdata('id');
			}

			return $this->db->get_where($this->_table, ["kd_konsumen" => $id])->row();

		}



		public function update(){

			$post = $this->input->post();

			$this->kd_konsumen = $post["id"];

			$this->nm_konsumen = $post["nm_konsumen"];

			$this->alamat = $post["alamat"];

			$this->kodepos = $post["kodepos"];

			$this->kota = $post["kota"];

			$this->no_hp = $post["no_hp"];

			$this->email = $post["email"];

			$this->username = $post["username"];

			$this->password = md5($post["password"]);

			if (!empty($_FILES["image"]["name"])) {

				$this->foto = $this->_uploadImage();

			} else {

				$this->foto = $post["gambar_lama"];

			}

			$this->group = "2";

			return $this->db->update($this->_table, $this, array('kd_konsumen'=>$post['id']));

		}



		private function _uploadImage(){

			$post = $this->input->post();

			$config['upload_path']          = './assets/images';

			$config['allowed_types']        = 'gif|jpg|png';

			$config['file_name']            = 'avatar-'.$this->username;

			$config['overwrite']			= true;

			$config['max_size']             = 5000; // 1MB

			// $config['max_width']            = 1024;

			// $config['max_height']           = 768;

	

			$this->load->library('upload', $config);

	

			if ($this->upload->do_upload('image')) {

				return $this->upload->data("file_name");

			}

			return base_url('upload/profil/').$post["gambar_lama"];

		}





	}

		

?>