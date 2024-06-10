<?php

class SkUsaha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_usaha');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data SK Usaha";
        $data['surat'] = $this->M_usaha->daftar_usaha();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar',$data);
        $this->load->view('surat/usaha/daftar_surat_usaha', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah SK Usaha";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_usaha->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Form validation rules
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('nama', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('sejak', 'Sejak Usaha', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat Usaha', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('surat/usaha/tambah_usaha', $data);
            $this->load->view('template/footer', $data);
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar') || !$this->upload->do_upload('bukti_usaha')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar');
                $this->load->view('surat/usaha/tambah_usaha', $data);
                $this->load->view('template/footer', $data);
            } else {
                $surat_pengantar = $this->upload->data('file_name');
                $bukti_usaha = $this->upload->data('file_name');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'nama_usaha' => $this->input->post('nama'),
                    'sejak_usaha' => $this->input->post('sejak'),
                    'alamat_usaha' => $this->input->post('alamat'),
                    'tanggal_usaha' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar,
                    'bukti_usaha' => $bukti_usaha
                );

                $this->M_usaha->tambah_usaha($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
                redirect(base_url('SkUsaha/'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Sk Usaha";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_usaha->pejabat();
        $data['usaha'] = $this->M_usaha->edit_usaha($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Form validation rules
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('nama', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('sejak', 'Sejak Usaha', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat Usaha', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('surat/usaha/edit_usaha', $data);
            $this->load->view('template/footer', $data);
        } else {
            $config['upload_path'] = './uploads/usaha/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            $upload_surat_pengantar = $this->upload->do_upload('surat_pengantar');
            $upload_bukti_usaha = $this->upload->do_upload('bukti_usaha');

            if (!$upload_surat_pengantar && !$upload_bukti_usaha) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('surat/usaha/edit_usaha', $data);
                $this->load->view('template/footer', $data);
            } else {
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'nama_usaha' => $this->input->post('nama'),
                    'sejak_usaha' => $this->input->post('sejak'),
                    'alamat_usaha' => $this->input->post('alamat')
                );

                if ($upload_surat_pengantar) {
                    $data['surat_pengantar'] = $this->upload->data('file_name');
                }

                if ($upload_bukti_usaha) {
                    $data['bukti_usaha'] = $this->upload->data('file_name');
                }

                $where = array(
                    'id_usaha' => $this->input->post('id'),
                );

                $this->M_usaha->proses_edit_usaha($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('SKUsaha'));
            }
        }
    }

    public function hapus($id)
    {
        $this->M_usaha->hapus_usaha($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('SkUsaha/'));
    }

    public function cetak($id)
    {
        $data['usaha'] = $this->M_usaha->cetak_usaha($id);
        $this->load->view('surat/usaha/cetak_usaha', $data);
    }
}
