<?php
class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('faq_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'upload'));
    }

    public function index()
    {
        $data['faqs'] = $this->faq_model->get_faqs();
        $data['title'] = "Inovasi";


        $this->load->view('home/header');
        $this->load->view('home/inovasi', $data);
        $this->load->view('home/footer', $data);
    }

    public function admin()
    {
        $data['title'] = "Faq";
        $data['faqs'] = $this->faq_model->get_faqs();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('admin/inovasi/tampil_inovasi', $data);
        $this->load->view('template/footer');
    }

    public function add_faq()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Tambah Inovasi";

        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('admin/inovasi/tambah_inovasi', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/faq/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $data = array(
                    'question' => $this->input->post('question'),
                    'answer' => $this->input->post('answer'),
                    'image' => $upload_data['file_name']
                );
            } else {
                $data = array(
                    'question' => $this->input->post('question'),
                    'answer' => $this->input->post('answer')
                );
            }

            $this->faq_model->add_faq($data);
            redirect('faq/admin');
        }
    }

    public function edit_faq($id)
    {
        // Periksa apakah ID valid
        if (empty($id) || !is_numeric($id)) {
            show_error('Invalid ID');
        }

        // Ambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Ambil data FAQ berdasarkan ID
        $data['faq'] = $this->faq_model->get_faq_by_id($id);

        if (empty($data['faq'])) {
            show_error('FAQ not found');
        }

        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('admin/inovasi/edit_inovasi', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/faq/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $updated_data = array(
                    'question' => $this->input->post('question'),
                    'answer' => $this->input->post('answer'),
                    'image' => $upload_data['file_name']
                );
            } else {
                $updated_data = array(
                    'question' => $this->input->post('question'),
                    'answer' => $this->input->post('answer')
                );
            }

            $this->faq_model->edit_faq($id, $updated_data);
            redirect('faq/admin');
        }
    }

    public function delete_faq($id)
    {
        $this->faq_model->delete_faq($id);
        redirect('faq/admin');
    }
}
