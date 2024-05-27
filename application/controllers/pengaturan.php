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
		$this->load->view('pengaturan/tampil_staff', $data);
		$this->load->view('template/footer', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Data Staff - Kelurahan Serpong";

		if ($this->input->post('tambah_staff')) {
			$data = array(
				'nama_pejabat' => $this->input->post('nama'),
				'nip_pejabat' => $this->input->post('nip'),
				'jabatan_pejabat' => $this->input->post('jabatan'),
				'alamat' => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('kelamin'),
			);
			$this->M_pengaturan->tambah_staff($data);
			$this->session->set_flashdata('Sukses', 'Data berhasil di tambahkan');
			redirect(base_url('Pengaturan/'));
		} else {
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
			$this->load->view('pengaturan/tambah_staff', $data);
			$this->load->view('template/footer');
		}
	}

	public function edit($id)
	{
		$data['title'] = "Edit Data Staff - Kelurahan Serpong";
		$data['pengaturan'] = $this->M_pengaturan->edit($id);
		$data['id'] = $id;

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('pengaturan/edit_staff', $data);
		$this->load->view('template/footer', $data);
	}

	public function proses_edit()
	{

		if ($this->input->post('edit_staff')) {
			$data = array(
				'nama_pejabat' => $this->input->post('nama'),
				'nip_pejabat' => $this->input->post('nip'),
				'jabatan_pejabat' => $this->input->post('jabatan'),
				'alamat' => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('kelamin'),
			);
			$where = array(
				'id_pejabat' => $this->input->post('id'),
			);

			$this->M_pengaturan->proses_edit($where, $data);
			$this->session->set_flashdata('sukses', 'Data Dengan ID  berhasil diedit.');
			redirect(base_url('pengaturan/'));
		}
	}
	public function hapus($id)
	{

		$this->M_pengaturan->hapus_pengaturan($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil dihapus</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>');
		redirect(base_url('Pengaturan/'));
	}
}
