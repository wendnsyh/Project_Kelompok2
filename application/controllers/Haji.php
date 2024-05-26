<?php

class Haji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_haji');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Sk Haji - Kelurahan Serpong";
        $data['surat'] = $this->M_haji->daftar_haji();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/haji/daftar_surat_haji', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Sk Haji - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_haji->pejabat();

        if ($this->input->post('tambah_haji')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_haji' => date('Y-m-d'),
                'tanggal_berangkat' => $this->input->post('berangkat'),
                //'foto'        => $this->input->post('foto'),//
            );
            // $config['upload_path'] = './assets/bukti/';
            // $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size'] = 4096; // 
            // $config['max_width'] = 3000;
            // $config['max_height'] = 3000;
            // $this->load->library('upload', $config);

            // // Upload Bukti Usaha
            // if (!$this->upload->do_upload('foto')) {
            //     $error = $this->upload->display_errors();
            //     $this->session->set_flashdata('error', $error);
            //     redirect(base_url('SkUsaha/tambah'));
            //     return; // Stop execution to prevent further processing
            // } else {
            //     $foto = $this->upload->data('file_name');
            // }
            $this->M_haji->tambah_haji($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(base_url('Haji/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/haji/tambah_surat_haji', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Tambah Data Sk Haji - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_haji->pejabat();
        $data['haji'] = $this->M_haji->edit_haji($id);
        $data['id'] = $id;

        if ($this->input->post('edit_haji')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_berangkat' => $this->input->post('berangkat'),
            );
            $where = array(
                'id_haji' => $this->input->post('id'),
            );
            $this->M_haji->proses_edit_haji($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('Haji/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/haji/edit_surat_haji', $data);
            $this->load->view('template/footer');
        }
    }
    public function hapus($id)
    {

        $this->M_haji->hapus_haji($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('haji/'));
    }

    public function cetak($id)
    {

        $data['haji'] = $this->M_haji->cetak_haji($id);
        $this->load->view('surat/haji/cetak_surat_haji', $data);
    }
}
