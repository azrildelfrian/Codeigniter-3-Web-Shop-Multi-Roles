<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function pakaian_pria(){
        $data['pakaian_pria'] = $this->model_kategori->data_pakaian_pria();
        #$data['pakaian_pria'] = $this->model_kategori->data_pakaian_pria()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/pakaian_pria', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_wanita(){
        $data['pakaian_wanita'] = $this->model_kategori->data_pakaian_wanita();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/pakaian_wanita', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_anak(){
        $data['pakaian_anak'] = $this->model_kategori->data_pakaian_anak();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/pakaian_anak', $data);
        $this->load->view('templates/footer');
    }

    public function elektronik(){
        $data['elektronik'] = $this->model_kategori->data_elektronik();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/elektronik', $data);
        $this->load->view('templates/footer');
    }

    public function kebutuhan_pokok(){
        $data['kebutuhan_pokok'] = $this->model_kategori->data_kebutuhan_pokok();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/kebutuhan_pokok', $data);
        $this->load->view('templates/footer');
    }

    public function kesehatan(){
        $data['kesehatan'] = $this->model_kategori->data_kesehatan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/kesehatan', $data);
        $this->load->view('templates/footer');
    }

    public function kontak(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/kontak');
        $this->load->view('templates/footer');
    }

    public function klien(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/klien');
        $this->load->view('templates/footer');
    }

    public function aboutus(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/aboutus');
        $this->load->view('templates/footer');
    }
}

?>