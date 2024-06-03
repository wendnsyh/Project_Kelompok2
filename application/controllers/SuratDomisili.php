<?php

class SuratDomisili extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_domisili');
        $this->load->model('m_penduduk');
    }


    public function index()
    {
        $data['title'] = "Surat Domisili";
        $data['surat'] = $this->M_domisili->daftar_domisili();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/domisili/daftar_domisili', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Surat Domisili";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_domisili->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/domisili/tambah_surat_domisili', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/domisili';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/domisili/tambah_surat_domisili', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'alasan' => $this->input->post('alasan'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'tanggal_domisili' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar
                );

                $this->M_domisili->tambah_domisili($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('SuratDomisili/'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Surat Domisili";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_domisili->pejabat();
        $data['domisili'] = $this->M_domisili->edit_domisili($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/domisili/edit_surat_domisili', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/domisili/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            $upload_surat_pengantar = $this->upload->do_upload('surat_pengantar');

            if (!$upload_surat_pengantar) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/domisili/edit_surat_domisili', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'alasan' => $this->input->post('alasan'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'tanggal_domisili' => date('Y-m-d')
                );

                if ($upload_surat_pengantar) {
                    $data['surat_pengantar'] = $this->upload->data('file_name');
                }

                $where = array(
                    'id_domisili' => $this->input->post('id'),
                );

                $this->M_domisili->proses_edit_domisili($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('SuratDomisili/'));
            }
        }
    }

    public function hapus($id)
    {

        $this->M_domisili->hapus_domisili($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('SuratDomisili/'));
    }

    public function cetak($id)
    {

        $data['domisili'] = $this->M_domisili->cetak_domisili($id);
        $this->load->view('surat/domisili/cetak_surat_domisili', $data);
    }
}
