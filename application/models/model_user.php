<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function total_user(){
        $this->db->select("*");
        $this->db->from('tbl_user');
        $this->db->where('role_id', '3');
        return $this->db->get()->num_rows();
    }
}