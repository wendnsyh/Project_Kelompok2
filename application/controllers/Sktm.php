<?php

class Sktm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_domisili');
        $this->load->model('m_penduduk');
    }

    public function index()
    {

        $data['title'] = "Surat Keterangan Tidak Mampu";

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/sktm/daftar_sktm', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){

        $data['title']= "Tambah Surat keterangan tidak mampu";
        $data['penduduk']=$this->m_penduduk->tampil();
        $data['pendudukk']=$this->m_penduduk->tampil();
        $data['pejabat']= $this->M_Sktm->pejabat();

        if($this->input->post('tambah_sktm')){
            $data= array(
                'nik_ayah'=> $this->input->post('ayah'),
                'nik_anak' => $this->input->post('anak'),
                'id_pejabat' =>$this->input->post('pejabat'),
                'tanggal_sktm'=> date('Y-m-d'),
            );
            $this->M_Sktm->tambah_sktm($data);
            $this->session->set_flashdata('Sukses','Data berhasil ditambahkan');
            redirect(base_url('Sktm/'));
        }else{

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/sktm/tambah_sktm', $data);
            $this->load->view('template/footer');
        }

        
    }
}
