<?php

class Warga extends CI_Controller
{
  public function index()
  {

    $data['title'] = "dashboard";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('template-warga/header', $data);
    $this->load->view('template-warga/sidebar');
    $this->load->view('template-warga/topbar');
    $this->load->view('member/dashboard', $data);
    $this->load->view('template-warga/footer');
  }
}
