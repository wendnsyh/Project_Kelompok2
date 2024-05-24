<?php

class BelumMenikah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_belum_menikah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data SK Belum Menikah";
        $data['surat'] = $this->M_belum_menikah->daftar_belum_menikah();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/belum_menikah/daftar_belum_menikah', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah SK Belum Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_belum_menikah->pejabat();

        if ($this->input->post('tambah_belum_menikah')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_belum_menikah' => date('Y-m-d'),
                //'surat_pengantar'        => $this->input->post('surat_pengantar'),//
            );
            // $config['upload_path'] = './assets/bukti/';
            // $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size'] = 4096; // dalam kilobyte, jadi ini 4MB
            // $config['max_width'] = 3000;
            // $config['max_height'] = 3000;
            // $this->load->library('upload', $config);

            // // Upload Bukti Usaha
            // if (!$this->upload->do_upload('surat_pengantar')) {
            //     $error = $this->upload->display_errors();
            //     $this->session->set_flashdata('error', $error);
            //     redirect(base_url('SkUsaha/tambah'));
            //     return; // Stop execution to prevent further processing
            // } else {
            //     $bukti_usaha = $this->upload->data('file_name');
            // }


            $this->M_belum_menikah->tambah_belum_menikah($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(base_url('BelumMenikah/'));
        } else {

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/belum_menikah/tambah_belum_menikah', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Sk Belum Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_belum_menikah->pejabat();
        $data['belum_menikah'] = $this->M_belum_menikah->edit_belum_menikah($id);
        $data['id'] = $id;

        if ($this->input->post('edit_belum_menikah')) {
            $data_edit = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
            );
            $where = array(
                'id_belum_menikah' => $this->input->post('id'),
            );
            $this->M_belum_menikah->proses_edit_belum_menikah($where, $data_edit);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('BelumMenikah/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/belum_menikah/edit_belum_menikah', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {

        $this->M_belum_menikah->hapus_belum_menikah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('BelumMenikah/'));
    }

    public function cetak($id)
    {

        $data['belum_menikah'] = $this->M_belum_menikah->cetak_belum_menikah($id);
        $this->load->view('surat/belum_menikah/cetak_belum_menikah', $data);
    }
}
