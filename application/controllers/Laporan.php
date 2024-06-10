<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_penduduk');
        $this->load->model('m_kelahiran');
        $this->load->model('m_kematian');
        $this->load->model('m_kelahiran');
    }

    public function laporan_penduduk()
    {
        $data['title'] = "Laporan Data Penduduk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penduduk'] = $this->m_penduduk->tampil();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/penduduk/laporan_penduduk', $data);
        $this->load->view('template/footer');
    }

    public function laporan_penduduk_pdf()
    {


        $data['penduduk'] = $this->m_penduduk->tampil();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/pendataan-warga/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/penduduk/penduduk_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("penduduk.pdf", array('Attachment' => 0));
    }


    public function cetak_laporan_penduduk()
    {
        $data['penduduk'] = $this->m_penduduk->tampil();

        $this->load->view('laporan/penduduk/cetak_laporan_penduduk', $data);
    }

    public function laporan_kelahiran()
    {
        $data['title'] = "Laporan Data Penduduk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelahiran'] = $this->m_kelahiran->tampil();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/kelahiran/laporan_kelahiran', $data);
        $this->load->view('template/footer');
    }

    public function laporan_kelahiran_pdf()
    {


        $data['kelahiran'] = $this->m_kelahiran->tampil();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/pendataan-warga/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/kelahiran/kelahiran_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("kelahiran.pdf", array('Attachment' => 0));
    }


    public function cetak_laporan_kelahiran()
    {
        $data['kelahiran'] = $this->m_kelahiran->tampil();


        $this->load->view('laporan/kelahiran/cetak_laporan_kelahiran', $data);
    }

    public function laporan_kematian()
    {
        $data['title'] = "Laporan Data Penduduk";
        $data['kematian'] = $this->m_kematian->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/kematian/laporan_kematian', $data);
        $this->load->view('template/footer');
    }

    public function laporan_kematian_pdf()
    {


        $data['kematian'] = $this->m_kematian->tampil();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/pendataan-warga/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/kematian/kematian_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("kematian.pdf", array('Attachment' => 0));
    }


    public function cetak_laporan_kematian()
    {
        $data['kematian'] = $this->m_kematian->tampil();


        $this->load->view('laporan/kematian/cetak_laporan_kematian', $data);
    }
}
