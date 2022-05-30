<?php
class M_pos extends CI_Model{
 
    function get_data_barang_bykode($kode){
        $hsl=$this->db->query("SELECT * FROM barang WHERE kode='$kode'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'kode' => $data->kode,
                    'nama_barang' => $data->nama_barang,
                    'harga' => $data->harga,
                    'satuan' => $data->satuan,
                    );
            }
        }
        return $hasil;
    }
 
}