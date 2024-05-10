<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('login') == FALSE) {
		// 	redirect(base_url("login"));
		// }
		$this->load->model('m_kematian');
        $this->load->model('m_penduduk');
	}


    public function index()
    {
        $data['title'] = "Data Kematian - Desa Serpong";
        $data['kematian'] = $this->m_kematian->tampil();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/tampil_kematian');
        $this->load->view('template/footer');
    }
    public function tampil_kematian()
    {
        $data['title'] = "Data Kematian - Desa Serpong";
        $data['kematian'] = $this->m_kematian->tampil();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/tampil_kematian2');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Kematian - Desa Serpong";
        $data['penduduk'] =$this->m_penduduk->tampil();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/tambah_kematian');
        $this->load->view('template/footer');
    }

    public function proses_tambah()
    {
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $agama = $this->input->post('agama');
        $pekerjaan = $this->input->post('pekerjaan');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $hari_wafat = $this->input->post('hari_wafat');
        $tanggal_wafat = $this->input->post('tanggal_wafat');
        $pukul = $this->input->post('pukul');
    
        // Generate unique id_kematian value
        $id_kematian = uniqid();
    
        $data = array(
            'id_kematian' => $id_kematian,
            'nama' => ucwords($nama),
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'pekerjaan' => $pekerjaan,
            'alamat' => $alamat,
            'rt' => $rt,
            'rw' => $rw,
            'hari_wafat' => $hari_wafat,
            'tanggal_wafat' => $tanggal_wafat,
            'pukul' => $pukul,
        );
    
        // Insert data into database
        $this->m_kematian->tambah($data);
    
        // Set flash data and redirect
        $this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_kematian . ' berhasil ditambahkan.');
        redirect(base_url('kematian'));
    }
    

    public function edit($id_kematian)
    {
        $data['title'] = "Edit kematian - Desa Serpong";
        $data['kematian'] = $this->m_kematian->edit($id_kematian);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/edit_kematian');
        $this->load->view('template/footer');
    }

    public function proses_edit()
    {
        $data = array(

            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'agama' => $this->input->post('agama'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'hari_wafat' => $this->input->post('hari_wafat'),
            'tanggal_wafat' => $this->input->post('tanggal_wafat'),
            'pukul' => $this->input->post('pukul'),
        );
        $where = array(
            'id_kematian' => $this->input->post('id'),
        );
        $this->m_kematian->proses_edit($where, $data);

        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('kematian'));
    }

    public function hapus($id_kematian)
    {
        $this->m_kematian->hapus($id_kematian);
        $this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_kematian . ' berhasil dihapus.');
        redirect(base_url('kematian'));
    }

    public function detail($id_kematian)
    {
        $this->load->model('m_kematian');
        $detail = $this->m_kematian->detail($id_kematian);
        $data['detail'] = $detail;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/detail_kematian');
        $this->load->view('template/footer');
    }
}
