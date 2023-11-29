<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role_id') != '3'){
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Pengguna</strong> Wajib Login Terlebih Dahulu! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login');
        }
    }


    public function tambah_dikeranjang($id){
        $barang = $this->model_barang->find($id);

        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg,
    );
    
    $this->cart->insert($data);
    redirect('welcome');
    }

    public function detail_keranjang(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang(){
        $this->cart->destroy();
        redirect('dashboard/detail_keranjang');
    }

    public function bayar(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('bayar');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan(){
        $is_processed = $this->model_invoice->index();
        if($is_processed){
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        }else{
            echo "Maaf, pesanan anda gagal diproses";
        }
    }

    public function hapus_item($no){
        redirect('dashboard/detail_keranjang');
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->get_keyword($keyword);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
    }
}