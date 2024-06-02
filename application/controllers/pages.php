<?php
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
    }
    public function index()
    {
        $data['title'] = "Home";
        $this->load->view('template_warga/header', $data);
        $this->load->view('warga/home', $data);
        $this->load->view('template_warga/footer');
    }

    public function layanan()
    {
        $data['title'] = "Layanan";
        $this->load->view('template_warga/header', $data);
        $this->load->view('warga/layanan', $data);
        $this->load->view('template_warga/footer');
    }
    public function about()
    {
        $data['title'] = "About";
        $this->load->view('template_warga/header', $data);
        $this->load->view('warga/about', $data);
        $this->load->view('template_warga/footer');
    }
    public function contact()
    {
        $data['title'] = "Contact";
        $this->load->view('template_warga/header', $data);
        $this->load->view('warga/contact', $data);
        $this->load->view('template_warga/footer');
    }
}
