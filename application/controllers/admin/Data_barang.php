<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
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
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    

    public function tambah_aksi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama_brg = $this->input->post('nama_brg');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = ''){
            
        }else{
            $config ['upload_path'] = './uploads/';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar gagal diupload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_brg'  => $nama_brg,
            'deskripsi' => $deskripsi,
            'kategori'  => $kategori,
            'harga'     => $harga,
            'stok'      => $stok,
            'status_acc'=> 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'gambar'    => $gambar
        );

        $this->model_barang->tambah_barang($data, 'tbl_barang');
        redirect('admin/data_barang/index');
    }

    public function edit($id){
        $where = array('id_brg' =>$id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tbl_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        date_default_timezone_set('Asia/Jakarta');
        $id = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar != ''){
            $config ['upload_path'] = './uploads/';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar gagal diupload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }else{
            $gambar = $this->input->post('old');
        }

        $data = array(
            'nama_brg'  => $nama_brg,
            'deskripsi' => $deskripsi,
            'kategori'  => $kategori,
            'harga'     => $harga,
            'stok'      => $stok,
            'status_acc'=> 'pending',
            'update_at' => date('Y-m-d H:i:s'),
            'gambar'    => $gambar
        );

        $where = array(
            'id_brg' => $id
        );

        $this->model_barang->update_data($where, $data, 'tbl_barang');
        redirect('admin/data_barang/index');
    }

    public function update_acc()
    {
        $id = $this->input->post('id_brg');
        $status = $this->input->post('status_acc');

        $data = array(
            'status_acc'  => $status
        );

        $where = array(
            'id_brg' => $id
        );

        $this->model_barang->update_data($where, $data, 'tbl_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id){
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tbl_barang');
        redirect('admin/data_barang/index');
    }

    public function detail($id_brg){
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_barang',$data);
        $this->load->view('templates_admin/footer');
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->get_keyword($keyword);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang',$data);
        $this->load->view('templates_admin/footer');
    }

    public function filter(){
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        #$hargamin = $this->input->post('hargamin');
        #$hargamax = $this->input->post('hargamax');
        $data['barang'] = $this->model_barang->filter_admin($nama,$kategori,$harga);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang',$data);
        $this->load->view('templates_admin/footer');
    }

}