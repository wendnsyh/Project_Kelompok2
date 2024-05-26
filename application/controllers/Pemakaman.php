<?php

class Pemakaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemakaman');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Sk Pemakaman - Kelurahan Serpong";
        $data['surat'] = $this->M_pemakaman->daftar_pemakaman();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/pemakaman/daftar_surat_pemakaman', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Sk Pemakaman - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_pemakaman->pejabat();

        if ($this->input->post('tambah_pemakaman')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tempat_pemakaman' => $this->input->post('tempat'),
                'hari_pemakaman' => $this->input->post('hari'),
                'tanggal_dimakamkan' => $this->input->post('tanggal'),
                'jam_dimakamkan' => $this->input->post('jam'),
                'tanggal_pemakaman' => date('Y-m-d'),
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
            $this->M_pemakaman->tambah_pemakaman($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(base_url('Pemakaman/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/pemakaman/tambah_surat_pemakaman', $data);
            $this->load->view('template/footer');
        }
    }
    public function edit($id)
    {
        $data['title'] = "Edit Data Pemakaman - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_pemakaman->pejabat();
        $data['pemakaman'] = $this->M_pemakaman->edit_pemakaman($id);
        $data['id'] = $id;

        if ($this->input->post('edit_pemakaman')) {
            $data_update = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tempat_pemakaman' => $this->input->post('tempat'),
                'hari_pemakaman' => $this->input->post('hari'),
                'tanggal_dimakamkan' => $this->input->post('tanggal'),
                'jam_dimakamkan' => $this->input->post('jam'),
            );
            $where = array(
                'id_pemakaman' => $id,
            );
            $this->M_pemakaman->proses_edit_pemakaman($where, $data_update);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('Pemakaman/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/pemakaman/edit_surat_pemakaman', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {

        $this->M_pemakaman->hapus_pemakaman($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('Pemakaman/'));
    }

    public function cetak($id)
    {

        $data['pemakaman'] = $this->M_pemakaman->cetak_pemakaman($id);
        $this->load->view('surat/pemakaman/cetak_surat_pemakaman', $data);
    }
}
