<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    //cetak daftar produk
    function index(){
        $pdf = new FPDF('P', 'mm','Letter');
        // membuat halaman baru
        $pdf->AddPage();
        // Judul 
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DAFTAR PRODUK',0,1,'C');
        $pdf->Cell(10,7,'',0,1); 

        //tabel header
        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(100,6,'Kode Barang',1,0,'C');
        $pdf->Cell(100,6,'Nama Barang',1,0,'C');
        $pdf->Cell(30,6,'Satuan',1,0,'C');
        $pdf->Cell(35,6,'Harga Beli',1,0,'C');
        $pdf->Cell(35,6,'Harga Jual',1,0,'C');
        $pdf->Cell(15,6,'Stok',1,0,'C'); 
        $pdf->Cell(15,6,'Stok Min.',1,1,'C'); 

        $pdf->SetFont('Arial','',10);
        $barang = $this->db->get('barang')->result();  //mengambil data dari tabel barang
        $no=0;
        foreach ($barang as $data){
        $no++;
        $pdf->Cell(8,6,$no,1,0);
        $pdf->Cell(10,6,$data->kd_barang,1,0);          //field kode barang
        $pdf->Cell(100,6,$data->nm_barang,1,0);          //field nama barang
        $pdf->Cell(100,6,$data->satuan,1,0);          //field satuan
        $pdf->Cell(35,6,"Rp ".number_format($data->harga_beli, 0, ".", "."),1,0,'R');        //field harga beli
        $pdf->Cell(35,6,"Rp ".number_format($data->harga, 0, ".", "."),1,0,'R');        //field harga jual
        $pdf->Cell(15,6,$data->stok,1,0);      //field  Stok
        $pdf->Cell(15,6,$data->stok_min,1,1);      //field  Stok minimal

        }
        $pdf->Output(); 
    }

    //untuk cetak nota
    function nota(){
        $pdf = new FPDF('P', 'mm','Letter');
        $pdf->AddPage();
        $image="assets/images/logo.png";
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell( 40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
        $pdf->Cell(0,4,'',0,1,'C');
        $pdf->Cell(0,7,'Invoices',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(0,4,'Kampung Anggrek - Purwosari, Kec. Mijen, Kota Semarang, Jawa Tengah',0,1,'C');
        $pdf->Cell(0,4,'(+62 857-4222-3710)',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(100,7,'Konsumen',0,0);
        $pdf->Cell(25,7,'',0,0);
        $pdf->Cell(100,7,'Konsumen',0,0);
        $pdf->Cell(25,7,'',0,0);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(100,6,'Nama Barang',1,0,'C');
        $pdf->Cell(35,6,'Harga',1,0,'R');
        $pdf->Cell(20,6,'Qty',1,0,'R');
        $pdf->Cell(35,6,'SubTotal',1,1,'R');
        $pdf->SetFont('Arial','',10);
        $no=0;$subtot=0;$tot=0;
        foreach ($this->cart->contents() as $data) :
        $no++;
        $pdf->Cell(8,6,$no,1,0);
        $pdf->Cell(100,6,$data['name'],1,0);
        $pdf->Cell(35,6,"Rp".number_format($data['price'], 0, ".", "."),1,0,'R');
        $pdf->Cell(20,6,$data['qty'],1,0,'R');
        $pdf->Cell(35,6,"Rp".number_format($data['subtotal'], 0, ".","."),1,1,'R');
        //}
        endforeach;
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(163,6,"Total",1,0,'R');
        $pdf->Cell(35,6,"Rp ".number_format($this->cart->total(), 0, ".", "."),1,1,'R');
        
        $pdf->Output();
        }
} 
?>