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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Validasi input
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Pemakaman', 'required');
        $this->form_validation->set_rules('hari', 'Hari Pemakaman', 'required');
        $this->form_validation->set_rules('jam', 'Jam Dimakamkan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/pemakaman/tambah_surat_pemakaman', $data);
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, lanjutkan proses INSERT
            // Konfigurasi upload surat_pengantar
            $config['upload_path'] = './uploads/pemakaman/'; // Folder untuk menyimpan surat_pengantar
            $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // Jika gagal mengunggah surat_pengantar
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/pemakaman/tambah_surat_pemakaman', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'tempat_pemakaman' => $this->input->post('tempat'),
                    'hari_pemakaman' => $this->input->post('hari'),
                    'tanggal_dimakamkan' => date('y-m-d'),
                    'jam_dimakamkan' => $this->input->post('jam'),
                    'tanggal_pemakaman' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar
                );

                $this->M_pemakaman->tambah_pemakaman($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('Pemakaman/'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Pemakaman - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_pemakaman->pejabat();
        $data['pemakaman'] = $this->M_pemakaman->edit_pemakaman($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Validasi input
        // Validasi input
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Pemakaman', 'required');
        $this->form_validation->set_rules('hari', 'Hari Pemakaman', 'required');
        $this->form_validation->set_rules('jam', 'Jam Dimakamkan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/pemakaman/edit_surat_pemakaman', $data);
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, lanjutkan proses INSERT
            // Konfigurasi upload surat_pengantar
            $config['upload_path'] = './uploads/pemakaman/'; // Folder untuk menyimpan surat_pengantar
            $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

            // Cek apakah folder upload_path ada
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true); // Buat folder jika belum ada
            }

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // Jika gagal mengunggah surat_pengantar
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/pemakaman/edit_surat_pemakaman', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'tempat_pemakaman' => $this->input->post('tempat'),
                    'hari_pemakaman' => $this->input->post('hari'),
                    'tanggal_dimakamkan' => date('y-m-d'),
                    'jam_dimakamkan' => $this->input->post('jam'),
                    'tanggal_pemakaman' => date('Y-m-d'),
                );

                $where = array('id_pemakaman' => $id);
                $this->M_pemakaman->proses_edit_pemakaman($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('Pemakaman/'));
            }
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
