<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }



    // Menampilkan form pengaduan
    public function form()
    {
        $data['title'] = "Contact";
       
        $this->load->view('home/header', $data);
        $this->load->view('home/layanan', $data);
        
    }

    // Menangani pengiriman form pengaduan
    public function send()
    {
        // Aturan validasi
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form dengan pesan error
            $this->load->view('pengaduan_form');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );

            $this->Pengaduan_model->insert_pengaduan($data);
            $this->session->set_flashdata('success', 'Pengaduan berhasil dikirim');

            // Redirect atau tampilkan pesan sukses
            redirect('pengaduan/form');
        }
    }


    // Menampilkan daftar pengaduan di backend
    public function list()
    {
        $data['pengaduan'] = $this->Pengaduan_model->get_all_pengaduan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pengaduan/pengaduan_list', $data);
        $this->load->view('template/footer');
    }

    // Menampilkan detail pengaduan di backend
    public function view($id)
    {
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_by_id($id);
        $detail = $this->Pengaduan_model->detail($id); // Mengambil detail berdasarkan ID
        $data['detail'] = $detail;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar',$data);
        $this->load->view('pengaduan/pengaduan_detail', $data);
        $this->load->view('template/footer');
    }


    // Menghapus pengaduan di backend
    public function delete($id)
    {
        $this->Pengaduan_model->delete_pengaduan($id);
        $this->session->set_flashdata('success', 'Pengaduan berhasil di Hapus');
        redirect('pengaduan/list');
    }
}
