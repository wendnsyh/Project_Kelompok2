<?php
class Autentifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggajianModel');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('autentifikasi/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            // Form validation failed, show login page again
            $this->load->view('login'); // Ganti 'login_page' dengan nama view login Anda
        } else {
            // Form validation passed, attempt to authenticate user
            $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
            $password = md5(htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES));

            $user = $this->PenggajianModel->login($username, $password); // Ganti 'your_model' dengan nama model Anda

            if ($user) {
                // Authentication successful, set session data and redirect to homepage
                $this->session->set_userdata('login', TRUE);
                $this->session->set_userdata('username', $user['username']);
                $this->session->set_userdata('nama_petugas', $user['nama_petugas']);
                $this->session->set_userdata('level', $user['level']);
                redirect(base_url('admin/dashboard')); // Ganti 'base_url()' sesuai dengan URL homepage Anda
            } else {
                // Authentication failed, set flashdata and redirect back to login page
                $this->session->set_flashdata('gagal', 'Username atau password salah!');
                redirect(base_url('autentifikasi')); // Ganti 'base_url('login')' sesuai dengan URL login page Anda
            }
        }
    }


    // ... (fungsi lainnya tetap sama)

    public function blok()
    {
        $this->session->set_flashdata('pesan', 'Akses tidak diizinkan. Silakan login kembali.');
        redirect('autentifikasi');
    }


    public function gagal()
    {
        $this->load->view('autentifikasi/gagal');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_petugas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('autentifikasi');
    }
}
