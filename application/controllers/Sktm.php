<?php

class Sktm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Sktm');
        $this->load->model('m_penduduk');
        $this->load->library(;upload);
    }

    public function index()
    {

        $data['title'] = "Surat Keterangan Tidak Mampu";
        $data['surat'] = $this->M_Sktm->daftar_sktm();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/sktm/daftar_sktm', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Surat Keterangan Tidak Mampu";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_Sktm->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Validasi input
        $this->form_validation->set_rules('ayah', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('anak', 'NIK Anak', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('surat/sktm/tambah_sktm', $data);
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, lanjutkan proses INSERT
            // Konfigurasi upload surat_pengantar
            $config['upload_path'] = './uploads/sktm/'; // Folder untuk menyimpan surat_pengantar
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
                    'nik_ayah' => $this->input->post('ayah'),
                    'nik_anak' => $this->input->post('anak'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'alasan' => $this->input->post('alasan'),
                    'tanggal_sktm' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar // Simpan nama file surat_pengantar ke database
                );

                $this->M_Sktm->tambah_sktm($data);
                $this->session->set_flashdata('Sukses', 'Data berhasil ditambahkan');
                redirect(base_url('Sktm/'));
            }
        }
    }
    public function edit($id)
    {
        $data['title'] = "Edit Surat Keterangan Tidak Mampu";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_Sktm->pejabat();
        $data['sktm'] = $this->M_Sktm->edit_sktm($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Form validation rules
        $this->form_validation->set_rules('ayah', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('anak', 'NIK Anak', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/sktm/edit_sktm', $data);
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, lanjutkan proses UPDATE
            // Konfigurasi upload foto
            $config['upload_path'] = './uploads/sktm/'; // Folder untuk menyimpan foto
            $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                // Jika gagal mengunggah foto
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/sktm/edit_sktm', $data);
                $this->load->view('template/footer');
            } else {
                // Jika sukses mengunggah foto
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];

                // Perbarui data yang akan diedit
                $data = array(
                    'nik_ayah' => $this->input->post('ayah'),
                    'nik_anak' => $this->input->post('anak'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'alasan' => $this->input->post('alasan'),
                    'foto' => $foto // Simpan nama file foto ke database
                );

                $where = array(
                    'id_sktm' => $this->input->post('id'),
                );

                $this->M_Sktm->proses_edit_sktm($where, $data);
                $this->session->set_flashdata('Sukses', 'Data berhasil diedit');
                redirect(base_url('Sktm/'));
            }
        }
    }


    public function hapus($id)
    {

        $this->M_Sktm->hapus_sktm($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil dihapus');
        redirect(base_url('Sktm/'));
    }

    public function cetak($id)
    {
        $data['sktm'] = $this->M_Sktm->cetak_sktm($id);
        $this->load->view('surat/sktm/cetak_sktm', $data);
    }
}
