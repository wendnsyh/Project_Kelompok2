<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengaturan');
	}

	public function index()
	{
		$data['title'] = "Pengaturan - Desa Serpong Rw 001";
		$data['pengaturan'] = $this->M_pengaturan->tampil();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
		$this->load->view('pengaturan/tampil_pengaturan');
		$this->load->view('template/footer', $data);
	}

	public function edit()
	{
		$data['title'] = "Edit Pengaturan - Desa Serpong Rw 001";
		$data['pengaturan'] = $this->M_pengaturan->edit($this->uri->segment(3));

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
		$this->load->view('pengaturan/tampil_pengaturan');
		$this->load->view('template/footer', $data);
	}

	public function proses_edit()
	{
		$data = array(
			'nama_pejabat' => $this->input->post('nama'),
			'nip_pejabat' => $this->input->post('nip'),
			'jabatan_pejabat' => $this->input->post('jabatan'),
		);
		$where = array(
			'id_pejabat' => $this->input->post('id'),
		);
		$this->M_pengaturan->proses_edit($where, $data);
		$this->session->set_flashdata('sukses', 'Data Dengan ID  berhasil diedit.');
		redirect(base_url('pengaturan/'));
	}
}