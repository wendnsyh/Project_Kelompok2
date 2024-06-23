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
        $this->load->model('Pagination_model');
    }


    public function index()
    {

        $config['base_url'] = site_url('kematian/index');
        $config['total_rows'] = $this->Pagination_model->get_total_rows('kematian');
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

        $data['title'] = "Data kematian - Kelurahan Serpong	";
        $data['kematian'] = $this->Pagination_model->get_data('kematian', $config['per_page'], $page);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/tampil_kematian', $data);
        $this->load->view('template/footer');
    }
    public function tampil_kematian()
    {
        $data['title'] = "Data Kematian - Desa Serpong";
        $data['kematian'] = $this->m_kematian->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/tampil_kematian2', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $data['title'] = "Tambah Data Kematian - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/tambah_kematian', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah()
    {
        // Set validation rules
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('hari_wafat', 'Hari Wafat', 'required');
        $this->form_validation->set_rules('tanggal_wafat', 'Tanggal Wafat', 'required');
        $this->form_validation->set_rules('pukul', 'Pukul', 'required');
        $this->form_validation->set_rules('sebab_wafat', 'Sebab Wafat', 'required');
        $this->form_validation->set_rules('tempat_wafat', 'Tempat Wafat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form tambah dengan error message
            $this->tambah();
        } else {
            // Jika validasi berhasil, proses data
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
            $sebab_wafat = $this->input->post('sebab_wafat');
            $tempat_wafat = $this->input->post('tempat_wafat');


            $data = array(

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
                'sebab_wafat' => $sebab_wafat,
                'tempat_wafat' => $tempat_wafat,
            );

            // Insert data into database
            $this->m_kematian->tambah($data);

            // Set flash data and redirect
            $this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_kematian . ' berhasil ditambahkan.');
            redirect(base_url('kematian'));
        }
    }


    public function edit($id_kematian)
    {
        $data['title'] = "Edit kematian - Desa Serpong";
        $data['kematian'] = $this->m_kematian->edit($id_kematian);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/edit_kematian', $data);
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
            'sebab_wafat' => $this->input->post('sebab_wafat'),
            'tempat_wafat' => $this->input->post('tempat_wafat'),
        );

        $where = array(
            'id_kematian' => $this->input->post('id'),
        );

        // Update data ke dalam database
        $this->m_kematian->proses_edit($where, $data);

        // Set flash data dan redirect ke halaman kematian
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/detail_kematian', $data);
        $this->load->view('template/footer');
    }
    public function search()
    {
        $keyword = trim($this->input->post('keyword'));
        $data['title'] = "Data Kematian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kematian'] = $this->m_kematian->search($keyword);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kematian/tampil_kematian', $data);
        $this->load->view('template/footer');
    }
}
