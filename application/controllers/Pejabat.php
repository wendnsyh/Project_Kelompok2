<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pejabat');
    }

    public function index()
    {
        $data['title'] = "Data Pejabat - Kelurahan Serpong";
        $data['pejabat'] = $this->M_pejabat->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pejabat/tampil_staff', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Staff - Kelurahan Serpong";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kelamin', 'Kelamin', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('pejabat/tambah_staff', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path']          = './uploads/pejabat/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10240;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                echo $this->upload->display_errors();
            } else {
                $image = $this->upload->data();
                $image = $image['file_name'];

                $data = array(
                    'nama_pejabat' => $this->input->post('nama'),
                    'nip_pejabat' => $this->input->post('nip'),
                    'jabatan_pejabat' => $this->input->post('jabatan'),
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('kelamin'),
                    'image' => $image,
                );
                
                $this->M_pejabat->tambah_staff($data);
                $this->session->set_flashdata('Sukses', 'Data berhasil di tambahkan');
                redirect(base_url('pejabat/'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Staff - Kelurahan Serpong";
        $data['pejabat'] = $this->M_pejabat->edit($id);
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pejabat/edit_staff', $data);
        $this->load->view('template/footer', $data);
    }

    public function proses_edit()
    {

        if ($this->input->post('edit_staff')) {
            $data = array(
                'nama_pejabat' => $this->input->post('nama'),
                'nip_pejabat' => $this->input->post('nip'),
                'jabatan_pejabat' => $this->input->post('jabatan'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('kelamin'),
            );
            $where = array(
                'id_pejabat' => $this->input->post('id'),
            );

            $this->M_pejabat->proses_edit($where, $data);
            $this->session->set_flashdata('sukses', 'Data Dengan ID  berhasil diedit.');
            redirect(base_url('pejabat/'));
        }
    }
    public function hapus($id)
    {

        $this->M_pejabat->hapus_pejabat($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil dihapus</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>');
        redirect(base_url('pejabat/'));
    }
}
