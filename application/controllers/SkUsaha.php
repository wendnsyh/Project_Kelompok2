<?php

class SkUsaha extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_usaha');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data SK Usaha";
        $data['surat'] = $this->M_usaha->daftar_usaha();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/usaha/daftar_surat_usaha', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah SK Usaha";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_usaha->pejabat();

        if ($this->input->post('tambah_usaha')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'nama_usaha' => $this->input->post('nama'),
                'sejak_usaha' => $this->input->post('sejak'),
                'alamat_usaha' => $this->input->post('alamat'),
                'tanggal_usaha' => date('Y-m-d'),
            );
            $this->M_usaha->tambah_usaha($data);
            $this->session->set_flashdata('Sukses', 'Data berhasil di tambahkan');
            redirect(base_url('SkUsaha/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/usaha/tambah_usaha', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Data Sk Usaha";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_usaha->pejabat();
        $data['usaha'] = $this->M_usaha->edit_usaha($id);
        $data['id'] = $id;

        if ($this->input->post('edit_usaha')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'nama_usaha' => $this->input->post('nama'),
                'sejak_usaha' => $this->input->post('sejak'),
                'alamat_usaha' => $this->input->post('alamat'),
            );
            $where = array(
                'id_usaha' => $this->input->post('id'),
            );
            $this->M_usaha->proses_edit_usaha($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('SKUsaha'));
        }else{

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/usaha/edit_usaha',$data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    { {

            $this->M_usaha->hapus_usaha($id);
            $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
            redirect(base_url('SkUsaha/'));
        }
    }

    public function cetak($id)
    {

        $data['usaha'] = $this->M_usaha->cetak_usaha($id);
        $this->load->view('surat/usaha/cetak_usaha', $data);
    }
}
