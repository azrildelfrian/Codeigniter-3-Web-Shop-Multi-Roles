<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
    {
        #$data['hero'] = $this->model_hero->getHero();
		$data['hero'] = $this->model_hero->getHero()->result();
		#$data['barang'] = $this->model_barang->getBarang();
        $data['barang'] = $this->model_barang->getBarang()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('carousel', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

	public function detail($id_brg){
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang',$data);
        $this->load->view('templates/footer');
    }

	public function search(){
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->get_keyword($keyword);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
    }

    public function filter(){
        $nama_brg = $this->input->post('nama_brg');
        $kategori = $this->input->post('kategori');
        $data['barang'] = $this->model_barang->get_filter($nama_brg,$kategori);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
    }

    public function filterharga(){
        $kategori = $this->input->post('kategori');
        $hargamin = $this->input->post('hargamin');
        $hargamax = $this->input->post('hargamax');
        $data['barang'] = $this->model_barang->filterharga($kategori,$hargamin,$hargamax);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
    }
}
