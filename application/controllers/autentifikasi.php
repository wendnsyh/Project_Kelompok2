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
                redirect(base_url('login')); // Ganti 'base_url('login')' sesuai dengan URL login page Anda
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

    public function register()
    {
        // Redirect user to the dashboard if already logged in
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        // Set form validation rules
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            ['required' => 'Nama Belum diisi!!']
        );
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'valid_email' => 'Email Tidak Benar!!',
                'required' => 'Email Belum diisi!!',
                'is_unique' => 'Email Sudah Terdaftar!'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama!!',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Repeat Password',
            'required|trim|matches[password1]'
        );

        // Check form validation
        if ($this->form_validation->run() == false) {
            // Load registration view with validation errors
            $data['judul'] = 'Registrasi Member';
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('autentifikasi/register');
            $this->load->view('template_admin/footer_admin');
        } else {
            // Form validation successful, save user data
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'hak_akses' => 1,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->PenggajianModel->simpanData($data); // Save user data using the model
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('autentifikasi');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('hak_akses');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('autentifikasi');
    }
}
