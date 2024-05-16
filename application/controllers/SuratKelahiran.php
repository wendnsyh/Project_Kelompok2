<?php

class SuratKelahiran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_kelahiran');
        $this->load->model('m_penduduk');
    }

    public function index()
    {

        $data['title'] = "Data Kelahiran Desa Serpong";
        $data['surat_kelahiran']=$this->M_surat_kelahiran->daftar_surat_kelahiran();
        

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/kelahiran/daftar_surat_kelahiran');
        $this->load->view('template/footer');
    }


    public function tambah()
    {

        $data['title'] = " Tambah Data Kelahiran";
        $data['pendudukkk'] = $this->m_penduduk->tampil();

        $this->load->view('template/header', $data);
        $this->load->view("template/sidebar");
        $this->load->view('template/topbar');
        $this->load->view('surat/kelahiran/tambah_surat_kelahiran');
        $this->load->view('template/footer');
    }

    public function proses_tambah()
    {
        if ($this->input->post('tambah_surat_kelahiran')) {
            $data = array(
                'nik_ayah' => $this->input->post('ayah'),
                'nik_ibu' => $this->input->post('ibu'),
                'nik_pelapor' => $this->input->post('pelapor'),
                'nama_anak' => $this->input->post('nama'),
                'kelamin_anak' => $this->input->post('kelamin'),
                'tempat_lahir_anak' => $this->input->post('tempat'),
                'tanggal_lahir_anak' => $this->input->post('tanggal'),
                'jam_lahir_anak' => $this->input->post('jam'),
                'hari_lahir_anak' => $this->input->post('hari'),
                'id_pejabat' => $this->input->post('pejabat'),
                'hubungan_sebagai' => $this->input->post('hubungan'),
                'tanggal_surat_kelahiran' => date('Y-m-d'),
            );

            $this->M_surat_kelahiran->tambah_surat_kelahiran($data);
            $data['pendudukkk'] = $this->m_penduduk->tampil();
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
            redirect(base_url('SuratKelahiran'));
        } else {
            $this->tambah();
        }
    }

    public function edit()
    {
        if ($this->input->post('edit_surat_kelahiran')) {
            $data = array(
                'nik_ayah' => $this->input->post('ayah'),
                'nik_ibu' => $this->input->post('ibu'),
                'nik_pelapor' => $this->input->post('pelapor'),
                'nama_anak' => $this->input->post('nama'),
                'kelamin_anak' => $this->input->post('kelamin'),
                'tempat_lahir_anak' => $this->input->post('tempat'),
                'tanggal_lahir_anak' => $this->input->post('tanggal'),
                'jam_lahir_anak' => $this->input->post('jam'),
                'hari_lahir_anak' => $this->input->post('hari'),
                'id_pejabat' => $this->input->post('pejabat'),
                'hubungan_sebagai' => $this->input->post('hubungan'),
            );
            $where = array(
                'id_surat_kelahiran' => $this->input->post('id'),
            );
            $this->M_surat_kelahiran->proses_edit_surat_kelahiran($where, $data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
            redirect(base_url('surat/surat_kelahiran/'));
        } else {
            $data['title'] = "Surat Kelahiran - Desa Serpong";
            $data['penduduk'] = $this->m_penduduk->tampil();
            $data['pendudukk'] = $this->m_penduduk->tampil();
            $data['pendudukkk'] = $this->m_penduduk->tampil();
            $data['pejabat'] = $this->m_surat_kelahiran->pejabat();
            $data['surat_kelahiran'] = $this->m_surat_kelahiran->edit_surat_kelahiran($this->uri->segment('4'));
            $this->load->view('header', $data);
            $this->load->view('surat/edit_surat_kelahiran', $data);
            $this->load->view('footer');
        }
    }

    public function hapus()
    {
        $this->M_surat_kelahiran->hapus_surat_kelahiran($this->uri->segment('4'));
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
        redirect(base_url('surat/kelahiran/daftar_surat_kelahiran'));
    }

    public function cetak()
    {
        $data['surat_kelahiran'] = $this->M_surat_kelahiran->cetak_surat_kelahiran($this->uri->segment('4'));
        $this->load->view('surat/kelahiran/cetak_surat_kelahiran', $data);
    }
}
