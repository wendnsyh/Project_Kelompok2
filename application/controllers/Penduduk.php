<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_penduduk'); // Memuat model m_penduduk
        $this->load->library('form_validation'); // Memuat library form_validation
    }

    public function index()
    {
        $data['title'] = "Data Penduduk - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('penduduk/tampil_penduduk', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Penduduk - Desa Serpong";

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('penduduk/tambah_penduduk', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah()
    {
        // Aturan validasi
        $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[penduduk.nik]');
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
            $this->tambah();
        } else {
            // Proses upload foto
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                // Jika upload foto gagal, tampilkan pesan kesalahan
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal mengupload foto!</strong> Silakan coba lagi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('Penduduk/tambah');
                return;
            }

            // Jika upload foto berhasil, ambil nama file
            $foto = $this->upload->data('file_name');

            // Masukkan data ke database
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
                'foto' => $foto, // Simpan nama foto ke dalam database
            );
            $this->m_penduduk->tambah($data);

            $this->session->set_flashdata('sukses', 'Data Dengan NIK ' . $this->input->post('nik') . ' berhasil ditambahkan.');
            redirect(base_url('Penduduk/'));
        }
    }

    public function edit($nik)
    {
        $data['title'] = "Edit penduduk - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->edit($nik);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
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

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('penduduk/detail_penduduk', $data);
        $this->load->view('template/footer');
    }
}
