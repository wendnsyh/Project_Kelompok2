<?php

class SuratBekerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_izin_keluarga');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "DATA SURAT IZIN BEKERJA";
        $data['surat'] = $this->M_izin_keluarga->daftar_izin_keluarga();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/izin/daftar_izin', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Surat Izin";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_izin_keluarga->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Set rules for form validation
        $this->form_validation->set_rules('ayah', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('anak', 'NIK Anak', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, load the view with validation errors
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/izin/tambah_izin', $data);
            $this->load->view('template/footer');
        } else {
            // If validation succeeds, continue with the add process
            $config['upload_path'] = './uploads/izin_bekerja/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // If failed to upload photo
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/izin/tambah_izin', $data);
                $this->load->view('template/footer');
            } else {
                // If successfully uploaded photo
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik_ayah' => $this->input->post('ayah'),
                    'nik_anak' => $this->input->post('anak'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'tujuan_izin_keluarga' => $this->input->post('tujuan'),
                    'tanggal_izin_keluarga' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar // Save photo file name to database
                );

                $this->M_izin_keluarga->tambah_izin_keluarga($data);
                $this->session->set_flashdata('Sukses', 'Data berhasil ditambahkan');
                redirect(base_url('SuratBekerja/'));
            }
        }
    }


    public function edit($id)
    {
        $data['title'] = "Edit Surat Izin";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_izin_keluarga->pejabat();
        $data['id'] = $id;
        $data['bekerja'] = $this->M_izin_keluarga->edit_izin_keluarga($id);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Set rules for form validation
        $this->form_validation->set_rules('nik', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('anak', 'NIK Anak', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, load the view with validation errors
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('surat/izin/edit_izin', $data);
            $this->load->view('template/footer');
        } else {
            // If validation succeeds, continue with the edit process
            $config['upload_path'] = './uploads/izin_bekerja/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // If failed to upload photo
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header');
                $this->load->view('template/sidebar',$data);
                $this->load->view('template/topbar');
                $this->load->view('surat/izin/edit_izin', $data);
                $this->load->view('template/footer');
            } else {
                // If successfully uploaded photo
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik_ayah' => $this->input->post('nik'),
                    'nik_anak' => $this->input->post('anak'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'tujuan_izin_keluarga' => $this->input->post('tujuan'),
                    'surat_pengantar' => $surat_pengantar // Save photo file name to database
                );

                $where = array(
                    'id_izin_keluarga' => $this->input->post('id'),
                );

                $this->M_izin_keluarga->proses_edit_izin_keluarga($where, $data);
                $this->session->set_flashdata('sukses', 'Data Berhasil di Edit');
                redirect(base_url('SuratBekerja/'));
            }
        }
    }


    public function hapus($id)
    {
        $this->M_izin_keluarga->hapus_izin_keluarga($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil di hapus');
        redirect(base_url('SuratBekerja/'));
    }

    public function cetak($id)
    {
        $data['izin_keluarga'] = $this->M_izin_keluarga->cetak_izin_keluarga($id);
        $this->load->view('surat/izin/cetak_izin', $data);
    }
}
