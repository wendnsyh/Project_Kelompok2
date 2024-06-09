<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('autentifikasi'); // Alihkan ke halaman login jika belum login
        }
        $this->load->model('m_penduduk');


        $this->load->library('form_validation');
        // Memuat library form_validation
    }

    public function index()
    {
        $data['title'] = "Data Penduduk - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('penduduk/tampil_penduduk', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Penduduk - Desa Serpong";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('penduduk/tambah_penduduk', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah()
    {
        $this->load->library('upload');

        $nik = $this->input->post('nik');
        $cek_nik = $this->db->get_where('penduduk', ['nik' => $nik])->row();

        // Jika NIK sudah ada, set flash data dan kembalikan ke halaman tambah
        if ($cek_nik) {
            $this->session->set_flashdata('error', 'NIK sudah ada dalam database. Silakan masukkan NIK yang berbeda.');
            redirect('penduduk/tambah');
        }



        // Mengumpulkan data form lainnya
        $data['nik'] = $this->input->post('nik');
        $data['no_kk'] = $this->input->post('no_kk');
        $data['nama'] = $this->input->post('nama');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['rt'] = $this->input->post('rt');
        $data['rw'] = $this->input->post('rw');
        $data['agama'] = $this->input->post('agama');
        $data['status_perkawinan'] = $this->input->post('status_perkawinan');
        $data['pendidikan'] = $this->input->post('pendidikan');
        $data['pekerjaan'] = $this->input->post('pekerjaan');
        $data['status'] = $this->input->post('status');
        $data['golongan_darah'] = $this->input->post('golongan_darah');
        $data['kewarganegaraan'] = $this->input->post('kewarganegaraan');

        // Insert ke database
        $this->db->insert('penduduk', $data);

        // Redirect dengan pesan sukses
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan.');
        redirect('penduduk');
    }



    public function edit($nik)
    {
        $data['title'] = "Edit penduduk - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->edit($nik);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('penduduk/edit_penduduk', $data);
        $this->load->view('template/footer');
    }

    public function proses_edit()
    {
        // Aturan validasi
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form lagi dengan pesan kesalahan
            $this->edit($this->input->post('nik'));
        } else {
            // Jika validasi berhasil, simpan data ke database
            $data = array(
                'nik' => $this->input->post('nik'),
                'no_kk' => $this->input->post('no_kk'),
                'nama' => ucwords($this->input->post('nama')),
                'tempat_lahir' => ucwords($this->input->post('tempat_lahir')),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => ucwords($this->input->post('alamat')),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'agama' => $this->input->post('agama'),
                'pekerjaan' => ucwords($this->input->post('pekerjaan')),
                'pendidikan' => $this->input->post('pendidikan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'status' => $this->input->post('status'),
                'golongan_darah' => ucwords($this->input->post('golongan_darah')),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            );
            $where = array(
                'nik' => $this->input->post('nik'),
            );
            $this->m_penduduk->proses_edit($where, $data);

            $this->session->set_flashdata('sukses', 'Data Dengan NIK ' . $this->input->post('nik') . ' berhasil diedit.');
            redirect(base_url('Penduduk/' . $this->input->post('nik')));
        }
    }

    public function hapus($nik)
    {
        $this->m_penduduk->hapus($nik);
        $this->session->set_flashdata('sukses', 'Data Dengan NIK ' . $nik . ' berhasil dihapus.');
        redirect(base_url('Penduduk/'));
    }

    public function detail($nik)
    {
        $data['title'] = "Detail penduduk - Desa Serpong";
        $detail = $this->m_penduduk->detail($nik);
        $data['detail'] = $detail;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('penduduk/detail_penduduk', $data);
        $this->load->view('template/footer');
    }
}
