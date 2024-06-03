<?php

class SkBatal_pindah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_batal_pindah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data Surat Keterangan Batal Pindah - Kelurahan Serpong";
        $data['surat'] = $this->M_batal_pindah->daftar_batal_pindah();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/batal_pindah/daftar_surat_batal', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Surat Keterangan Batal Pindah - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_batal_pindah->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/batal_pindah/tambah_surat_batal', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/BatalPindah/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;
    
            //if (!is_dir($config['upload_path'])) {
              //  mkdir($config['upload_path'], 0777, TRUE);
            //}
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/batal_pindah/tambah_surat_batal', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');
    
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'alamat_batal_pindah' => $this->input->post('alamat'),
                    'alasan' => $this->input->post('alasan'),
                    'tanggal_batal_pindah' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar,
                );
    
                $this->M_batal_pindah->tambah_batal_pindah($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('BatalPindah/'));
            }
        }
    }
    
    public function edit($id)
    {
        $data['title'] = "Edit Surat Keterangan Batal Pindah - Kelurahan Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_batal_pindah->pejabat();
        $data['batal_pindah'] = $this->M_batal_pindah->edit_batal_pindah($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/batal_pindah/edit_surat_batal', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/bukti/surat_pengantar/';
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
                $this->load->view('surat/batal_pindah/edit_surat_batal', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');
    
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'alamat_batal_pindah' => $this->input->post('alamat'),
                    'alasan' => $this->input->post('alasan'),
                    'surat_pengantar' => $surat_pengantar,
                );
                $where = array(
                    'id_batal_pindah' => $this->input->post('id'),
                );
    
                $this->M_batal_pindah->proses_edit_batal_pindah($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('BatalPindah/'));
            }
        }
    }
    
    public function hapus($id)
    {

        $this->M_batal_pindah->hapus_batal_pindah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('BatalPindah/'));
    }

    public function cetak($id)
    {

        $data['batal_pindah'] = $this->M_batal_pindah->cetak_batal_pindah($id);
        $this->load->view('surat/batal_pindah/cetak_surat_batal', $data);
    }
}
