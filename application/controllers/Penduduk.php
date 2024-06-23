<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_penduduk');
        $this->load->model('Pagination_model');


        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = site_url('penduduk/index');
        $config['total_rows'] = $this->Pagination_model->get_total_rows('penduduk');
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

        $data['title'] = "Data Penduduk";
        $data['penduduk'] = $this->Pagination_model->get_data('penduduk', $config['per_page'], $page);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
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
        // Prepare data for updating
        $data = array(
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
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
        );

        $where = array('nik' => $this->input->post('nik'));

        $this->m_penduduk->proses_edit($where, $data);

        $this->session->set_flashdata('sukses', 'Data Dengan NIK ' . $this->input->post('nik') . ' berhasil diedit.');
        redirect(base_url('Penduduk'));
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

    public function search()
    {
        $keyword = trim($this->input->post('keyword'));
        $data['title'] = "Data Penduduk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penduduk'] = $this->m_penduduk->search($keyword);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penduduk/tampil_penduduk', $data);
        $this->load->view('template/footer');
    }
}
