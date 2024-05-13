<?php

class SuratKematian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_kematian');
        $this->load->model('m_penduduk');
    }

    public function surat_kematian()
    {
        if ($this->uri->segment('3') == "tambah") {
            if ($this->input->post('tambah_surat_kematian')) {
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
                );
                $this->M_surat_kematian->tambah_surat_kematian($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                redirect(base_url('SuratKematian/surat_kematian/'));
            } else {
                $data['title'] = "Surat Kematian - Desa Serpong";
                $data['penduduk'] = $this->m_penduduk->tampil();
                $data['pendudukkk'] = $this->m_penduduk->tampil();
                $data['pejabat'] = $this->M_surat_kematian->pejabat();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/kematian/tambah_surat_kematian', $data);
                $this->load->view('template/footer');
            }
        } elseif ($this->uri->segment('3') == "edit") {
            if ($this->input->post('edit_surat_kematian')) {
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
                    'id_surat_kematian' => $this->input->post('id'),
                );
                $this->M_surat_kematian->proses_edit_surat_kematian($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('SuratKematian/surat_kematian/'));
            } else {
                $data['title'] = "Surat Kematian - Desa Serpong";
                $data['penduduk'] = $this->m_penduduk->tampil();
                $data['pendudukkk'] = $this->m_penduduk->tampil();
                $data['pejabat'] = $this->M_surat_kematian->pejabat();
                $data['surat_kematian'] = $this->M_surat_kematian->edit_surat_kematian($this->uri->segment('4'));
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/kematian/edit_surat_kematian', $data);
                $this->load->view('template/footer');
            }
        } elseif ($this->uri->segment('3') == "cetak") {
            $data['surat_kematian'] = $this->M_surat_kematian->cetak_surat_kematian($this->uri->segment('4'));
            $this->load->view('surat/kematian/cetak_surat_kematian', $data);
        } elseif ($this->uri->segment('3') == "hapus") {
            $this->M_surat_kematian->hapus_surat_kematian($this->uri->segment('4'));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(base_url('SuratKematian/surat_kematian'));
        } else {
            $data['title'] = "Surat Kematian - Desa Serpong";
            $data['surat'] = $this->M_surat_kematian->daftar_surat_kematian();
             
            $mutasi=$this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/kematian/daftar_surat_kematian', $data);
            $this->load->view('template/footer');
        }
    }
}
