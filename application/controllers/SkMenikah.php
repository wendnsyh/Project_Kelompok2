<?php

class SkMenikah extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menikah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Daftar Sk Menikah";
        $data['surat'] = $this->M_menikah->daftar_menikah();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/sk_menikah/daftar_skmenikah', $data);
        $this->load->view('template/header');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Sk Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_menikah->pejabat();

        if ($this->input->post('tambah_menikah')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_menikah' => date('Y-m-d'),
            );
            $this->M_menikah->tambah_menikah($data);
            $this->session->set_flashdata('Sukses', 'Data berhasil di tambahkan');
            redirect(base_url('SkMenikah'));
        } else {

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/sk_menikah/tambah_skmenikah', $data);
            $this->load->view('template/header');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data SK Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_menikah->pejabat();
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['menikah'] = $this->M_menikah->edit_menikah($id);
        $data['id'] = $id;


        if ($this->input->post('edit_menikah')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
            );
            $where = array(
                'id_menikah' => $this->input->post('id'),
            );
            $this->M_menikah->proses_edit_menikah($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('SkMenikah/'));
        } else {

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/sk_menikah/edit_skmenikah', $data);
            $this->load->view('template/header');
        }
    }

    public function hapus($id)
    {

        $this->M_menikah->hapus_menikah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('SkMenikah/'));
    }

    public function cetak($id)
    {

        $data['menikah'] = $this->M_menikah->cetak_menikah($id);
        $this->load->view('surat/sk_menikah/cetak_skmenikah', $data);
    }
}
