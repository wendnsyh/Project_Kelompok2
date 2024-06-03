<?php

class Penghasilan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penghasilan');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Sk Penghasilan - Kelurahan Serpong";
        $data['surat'] = $this->M_penghasilan->daftar_penghasilan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/penghasilan/daftar_surat_penghasilan', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Sk Penghasilan - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_penghasilan->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Penghasilan', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan Penghasilan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/penghasilan/tambah_surat_penghasilan', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/penghasilan/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/penghasilan/tambah_surat_penghasilan', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                $data_surat = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'jumlah_penghasilan' => $this->input->post('jumlah'),
                    'keperluan_penghasilan' => $this->input->post('keperluan'),
                    'surat_pengantar' => $surat_pengantar,
                );

                $this->M_penghasilan->tambah_penghasilan($data_surat);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('Penghasilan/'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Sk Penghasilan - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_penghasilan->pejabat();
        $data['penghasilan'] = $this->M_penghasilan->edit_penghasilan($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Penghasilan', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan Penghasilan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/penghasilan/edit_surat_penghasilan', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/penghasilan/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/penghasilan/edit_surat_penghasilan', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                $data_edit = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'jumlah_penghasilan' => $this->input->post('jumlah'),
                    'keperluan_penghasilan' => $this->input->post('keperluan'),
                    'surat_pengantar' => $surat_pengantar,
                );
                $where = array(
                    'id_penghasilan' => $this->input->post('id'),
                );

                $this->M_penghasilan->proses_edit_penghasilan($where, $data_edit);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('Penghasilan/'));
            }
        }
    }
       

    public function hapus($id)
    {

        $this->M_penghasilan->hapus_penghasilan($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('Penghasilan/'));
    }

    public function cetak($id)
    {

        $data['penghasilan'] = $this->M_penghasilan->cetak_penghasilan($id);
        $this->load->view('surat/penghasilan/cetak_surat_penghasilan', $data);
    }
}
