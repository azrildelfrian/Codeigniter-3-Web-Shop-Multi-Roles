<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_hero extends CI_Controller {
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

    public function index(){
        $data['hero'] = $this->model_hero->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_hero',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $label = $this->input->post('label');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $_FILES['file_foto']['name'];
        if ($gambar = ''){
        }else{
            $config ['upload_path'] = './uploads/carousel/';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file_foto')){
                echo "Gambar gagal diupload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }

        $data = array(
            'label'  => $label,
            'deskripsi' => $deskripsi,
            'status_acc'=> 'pending',
            'file_foto'    => $gambar
        );

        $this->model_hero->tambah_hero($data, 'hero_unit');
        redirect('admin/data_hero/index');
    }

    public function update_acc()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status_acc');

        $data = array(
            'status_acc'  => $status
        );

        $where = array(
            'id' => $id
        );

        $this->model_barang->update_data($where, $data, 'hero_unit');
        redirect('admin/data_hero/index');
    }

    public function hapus($id){
        $where = array('id' => $id);
        $this->model_barang->hapus_data($where, 'hero_unit');
        redirect('admin/data_hero/index');
    }

    public function edit($id){
        $where = array('id' =>$id);
        $data['hero'] = $this->model_barang->edit_barang($where, 'hero_unit')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_hero', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $label = $this->input->post('label');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $_FILES['file_foto']['name'];
        if ($gambar != ''){
            $config ['upload_path'] = './uploads/carousel/';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file_foto')){
                echo "Gambar gagal diupload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }else{
            $gambar = $this->input->post('old');
        }

        $data = array(
            'label'  => $label,
            'deskripsi' => $deskripsi,
            'status_acc'=> 'pending',
            'file_foto'    => $gambar
        );

        $where = array(
            'id' => $id
        );

        $this->model_barang->update_data($where, $data, 'hero_unit');
        redirect('admin/data_hero/index');
    }
}