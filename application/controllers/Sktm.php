<?php

class Sktm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Sktm');
        $this->load->model('m_penduduk');
    }

    public function index()
    {

        $data['title'] = "Surat Keterangan Tidak Mampu";
        $data['surat'] = $this->M_Sktm->daftar_sktm();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/sktm/daftar_sktm', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data['title'] = "Tambah Surat keterangan tidak mampu";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_Sktm->pejabat();

        if ($this->input->post('tambah_sktm')) {
            $data = array(
                'nik_ayah' => $this->input->post('ayah'),
                'nik_anak' => $this->input->post('anak'),
                'id_pejabat' => $this->input->post('pejabat'),
                'tanggal_sktm' => date('Y-m-d'),
            );
            $this->M_Sktm->tambah_sktm($data);
            $this->session->set_flashdata('Sukses', 'Data berhasil ditambahkan');
            redirect(base_url('Sktm/'));
        } else {

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/sktm/tambah_sktm', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Surat Keterangan Tidak Mampu";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_Sktm->pejabat();
        $data['sktm'] = $this->M_Sktm->edit_sktm($id);
        $data['id'] = $id;

        if ($this->input->post('edit_sktm')) {
            $data = array(
                'nik_ayah' => $this->input->post('ayah'),
                'nik_anak' => $this->input->post('anak'),
                'id_pejabat' => $this->input->post('pejabat'),
            );
            $where = array(
                'id_sktm' => $this->input->post('id'),
            );
            $this->M_Sktm->proses_edit_sktm($where, $data);
            $this->session->set_flashdata('Sukses', 'Data berhasil diedit');
            redirect(base_url('Sktm/'));
        } else {

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/sktm/edit_sktm', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {

        $this->M_Sktm->hapus_sktm($id);
        $this->session->set_flashdata('Sukses', 'Data berhasil dihapus');
        redirect(base_url('Sktm/'));
    }

    public function cetak($id)
    {
        $data['sktm'] = $this->M_Sktm->cetak_sktm($id);
        $this->load->view('surat/sktm/cetak_sktm',$data);
    }
}
