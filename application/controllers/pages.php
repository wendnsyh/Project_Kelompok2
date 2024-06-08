<?php
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('M_pejabat');
        $this->load->model('m_penduduk');
    }

    public function index()
    {
        $data['title'] = "Home";

        // Query to get all rows from 'penduduk' table
        $query = $this->db->query("SELECT * FROM penduduk");

        // Store the number of rows in $data array
        $data['penduduk'] = $query->num_rows();

        // Load the view with $data
        $this->load->view('home/front-end', $data);
    }

    public function about()
    {
        $data['title'] = "About";
        $data['pejabat'] = $this->M_pejabat->tampil();

        $this->load->view('home/header', $data);
        $this->load->view('warga/about', $data);
    }

    public function info()
    {
        $data['title'] = "About";
        $data['pejabat'] = $this->M_pejabat->tampil();

        $this->load->view('coba/header', $data);
        $this->load->view('coba/info', $data);
    }
    public function jenis()
    {
        $data['title'] = "About";
        $data['pejabat'] = $this->M_pejabat->tampil();

        $this->load->view('coba/header', $data);
        $this->load->view('coba/jenis', $data);
    }
    public function layanan()
    {

        $data['title'] = "Layanan";

        $this->load->view('home/header');
        $this->load->view('home/layanan', $data);
        $this->load->view('home/footer', $data);
    }

    public function surat()
    {

        $data['title'] = "Layanan";

        $this->load->view('home/header');
        $this->load->view('home/surat', $data);
    }

    public function penduduk()
    {
        $data = [
            'judul' => 'Layanan Penduduk',
            'jumlahPenduduk' => $this->m_penduduk->getJumlahPenduduk(),
            'pendudukPria' => $this->m_penduduk->getPendudukByJk('Laki-laki'),
            'pendudukWanita' => $this->m_penduduk->getPendudukByJk('Perempuan'),
        ];

        $this->load->view('home/header');
        $this->load->view('warga/infoWarga', $data);
    }
}
