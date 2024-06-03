<?php

class SkMenikah extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menikah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Daftar Sk Menikah";
        $data['surat'] = $this->M_menikah->daftar_menikah();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/sk_menikah/daftar_skmenikah', $data);
        $this->load->view('template/header');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Sk Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_menikah->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Set rules for form validation
        $this->form_validation->set_rules('nik', 'NIK ', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, load the view with validation errors
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/sk_menikah/tambah_skmenikah', $data);
            $this->load->view('template/footer');
        } else {
            // If validation succeeds, continue with the add process
            $config['upload_path'] = './uploads/menikah/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // If failed to upload photo
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/sk_menikah/tambah_skmenikah', $data);
                $this->load->view('template/footer');
            } else {
                // If successfully uploaded photo
                $surat_pengantar = $this->upload->data('file_name');
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'alasan' => $this->input->post('alasan'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'surat_pengantar' => $surat_pengantar,
                    'tanggal_menikah' => date('Y-m-d'),
                );
                $this->M_menikah->tambah_menikah($data);
                $this->session->set_flashdata('Sukses', 'Data berhasil di tambahkan');
                redirect(base_url('SkMenikah'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data SK Menikah";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_menikah->pejabat();
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['menikah'] = $this->M_menikah->edit_menikah($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Set rules for form validation
        $this->form_validation->set_rules('nik', 'NIK ', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, load the view with validation errors
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('surat/sk_menikah/edit_skmenikah', $data);
            $this->load->view('template/footer');
        } else {
            // If validation succeeds, continue with the edit process
            $config['upload_path'] = './uploads/menikah/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                // If failed to upload photo
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/sk_menikah/edit_skmenikah', $data);
                $this->load->view('template/footer');
            } else {
                // If successfully uploaded photo
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'alasan' => $this->input->post('alasan'),
                    'id_pejabat' => $this->input->post('pejabat'),
                );
                $where = array(
                    'id_menikah' => $this->input->post('id'),
                );
                $this->M_menikah->proses_edit_menikah($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('SkMenikah/'));
            }
        }
    }

    public function hapus($id)
    {

        $this->M_menikah->hapus_menikah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('SkMenikah/'));
    }

    public function cetak($id)
    {

        $data['menikah'] = $this->M_menikah->cetak_menikah($id);
        $this->load->view('surat/sk_menikah/cetak_skmenikah', $data);
    }
}
