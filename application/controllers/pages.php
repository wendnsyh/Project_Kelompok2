<?php
class Pages extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Home";
        $this->load->view('template_warga/header', $data);
        $this->load->view('warga/home', $data);
        $this->load->view('template_warga/footer');
    }

    public function posts()
    {
        $data['title'] = "Home";
        $this->load->view('template_warga/header', $data);
        $this->load->view('warga/posts', $data);
        $this->load->view('template_warga/footer');
    }
}
