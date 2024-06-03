<?php

class SkPindah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_pindah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Surat Keterangan Pindah - Kelurahan Serpong";
        $data['surat'] = $this->M_surat_pindah->daftar_pindah();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/pindah/daftar_surat_pindah', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Sk Pindah - Kelurahan Serpong";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_surat_pindah->pejabat();

        //Validasi data
        $this->form_validation->set_rules('nik_kepala', 'NIK', 'required');
        $this->form_validation->set_rules('pemohon', 'Pemohon', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/pindah/tambah_surat_pindah', $data);
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, lanjutkan proses INSERT
            // Konfigurasi upload surat_pengantar
            $config['upload_path'] = './uploads/SuratPindah/'; // Folder untuk menyimpan surat_pengantar
            $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // Jika gagal mengunggah surat_pengantar
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar');
                $this->load->view('surat/pindah/tambah_surat_pindah', $data);
                $this->load->view('template/footer');
            } else {

                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik_kepala_keluarga' => $this->input->post('nik_kepala'),
                    'nik_pemohon' => $this->input->post('pemohon'),
                    'alasan_pindah' => $this->input->post('alasan'),
                    'alamat_pindah' => $this->input->post('alamat'),
                    'rt_pindah' => $this->input->post('rt'),
                    'rw_pindah' => $this->input->post('rw'),
                    'desa_pindah' => $this->input->post('desa'),
                    'kecamatan_pindah' => $this->input->post('kecamatan'),
                    'kota_pindah' => $this->input->post('kota'),
                    'provinsi_pindah' => $this->input->post('provinsi'),
                    'kode_pos_pindah' => $this->input->post('kode'),
                    'tanggal_pindah' => $this->input->post('tanggal'),
                    'provinsi_pindah' => $this->input->post('provinsi'),
                    'tanggal_pindah' => date('y-m-d'),
                    'surat_pengantar' => $surat_pengantar //
                );
                $this->M_surat_pindah->tambah_pindah($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('SkPindah'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] =  "Edit Data SK Pindah - Keluarahan Serpong";
    }
}
