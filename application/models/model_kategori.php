<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getKategori(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $get = $this->db->get();
        return $get->result_array();
    }

    public function data_pakaian_pria(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->where('kategori','pakaian pria');
        $get = $this->db->get();
        return $get->result_array();
        #return $this->db->get_where('tbl_barang',array('kategori' => 'pakaian pria'));
    }

    public function data_pakaian_wanita(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->where('kategori','pakaian wanita');
        $get = $this->db->get();
        return $get->result_array();
        #return $this->db->get_where('tbl_barang',array('kategori' => 'pakaian wanita'));
    }

    public function data_pakaian_anak(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->where('kategori','pakaian anak');
        $get = $this->db->get();
        return $get->result_array();
        #return $this->db->get_where('tbl_barang',array('kategori' => 'pakaian anak'));
    }

    public function data_elektronik(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->where('kategori','elektronik');
        $get = $this->db->get();
        return $get->result_array();
        #return $this->db->get_where('tbl_barang',array('kategori' => 'elektronik'));
    }

    public function data_kebutuhan_pokok(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->where('kategori','kebutuhan pokok');
        $get = $this->db->get();
        return $get->result_array();
        #return $this->db->get_where('tbl_barang',array('kategori' => 'kebutuhan pokok'));
    }

    public function data_kesehatan(){
        $this->db->select("*");
        $this->db->from('tbl_barang');
        $this->db->where('status_acc','setuju');
        $this->db->where('kategori','kesehatan');
        $get = $this->db->get();
        return $get->result_array();
        #return $this->db->get_where('tbl_barang',array('kategori' => 'kesehatan'));
    }
}