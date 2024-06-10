<?php

class Pindah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pindah');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Data Pindah - Kelurahan Serpong";
        $data['pindah'] = $this->M_pindah->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('pindah/tampil_pindah', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Pindah - Kelurahan Serpong";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'required');
        $this->form_validation->set_rules('tanggal_pindah', 'Tanggal Pindah', 'required');
        $this->form_validation->set_rules('alamat_tujuan', 'Alamat Tujuan', 'required');
        $this->form_validation->set_rules('jenis_pindah', 'Jenis Pindah', 'required');
        $this->form_validation->set_rules('klasifikasi_pindah', 'Klasifikasi Pindah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('template/topbar');
            $this->load->view('pindah/tambah_pindah', $data);
            $this->load->view('template/footer');
        } else {
            // Ambil data dari form
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $agama = $this->input->post('agama');
            $pekerjaan = $this->input->post('pekerjaan');
            $alamat = $this->input->post('alamat');
            $rt = $this->input->post('rt');
            $rw = $this->input->post('rw');
            $alasan_pindah = $this->input->post('alasan_pindah');
            $tanggal_pindah = $this->input->post('tanggal_pindah');
            $alamat_tujuan = $this->input->post('alamat_tujuan');
            $jenis_pindah = $this->input->post('jenis_pindah');
            $klasifikasi_pindah = $this->input->post('klasifikasi_pindah');

            // Menyimpan data ke dalam array
            $data = array(
                'nik' => $nik,
                'nama' => ucwords($nama),
                'agama' => $agama,
                'pekerjaan' => $pekerjaan,
                'alamat' => ucwords($alamat),
                'rt' => $rt,
                'rw' => $rw,
                'alasan_pindah' => ucwords($alasan_pindah),
                'tanggal_pindah' => $tanggal_pindah,
                'alamat_tujuan' => $alamat_tujuan,
                'jenis_pindah' => $jenis_pindah,
                'klasifikasi_pindah' => $klasifikasi_pindah,
            );

            $this->M_pindah->tambah($data);
            $this->session->set_flashdata('sukses', 'Data dengan NO KK ' . $nik . ' berhasil ditambahkan.');
            redirect(base_url('Pindah'));
        }
    }

    public function edit($nik = null)
    {
        if ($nik === null) {
            show_404();
            return;
        }

        $data['title'] = "Edit Data Pindah - Kelurahan Serpong";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pindah'] = $this->M_pindah->edit($nik);
        $data['nik'] = $nik;

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'required');
        $this->form_validation->set_rules('tanggal_pindah', 'Tanggal Pindah', 'required');
        $this->form_validation->set_rules('alamat_tujuan', 'Alamat Tujuan', 'required');
        $this->form_validation->set_rules('jenis_pindah', 'Jenis Pindah', 'required');
        $this->form_validation->set_rules('klasifikasi_pindah', 'Klasifikasi Pindah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('pindah/edit_pindah', $data);
            $this->load->view('template/footer');
        } else {
            // Ambil data dari form
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $agama = $this->input->post('agama');
            $pekerjaan = $this->input->post('pekerjaan');
            $alamat = $this->input->post('alamat');
            $rt = $this->input->post('rt');
            $rw = $this->input->post('rw');
            $alasan_pindah = $this->input->post('alasan_pindah');
            $tanggal_pindah = $this->input->post('tanggal_pindah');
            $alamat_tujuan = $this->input->post('alamat_tujuan');
            $jenis_pindah = $this->input->post('jenis_pindah');
            $klasifikasi_pindah = $this->input->post('klasifikasi_pindah');

            // Menyimpan data ke dalam array
            $data = array(
                'nik' => $nik,
                'nama' => ucwords($nama),
                'agama' => $agama,
                'pekerjaan' => $pekerjaan,
                'alamat' => ucwords($alamat),
                'rt' => $rt,
                'rw' => $rw,
                'alasan_pindah' => ucwords($alasan_pindah),
                'tanggal_pindah' => $tanggal_pindah,
                'alamat_tujuan' => $alamat_tujuan,
                'jenis_pindah' => $jenis_pindah,
                'klasifikasi_pindah' => $klasifikasi_pindah,
            );
            $where = array(
                'nik' => $nik,
            );
            $this->M_pindah->proses_edit($where, $data);

            $this->session->set_flashdata('sukses', 'Data dengan NO KK ' . $nik . ' berhasil diedit.');
            redirect(base_url('Pindah'));
        }
    }

    public function hapus($nik)
    {
        $this->M_pindah->hapus($nik);
        $this->session->set_flashdata('sukses', 'Data dengan NO KK ' . $nik . ' berhasil dihapus.');
        redirect(base_url('Pindah'));
    }

    public function detail($nik)
    {
        $data['title'] = "Detail Data Pindah - Kelurahan Serpong";
        $this->load->model('M_pindah');

        $detail = $this->M_pindah->detail($nik);
        $data['detail'] = $detail;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('pindah/detail_pindah', $data);
        $this->load->view('template/footer');
    }
}
