<?php

class Penghasilan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penghasilan');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Sk Penghasilan - Kelurahan Serpong";
        $data['surat'] = $this->M_penghasilan->daftar_penghasilan();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/penghasilan/daftar_surat_penghasilan', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Sk Penghasilan - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_penghasilan->pejabat();

        if ($this->input->post('tambah_penghasilan')) {

            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'jumlah_penghasilan' => $this->input->post('jumlah'),
                'keperluan_penghasilan' => $this->input->post('keperluan'),
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
            $this->M_penghasilan->tambah_penghasilan($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(base_url('Penghasilan/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/penghasilan/tambah_surat_penghasilan', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Sk Penghasilan - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_penghasilan->pejabat();
        $data['penghasilan'] = $this->M_penghasilan->edit_penghasilan($id);
        $data['id'] = $id;

        if ($this->input->post('edit_penghasilan')) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'id_pejabat' => $this->input->post('pejabat'),
                'jumlah_penghasilan' => $this->input->post('jumlah'),
                'keperluan_penghasilan' => $this->input->post('keperluan'),
            );
            $where = array(
                'id_penghasilan' => $this->input->post('id'),
            );
            $this->M_penghasilan->proses_edit_penghasilan($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('Penghasilan/'));
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/penghasilan/edit_surat_penghasilan', $data);
            $this->load->view('template/footer');
        }
    }
    public function hapus($id)
    {

        $this->M_penghasilan->hapus_penghasilan($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('Penghasilan/'));
    }

    public function cetak($id)
    {

        $data['penghasilan'] = $this->M_penghasilan->cetak_penghasilan($id);
        $this->load->view('surat/penghasilan/cetak_surat_penghasilan', $data);
    }
}
