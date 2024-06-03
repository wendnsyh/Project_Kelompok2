<?php

class BelumMenikah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_belum_menikah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data SK Belum Menikah";
        $data['surat'] = $this->M_belum_menikah->daftar_belum_menikah();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/belum_menikah/daftar_belum_menikah', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $data['title'] = "Tambah SK Belum Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_belum_menikah->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/belum_menikah/tambah_belum_menikah', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/BelumMenikah/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;
    
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/belum_menikah/tambah_belum_menikah', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');
    
                $data_surat = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'alasan' => $this->input->post('alasan'),
                    'tanggal_belum_menikah' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar,
                );
    
                $this->M_belum_menikah->tambah_belum_menikah($data_surat);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('BelumMenikah/'));
            }
        }
    }
    
    public function edit($id)
    {
        $data['title'] = "Edit Data SK Belum Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_belum_menikah->pejabat();
        $data['belum_menikah'] = $this->M_belum_menikah->edit_belum_menikah($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/belum_menikah/edit_belum_menikah', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/BelumMenikah/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;
    
            //if (!is_dir($config['upload_path'])) {
              //  mkdir($config['upload_path'], 0777, TRUE);
           // }
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/belum_menikah/edit_belum_menikah', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');
    
                $data_edit = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'alasan' => $this->input->post('alasan'),
                    'surat_pengantar' => $surat_pengantar,
                );
                $where = array(
                    'id_belum_menikah' => $this->input->post('id'),
                );
    
                $this->M_belum_menikah->proses_edit_belum_menikah($where, $data_edit);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('BelumMenikah/'));
            }
        }
    }
    
    public function hapus($id)
    {

        $this->M_belum_menikah->hapus_belum_menikah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('BelumMenikah/'));
    }

    public function cetak($id)
    {

        $data['belum_menikah'] = $this->M_belum_menikah->cetak_belum_menikah($id);
        $this->load->view('surat/belum_menikah/cetak_belum_menikah', $data);
    }
}
