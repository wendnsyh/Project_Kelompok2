<?php

class BatalPindah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_batal_pindah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Surat Keterangan Batal Pindah - Kelurahan Serpong";
        $data['surat'] = $this->M_batal_pindah->daftar_batal_pindah();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/batal_pindah/daftar_surat_batal', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Surat Keterangan Batal Pindah - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_batal_pindah->pejabat();

        if ($this->input->post('tambah_batal_pindah')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'alamat_batal_pindah' => $this->input->post('alamat'),
                'tanggal_batal_pindah' => date('Y-m-d'),
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
            $this->M_batal_pindah->tambah_batal_pindah($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(base_url('BatalPindah/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/batal_pindah/tambah_surat_batal', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Surat Keterangan Batal Pindah - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_batal_pindah->pejabat();
        $data['batal_pindah'] = $this->M_batal_pindah->edit_batal_pindah($id);
        $data['id'] = $id;

        if ($this->input->post('edit_batal_pindah')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'alamat_batal_pindah' => $this->input->post('alamat'),
            );
            $where = array(
                'id_batal_pindah' => $this->input->post('id'),
            );
            $this->M_batal_pindah->proses_edit_batal_pindah($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('BatalPindah/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/batal_pindah/edit_surat_batal', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {

        $this->M_batal_pindah->hapus_batal_pindah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('BatalPindah/'));
    }

    public function cetak($id)
    {

        $data['batal_pindah'] = $this->M_batal_pindah->cetak_batal_pindah($id);
        $this->load->view('surat/batal_pindah/cetak_surat_batal', $data);
    }
}
