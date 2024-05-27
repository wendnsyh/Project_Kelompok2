<?php

class Pindah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pindah');
    }
    public function index()
    {

        $data['title'] = "Data Pindah - Kelurahan Serpong";
        $data['pindah'] = $this->M_pindah->tampil();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pindah/tampil_pindah', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Pindah - Kelurahan Serpong";
        $data['pindah'] = $this->M_pindah->tampil();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pindah/tambah_pindah', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah()
    {
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
            //$foto = $_FILES['foto']['name'];

            //if ($_FILES['foto']['name'] != "") {
            // Foto diupload, lakukan pemrosesan upload dan masukkan ke database
            //$foto = $_FILES['foto']['name'];
            // $config['upload_path'] = './assets/foto';
            // $config['allowed_types'] = 'jpg|jpeg|png|tiff';
            // $this->load->library('upload', $config);

            //  if ($this->upload->do_upload('foto')) {
            //    $foto = $this->upload->data('file_name');
            // Lanjutkan dengan proses penyimpanan ke dalam database
            // } else {
            //   $error = $this->upload->display_errors();
            // Handle pesan kesalahan upload
            // $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            //   <strong>Gagal mengupload foto!</strong> ' . $error . '
            // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //   <span aria-hidden="true">&times;</span>
            // </button>
            // </div>');
            //redirect(base_url('Pindah/'));
            //}
            //} else {
            // Foto tidak diupload, mungkin tampilkan pesan kesalahan atau lakukan tindakan lainnya
            //  $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            //    <strong>Gagal mengupload foto!</strong> Tidak ada file yang di-upload.
            //  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //    <span aria-hidden="true">&times;</span>
            //</button>
            //</div>');
        );


        $this->M_pindah->tambah($data);
        $this->session->set_flashdata('sukses', 'Data dengan NO KK ' . $nik . ' berhasil ditambahkan.');
        redirect(base_url('Pindah'));
    }

    public function edit($nik)
    {
        $data['title'] = "Edit Data Pindah - Kelurahan Serpong";
        $data['pindah'] = $this->M_pindah->edit($nik);
        $data['nik'] = $nik;


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pindah/edit_pindah', $data);
        $this->load->view('template/footer');
    }

    public function proses_edit()
    {
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
        redirect(base_url('Pindah/' . $nik));
    }

    public function hapus($nik)
    {
        $this->m_pindah->hapus($nik);
        $this->session->set_flashdata('sukses', 'Data dengan NO KK ' . $nik . ' berhasil dihapus.');
        redirect(base_url('Pindah'));
    }

    public function detail($nik)
    {

        $data['title'] = "Detail Data Pindah  - Kelurahan Serpong";
        $this->load->model('M_pindah');

        $detail = $this->M_pindah->detail($nik);
        $data['detail'] = $detail;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pindah/detail_pindah', $data);
        $this->load->view('template/footer');
    }
}
