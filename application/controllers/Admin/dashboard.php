<?php

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('error', 'Anda harus login untuk mengakses halaman ini.');
      redirect('autentifikasi'); // Alihkan ke halaman login jika belum login
    }
  }
  public function index()
  {

    $data['title'] = "dashboard";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('template/footer');
  }
}
