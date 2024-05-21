<?php

class SuratDomisili extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_domisili');
        $this->load->model('m_penduduk');
    }


    public function index()
    {
        $data['title'] = "Surat Domisili";
        $data['surat'] = $this->M_domisili->daftar_domisili();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/domisili/daftar_domisili', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Surat Domisili";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_domisili->pejabat();


        if ($this->input->post('tambah_domisili')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'no_surat_rt' => $this->input->post('pengantar'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_domisili' => date('Y-m-d'),
            );
            $this->M_domisili->tambah_domisili($data);
            $this->session->set_flashdata('sukses', 'Data berhasil di tambahkan.');
            redirect(base_url('SuratDomisili/'));
        } else {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/domisili/tambah_surat_domisili', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Surat Domisili";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_domisili->pejabat();
        $data['domisili'] = $this->M_domisili->edit_domisili($id);
        $data['id'] = $id;

        if ($this->input->post('edit_domisili')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'no_surat_rt' => $this->input->post('pengantar'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_domisili' => date('Y-m-d'),
            );
            $where = array(
                'id_domisili' => $this->input->post('id'),
            );
            $this->M_domisili->proses_edit_domisili($where, $data);
            $this->session->set_flashdata('sukses', 'Data Berhasil di Edit');
            redirect(base_url('SuratDomisili/'));
        } else {

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/domisili/edit_surat_domisili',$data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {

        $this->M_domisili->hapus_domisili($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('SuratDomisili/'));
    }

    public function cetak($id)
    {

        $data['domisili'] = $this->M_domisili->cetak_domisili($id);
        $this->load->view('surat/domisili/cetak_surat_domisili', $data);
    }
}
