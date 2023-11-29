<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getBarang(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        #$get = $this->db->get();
        #return $get->result_array();
        return $this->db->get();
    }

    public function tampil_data()
    {
        return $this->db->get('tbl_barang');
    }

    public function tambah_barang($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function edit_barang($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id){
        $result = $this->db->where('id_brg',$id)
                           ->limit(1)
                           ->get('tbl_barang');
        if($result->num_rows()>0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function detail_brg($id_brg){
        $result = $this->db->where('id_brg',$id_brg)->get('tbl_barang');
        if($result->num_rows()>0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function get_keyword($keyword){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        #$get = $this->db->get();
        #return $get->result_array();
        return $this->db->get()->result();
    }

    public function get_filter($nama_brg,$kategori){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->like('nama_brg', $nama_brg);
        $this->db->where('kategori', $kategori);
        
        #$get = $this->db->get();
        #return $get->result_array();
        return $this->db->get()->result();
    }

    public function filterharga($kategori,$hargamin,$hargamax){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->like('kategori', $kategori);
        $this->db->where('harga >=', $hargamin);
        $this->db->where('harga <=', $hargamax);
        return $this->db->get()->result();
    }

    public function total_barang(){
        return $this->db->get('tbl_barang')->num_rows();
    }

    public function total_kategori(){
        $this->db->select("kategori");
        $this->db->from('tbl_barang');
        return $this->db->get()->num_rows();
    }

    public function filter_admin($nama,$kategori,$harga){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        if ($nama == 'ASC'){
            $this->db->order_by('nama_brg', 'ASC');
        }else{
            $this->db->order_by('nama_brg', 'DESC');
        }
        if ($harga == 'ASC'){
            $this->db->order_by('harga', 'ASC');
        }else{
            $this->db->order_by('harga', 'DESC');
        }
        $this->db->where('kategori', $kategori);
        
        #$get = $this->db->get();
        #return $get->result_array();
        return $this->db->get()->result();
    }
}