<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_invoice extends CI_Model {
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        
        $invoice = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
        );
        $this->db->insert('tbl_invoice', $invoice);
        $id_invoice = $this->db->insert_id();
        
        foreach ($this->cart->contents() as $item){
            $data = array(
                'id_invoice' => $id_invoice,
                'id_brg' => $item['id'],
                'nama_brg' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price']
            );
            $this->db->insert('tbl_pesanan', $data);
        }
        return TRUE;
    }

    public function tampil_data(){
        $result = $this->db->get('tbl_invoice');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function ambil_id_invoice($id_invoice){
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tbl_invoice');
        if($result->num_rows()>0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function ambil_id_pesanan($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->get('tbl_pesanan');
        if($result->num_rows()>0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function total_invoice(){
        return $this->db->get('tbl_invoice')->num_rows();
    }

}