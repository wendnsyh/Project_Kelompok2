<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelahiran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_kelahiran');
		$this->load->model('Pagination_model');
	}

	public function index()
	{
		$config['base_url'] = site_url('kelahiran/index');
		$config['total_rows'] = $this->Pagination_model->get_total_rows('kelahiran');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$choice = $config["total_rows"] / $config['per_page'];
		$config["num_links"] = floor($choice);

		// Customizing pagination links
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = "Data kelahiran - Desa SERPONG	";
		$data['kelahiran'] = $this->Pagination_model->get_data('kelahiran', $config['per_page'], $page);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pagination'] = $this->pagination->create_links();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('kelahiran/tampil_kelahiran', $data);
		$this->load->view('template/footer');
	}



	public function tambah()
	{
		$data['title'] = "Tambah kelahiran - Desa Serpong";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('kelahiran/tambah_kelahiran', $data);
		$this->load->view('template/footer');
	}

	public function proses_tambah()
	{
		// Validasi input
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('pukul', 'Pukul', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('rt', 'RT', 'required');
		$this->form_validation->set_rules('rw', 'RW', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke halaman tambah data
			$this->session->set_flashdata('error', validation_errors());
			redirect('kelahiran/tambah');
		} else {
			// Jika validasi berhasil, lanjutkan proses penyimpanan data
			$data = array(
				'nama' => ucwords($this->input->post('nama')),
				'hari' => ucwords($this->input->post('hari')),
				'tempat_lahir' => ucwords($this->input->post('tempat_lahir')),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'pukul' => $this->input->post('pukul'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'nama_ayah' => ucwords($this->input->post('nama_ayah')),
				'pekerjaan_ayah' => ucwords($this->input->post('pekerjaan_ayah')),
				'pekerjaan_ibu' => ucwords($this->input->post('pekerjaan_ibu')),
				'nama_ibu' => ucwords($this->input->post('nama_ibu')),
				'alamat' => ucwords($this->input->post('alamat')),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
			);

			$this->M_kelahiran->tambah($data);

			$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
			redirect('kelahiran');
		}
	}

	public function edit($id_kelahiran)
	{
		$data['title'] = "Edit kelahiran - Desa Serpong";
		$data['kelahiran'] = $this->M_kelahiran->edit($this->uri->segment(3));
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('kelahiran/edit_kelahiran', $data);
		$this->load->view('template/footer');
	}



	public function proses_edit()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'hari' => $this->input->post('hari'),
			'tempat_lahir' =>  $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'pukul' =>  $this->input->post('pukul'),
			'jenis_kelamin' =>   $this->input->post('jenis_kelamin'),
			'nama_ayah' =>  $this->input->post('nama_ayah'),
			'nama_ibu' =>  $this->input->post('nama_ibu'),
			'alamat' => $this->input->post('alamat'),
			'rt' =>  $this->input->post('rt'),
			'rw' =>  $this->input->post('rw'),
			'pekerjaan_ayah' => ucwords($this->input->post('pekerjaan_ayah')),
			'pekerjaan_ibu' => ucwords($this->input->post('pekerjaan_ibu')),
		);
		$where = array(
			'id_kelahiran' => $this->input->post('id'),
		);
		$this->M_kelahiran->proses_edit($where, $data);
		$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
		redirect(base_url('Kelahiran'));
	}

	public function hapus($id_kelahiran)
	{
		$this->M_kelahiran->hapus($id_kelahiran);
		$this->session->set_flashdata('sukses', 'Data dengan id_kelahiran ' . $id_kelahiran . ' berhasil dihapus.');
		redirect(base_url('Kelahiran'));
	}

	public function detail($id_kelahiran)
	{
		$data['title'] = "Detail kelahiran - Desa Serpong";
		$this->load->model('M_kelahiran');
		$detail = $this->M_kelahiran->detail($id_kelahiran);
		$data['detail'] = $detail;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('kelahiran/detail_kelahiran', $data);
		$this->load->view('template/footer');
	}

	public function search()
    {
        $keyword = trim($this->input->post('keyword'));
        $data['title'] = "Data Kelahiran";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelahiran'] = $this->M_kelahiran->search($keyword);

      
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('kelahiran/tampil_kelahiran', $data);
		$this->load->view('template/footer');
    }
}
