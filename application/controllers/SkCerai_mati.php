<?php

class SkCerai_mati extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_cerai_mati');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Sk Cerai Mati - Kelurahan Serpong";
        $data['surat'] = $this->M_cerai_mati->daftar_cerai_mati();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/cerai_mati/daftar_surat', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Sk Cerai Mati - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_cerai_mati->pejabat();

        if ($this->input->post('tambah_cerai_mati')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_cerai_mati' => date('Y-m-d'),
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
            //     $bukti_usaha = $this->upload->data('file_name');
            // }

            $this->M_cerai_mati->tambah_cerai_mati($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(base_url('SkCerai_mati'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/cerai_mati/tambah_surat', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit data Sk Cerai Mati - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_cerai_mati->pejabat();
        $data['cerai_mati'] = $this->M_cerai_mati->edit_cerai_mati($id);
        $data['id'] = $id;

        if ($this->input->post('edit_cerai_mati')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
            );
            $where = array(
                'id_cerai_mati' => $this->input->post('id'),
            );
            $this->M_cerai_mati->proses_edit_cerai_mati($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('SkCerai_mati'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/cerai_mati/edit_surat', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {

        $this->M_cerai_mati->hapus_cerai_mati($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('BelumMenikah/'));
    }

    public function cetak($id)
    {

        $data['cerai_mati'] = $this->M_cerai_mati->cetak_cerai_mati($id);
        $this->load->view('surat/cerai_mati/cetak_surat', $data);
    }
}
