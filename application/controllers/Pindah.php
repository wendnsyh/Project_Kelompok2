<?php

class Pindah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pindah');
    }
    public function index()
    {

        $data['title'] = "Data Pindah - Kelurahan Serpong";
        $data['pindah'] = $this->M_pindah->tampil();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pindah/tampil_pindah',$data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] ="Tambah Data Pindah - Kelurahan Serpong";
        $data['pindah']= $this->M_pindah->tampil();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pindah/tambah_pindah',$data);
        $this->load->view('template/footer');
    }
}
