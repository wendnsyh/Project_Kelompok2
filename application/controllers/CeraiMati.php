<?php

class CeraiMati extends CI_Controller
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header',$data);
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Validasi input
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/cerai_mati/tambah_surat', $data);
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, lanjutkan proses INSERT
            // Konfigurasi upload surat_pengantar
            $config['upload_path'] = './uploads/CeraiMati/'; // Folder untuk menyimpan surat_pengantar
            $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // Jika gagal mengunggah surat_pengantar
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar');
                $this->load->view('surat/sktm/tambah_sktm', $data);
                $this->load->view('template/footer');
            } else {

                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'alasan' => $this->input->post('alasan'),
                    'tanggal_cerai_mati' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar//
                );

                $this->M_cerai_mati->tambah_cerai_mati($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('CeraiMati'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit data Sk Cerai Mati - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_cerai_mati->pejabat();
        $data['cerai_mati'] = $this->M_cerai_mati->edit_cerai_mati($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Validasi input
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/cerai_mati/edit_surat', $data);
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, lanjutkan proses INSERT
            // Konfigurasi upload surat_pengantar
            $config['upload_path'] = './uploads/CeraiMati/'; // Folder untuk menyimpan surat_pengantar
            $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // Jika gagal mengunggah surat_pengantar
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar');
                $this->load->view('surat/sktm/tambah_sktm', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'alasan' => $this->input->post('alasan'),
                    'id_pejabat' => $this->input->post('pejabat'),
                );
                $where = array(
                    'id_cerai_mati' => $this->input->post('id'),
                );
                $this->M_cerai_mati->proses_edit_cerai_mati($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('CeraiMati'));
            }
        }
    }

    public function hapus($id)
    {

        $this->M_cerai_mati->hapus_cerai_mati($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('CeraiMati/'));
    }

    public function cetak($id)
    {

        $data['cerai_mati'] = $this->M_cerai_mati->cetak_cerai_mati($id);
        $this->load->view('surat/cerai_mati/cetak_surat', $data);
    }
}
