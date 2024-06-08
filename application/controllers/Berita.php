<?php
class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'upload'));
    }

    public function index()
    {
        $data['berita'] = $this->Berita_model->get_all_berita();

        $this->load->view('home/header');
        $this->load->view('home/berita/index', $data);
        $this->load->view('home/footer', $data);
    }

    public function admin()
    {
        $data['title'] = "Faq";
        $data['berita'] = $this->Berita_model->get_model();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('admin/berita/tampil_berita', $data);
        $this->load->view('template/footer');
    }


    public function create()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Tambah Berita";

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('ringkasan', 'ringkasan', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('admin/berita/tambah_berita', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'image' => $upload_data['file_name']
                );
            } else {
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi')
                );
            }

            $this->Berita_model->insert_berita($data);
            redirect('berita/admin');
        }
    }

    public function detail($id)
    {
        $data['title'] = "Detail Berita";
        $data['id'] = $id;
        $data['berita'] = $this->Berita_model->get_berita_by_id($id);
       


        $this->load->view('home/header');
        $this->load->view('home/berita/detail', $data);
        $this->load->view('home/footer', $data);
    }
}
