<?php

class Surat_izin_keluarga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_izin_keluarga');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "DATA SURAT IZIN BEKERJA";
        $data['surat'] = $this->M_izin_keluarga->daftar_izin_keluarga();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/izin/daftar_izin', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Surat Izin";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_izin_keluarga->pejabat(); 

        if ($this->input->post('tambah_izin')) {
            $data = array(
                'nik_ayah' => $this->input->post('ayah'),
                'nik_anak' => $this->input->post('anak'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tujuan_izin_keluarga' => $this->input->post('tujuan'),
                'tanggal_izin_keluarga' => date('Y-m-d'),
            );
            $this->M_izin_keluarga->tambah_izin_keluarga($data); 
            $this->session->set_flashdata('Sukses', 'Data berhasil ditambahkan');
            redirect(base_url('Surat_izin_keluarga/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/izin/tambah_izin', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit()
    {
        $data['title'] = "Edit Surat Izin";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $id = $this->input->post('id');
        $data['pejabat'] = $this->M_izin_keluarga->edit_izin_keluarga($id); 

        if ($this->input->post('edit_izin_keluarga')) {
            $data = array(
                'nik_ayah' => $this->input->post('nik'),
                'no_anak' => $this->input->post('anak'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tujuan_izin_keluarga' => $this->input->post('tujuan'),
            );
            $where = array(
                'id_izin_keluarga' => $this->input->post('id'),
            );
            $this->M_domisili->proses_edit_izin_keluarga($where, $data);
            $this->session->set_flashdata('sukses', 'Data Berhasil di Edit');
            redirect(base_url('Surat_izin_keluarga/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/izin/edit_izin', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        $this->M_izin_keluarga->hapus_izin_keluarga($id); 
        $this->session->set_flashdata('Sukses', 'Data berhasil di hapus');
        redirect(base_url('Surat_izin_keluarga/'));
    }

    public function cetak($id) 
    {
        $data['izin_keluarga'] = $this->M_izin_keluarga->cetak_izin_keluarga($id); 
        $this->load->view('surat/izin/cetak_izin', $data);
    }
}
