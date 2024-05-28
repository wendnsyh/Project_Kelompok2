<?php
class About extends CI_Controller
{
    public function index()
    {
        $data['title'] = "About";
        $this->load->view('template_warga/header', $data);
        $this->load->view('warga/about', $data);
        $this->load->view('template_warga/footer');
    }
}
