<?php

class Dashboard extends CI_Controller
{
  
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
