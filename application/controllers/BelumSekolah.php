<?php

class BelumSekolah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_belum_sekolah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Sk Belum Sekolah";
        $data['surat'] = $this->M_belum_sekolah->daftar_belum_sekolah();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/belum_sekolah/daftar_belum_sekolah', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Surat Keterangan Belum Sekolah - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_belum_sekolah->pejabat();

        if ($this->input->post('tambah_belum_sekolah')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_belum_sekolah' => date('Y-m-d'),
            );
            $this->M_belum_sekolah->tambah_belum_sekolah($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(
                base_url('BelumSekolah/')
            );
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/belum_sekolah/tambah_belum_sekolah', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Surat Keterangan Belum Sekolah - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_belum_sekolah->pejabat();
        $data['belum_sekolah'] = $this->M_belum_sekolah->edit_belum_sekolah($id);
        $data['id'] = $id;


        if ($this->input->post('edit_belum_sekolah')) {
            $data_edit = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
            );
            $where = array(
                'id_belum_sekolah' => $this->input->post('id'),
            );
            $this->M_belum_sekolah->proses_edit_belum_sekolah($where, $data_edit);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('BelumSekolah/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/belum_sekolah/edit_belum_sekolah', $data);
            $this->load->view('template/footer');
        }
    }


    public function hapus($id)
    {

        $this->M_belum_sekolah->hapus_belum_sekolah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('BelumSekolah/'));
    }

    public function cetak($id)
    {

        $data['belum_sekolah'] = $this->M_belum_sekolah->cetak_belum_sekolah($id);
        $this->load->view('surat/belum_sekolah/cetak_belum_sekolah', $data);
    }
}
