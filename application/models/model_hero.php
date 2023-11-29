<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_hero extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getHero(){
        $this->db->select("*");
        $this->db->from('hero_unit');
        $this->db->where('status_acc','setuju');
        #$get = $this->db->get();
        #return $get->result_array();
        return $this->db->get();
    }

    public function tampil_data()
    {
        return $this->db->get('hero_unit');
    }

    public function tambah_hero($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function edit_hero($where,$table)
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
    
    public function total_hero(){
        return $this->db->get('hero_unit')->num_rows();
    }
}
?>