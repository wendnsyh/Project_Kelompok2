<?php

class SuratKematian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_kematian');
        $this->load->model('m_penduduk');
    }
    public function index()
    {
        $data['title'] = "Surat Kematian - Desa Serpong";
        $data['surat_kematian'] = $this->M_surat_kematian->daftar_surat_kematian();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/kematian/daftar_surat_kematian', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Surat Kematian - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukkk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_surat_kematian->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pelapor', 'NIK Pelapor', 'required');
        $this->form_validation->set_rules('umur', 'Umur Pelapor', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Kematian', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kematian', 'required');
        $this->form_validation->set_rules('jam', 'Jam Kematian', 'required');
        $this->form_validation->set_rules('hari', 'Hari Kematian', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('hubungan', 'Hubungan Sebagai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/kematian/tambah_surat_kematian', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/bukti/kematian/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/kematian/tambah_surat_kematian', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'nik_pelapor' => $this->input->post('pelapor'),
                    'umur_pelapor' => $this->input->post('umur'),
                    'tempat_kematian' => $this->input->post('tempat'),
                    'tanggal_kematian' => $this->input->post('tanggal'),
                    'jam_kematian' => $this->input->post('jam'),
                    'hari_kematian' => $this->input->post('hari'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'hubungan_sebagai' => $this->input->post('hubungan'),
                    'tanggal_surat_kematian' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar,
                );

                $this->M_surat_kematian->tambah_surat_kematian($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('SuratKematian/'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Surat Kematian - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukkk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_surat_kematian->pejabat();
        $data['id'] = $id;
        $data['surat_kematian'] = $this->M_surat_kematian->edit_surat_kematian($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pelapor', 'NIK Pelapor', 'required');
        $this->form_validation->set_rules('umur', 'Umur Pelapor', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Kematian', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kematian', 'required');
        $this->form_validation->set_rules('jam', 'Jam Kematian', 'required');
        $this->form_validation->set_rules('hari', 'Hari Kematian', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('hubungan', 'Hubungan Sebagai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/kematian/edit_surat_kematian', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/bukti/kematian/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/kematian/edit_surat_kematian', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'nik_pelapor' => $this->input->post('pelapor'),
                    'umur_pelapor' => $this->input->post('umur'),
                    'tempat_kematian' => $this->input->post('tempat'),
                    'tanggal_kematian' => $this->input->post('tanggal'),
                    'jam_kematian' => $this->input->post('jam'),
                    'hari_kematian' => $this->input->post('hari'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'hubungan_sebagai' => $this->input->post('hubungan'),
                );
                $where = array(
                    'id_surat_kematian' => $id,
                );
                $this->M_surat_kematian->proses_edit_surat_kematian($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('SuratKematian/'));
            }
        }
    }

    public function hapus($id)
    {
        $this->M_surat_kematian->hapus_surat_kematian($id);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
        redirect(base_url('SuratKematian/'));
    }

    public function cetak($id)
    {
        $data['surat_kematian'] = $this->M_surat_kematian->cetak_surat_kematian($id);
        $this->load->view('surat/kematian/cetak_surat_kematian', $data);
    }
}
