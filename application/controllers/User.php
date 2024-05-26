<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Add your authentication or authorization logic here
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profil Saya';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer', $data);
    }


    public function edit()
    {
        $data['judul'] = 'Ubah Profil';

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            if (!empty($_FILES['image']['name'])) {
                $userProfile = $this->upload_image('image', 'user' . $data['user']['nama']);
                if ($userProfile) {
                    $this->delete_old_image($data['user']['image']);
                    $this->db->set('image', $userProfile);
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah tersimpan!</div>');
            redirect('user/index');
        }
    }

    private function upload_image($field_name, $file_name)
    {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $file_name;
        $config['overwrite'] = true;
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return false;
        }
    }

    private function delete_old_image($image_name)
    {
        $file_path = './assets/img/profile/' . $image_name;
        if (file_exists($file_path) && $image_name != 'default.jpg') {
            unlink($file_path);
        }
    }


    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            // Tampilkan form ubah password
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('template/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            if (!password_verify($current_password, $user['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah!</div>');
                redirect('user/ubahPassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
                    redirect('user/ubahPassword');
                } else {
                    // Password is valid, update password
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('user');
                }
            }
        }
    }
}
