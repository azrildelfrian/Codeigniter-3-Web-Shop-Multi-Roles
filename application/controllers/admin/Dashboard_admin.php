<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '2'){
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Jika Anda Admin, Anda Wajib Login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login');
        }
    }

    public function index()
    {
        $data['total_barang'] = $this->model_barang->total_barang('tbl_barang');
        $data['total_invoice'] = $this->model_invoice->total_invoice('tbl_invoice');
        $data['total_hero'] = $this->model_hero->total_hero('hero_unit');
        $data['total_user'] = $this->model_user->total_user('tbl_user');
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}