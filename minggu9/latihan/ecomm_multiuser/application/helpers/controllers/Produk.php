<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Produk extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		
		$this->load->helper(array('url','download'));
	}
 
	//halaman utama
	public function index()
	{
		$data['products'] = $this->product_model->getAll();
		$this->load->view('user/home', $data);
	}
	
	//halaman pencarian
	public function search()
	{
		$query = $this->input->post('keyword');
		$data['keyword_search'] = $query;
		$data['products'] = $this->product_model->filter($query);
		$this->load->view('user/home', $data);
	}
	
	//halaman detail
	public function detail($id)
	{
		$data['productsDetail'] = $this->product_model->getById($id);
		$data['products'] = $this->product_model->getAll();
		$this->load->view('user/detail', $data);
	}
	
	//fungsi add to cart
	public function add_to_cart($product_id)
	{
		$qty = $this->input->post('qty');
		$product = $this->product_model->getById($product_id);
		$data = array(
					   'id'      => $product->kd_barang,
					   'qty'     => $qty,
					   'price'   => $product->harga,
					   'name'    => $product->nm_barang,
					   'option'	 => array('gambar' => $product->gambar)
					);
 
		$this->cart->insert($data);
		$this->session->set_flashdata('success', '<small>Barang Berhasil Ditambahkan</small>');
		redirect('produk/detail/'.$product_id);
	}
	
	//halaman keranjang
	public function cart(){
		$this->load->view('user/show_cart');
	}

	//menampilkan daftar cart pada tabel
	function show_cart(){
		$output = '';
		$no = 0;
		foreach ($this -> cart -> contents() as $items) {
			$no++;
			$output .= '
				<tr><small>
					<td >'.$no.'</td>
					<td><img src="'.base_url().'assets/images/'.$items['option']['gambar'].'" height="75" class="mx-auto d-block"/></td>
					<td>'.$items['name'].'</td>
					<td>'.$items['qty'].'</td>
					<td class="text-right">Rp. '.number_format($items['price']).'</td>
					<td class="text-right">Rp. '.number_format($items['subtotal']).'</td>
					<td class="text-center" style="width: 10%"> <button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-sm"> Hapus </button> </td>
				</small></tr>
			';
		}
		return $output;
	}

	//refresh ulang
	function load_cart(){
		echo $this -> show_cart();
	}
	
	//fungsi hapus, tambah, kurang jumlah barang
	function hapus_cart(){
		$data = array(
			'rowid' => $this -> input -> post('row_id'),
			'qty' => 0,
		);
		$this -> cart ->update($data);
		echo $this -> show_cart();
	}

	//hapus semua data di keranjang
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}

	//download file 
    public function downloadapp(){				
		redirect(base_url('assets/apk/kampung-anggrek.apk'));
	}
}