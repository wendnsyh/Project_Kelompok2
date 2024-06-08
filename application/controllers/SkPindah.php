<?php

class SkPindah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSkPindah');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Data SK Pindah";
        $data['surat'] = $this->ModelSkPindah->daftar_pindah();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('surat/pindah/daftar_pindah', $data);
        $this->load->view('template/footer');
    }


    public function tambah()
    {
        $data['title'] = "Surat Pindah - Kelurahan SERPONG";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->ModelSkPindah->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nik_kepala', 'NIK Kepala Keluarga', 'required');
        $this->form_validation->set_rules('nik_pemohon', 'NIK Pemohon', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan Pindah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pindah', 'required');
        $this->form_validation->set_rules('rt', 'RT Pindah', 'required');
        $this->form_validation->set_rules('rw', 'RW Pindah', 'required');
        $this->form_validation->set_rules('desa', 'Desa Pindah', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan Pindah', 'required');
        $this->form_validation->set_rules('kota', 'kota Pindah', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi Pindah', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos Pindah', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/pindah/tambah_pindah', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/SuratPindah';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/pindah/tambah_pindah', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                $data = array(
                    'nik_kepala_keluarga' => $this->input->post('nik_kepala'),
                    'nik_pemohon' => $this->input->post('nik_pemohon'),
                    'alasan_pindah' => $this->input->post('alasan'),
                    'alamat_pindah' => $this->input->post('alamat'),
                    'rt_pindah' => $this->input->post('rt'),
                    'rw_pindah' => $this->input->post('rw'),
                    'desa_pindah' => $this->input->post('desa'),
                    'kecamatan_pindah' => $this->input->post('kecamatan'),
                    'kota_pindah' => $this->input->post('kota'),
                    'provinsi_pindah' => $this->input->post('provinsi'),
                    'kode_pos_pindah' => $this->input->post('kode_pos'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'tanggal_pindah' => date('Y-m-d'),
                    'surat_pengantar' => $surat_pengantar
                );

                $this->ModelSkPindah->tambah_pindah($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
                redirect(base_url('SkPindah/'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Surat Pindah";
        $data['pindah'] = $this->ModelSkPindah->edit_pindah($id);
        $data['id'] = $id;
        $data['pejabat'] = $this->ModelSkPindah->pejabat();
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nik_kepala', 'NIK Kepala Keluarga', 'required');
        $this->form_validation->set_rules('nik_pemohon', 'NIK Pemohon', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan Pindah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pindah', 'required');
        $this->form_validation->set_rules('rt', 'RT Pindah', 'required');
        $this->form_validation->set_rules('rw', 'RW Pindah', 'required');
        $this->form_validation->set_rules('desa', 'Desa Pindah', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan Pindah', 'required');
        $this->form_validation->set_rules('kota', 'kota Pindah', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi Pindah', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos Pindah', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/pindah/edit_pindah', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nik_kepala_keluarga' => $this->input->post('nik_kepala'),
                'nik_pemohon' => $this->input->post('nik_pemohon'),
                'alasan_pindah' => $this->input->post('alasan'),
                'alamat_pindah' => $this->input->post('alamat'),
                'rt_pindah' => $this->input->post('rt'),
                'rw_pindah' => $this->input->post('rw'),
                'desa_pindah' => $this->input->post('desa'),
                'kecamatan_pindah' => $this->input->post('kecamatan'),
                'kota_pindah' => $this->input->post('kota'),
                'provinsi_pindah' => $this->input->post('provinsi'),
                'kode_pos_pindah' => $this->input->post('kode_pos'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_pindah' => date('Y-m-d')
            );
            $where = array(
                'id_pindah' => $this->input->post('id'),
            );

            $this->ModelSkPindah->proses_edit_pindah($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diupdate');
            redirect(base_url('SkPindah/'));
        }
    }

    public function hapus($id)
    {
        $this->ModelSkPindah->hapus_pindah($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil terhapus');
        redirect(base_url('Skpindah/'));
    }

    public function cetak($id)
    {
        $data['pindah'] = $this->ModelSkPindah->cetak_pindah($id);
        $this->load->view('surat/pindah/cetak_pindah', $data);
    }
}
