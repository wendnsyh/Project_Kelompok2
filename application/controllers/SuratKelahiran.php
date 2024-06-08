<?php

class SuratKelahiran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_kelahiran');
        $this->load->model('m_penduduk');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = "Surat Kelahiran - Desa Serpong";
        $data['surat_kelahiran'] = $this->M_surat_kelahiran->daftar_surat_kelahiran();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('surat/kelahiran/daftar_surat_kelahiran', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Surat Kelahiran - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pendudukkk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_surat_kelahiran->pejabat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('ayah', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'NIK Ibu', 'required');
        $this->form_validation->set_rules('pelapor', 'NIK Pelapor', 'required');
        $this->form_validation->set_rules('nama', 'Nama Anak', 'required');
        $this->form_validation->set_rules('kelamin', 'Kelamin Anak', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Lahir Anak', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Lahir Anak', 'required');
        $this->form_validation->set_rules('jam', 'Jam Lahir Anak', 'required');
        $this->form_validation->set_rules('hari', 'Hari Lahir Anak', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('hubungan', 'Hubungan Sebagai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/kelahiran/tambah_surat_kelahiran', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/bukti/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 10000;

            // Ensure the upload path exists
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar');
                $this->load->view('surat/kelahiran/tambah_surat_kelahiran', $data);
                $this->load->view('template/footer');
            } else {
                $surat_pengantar = $this->upload->data('file_name');

                // Reinitialize the upload library for the second file
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('bukti_kelahiran')) {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('template/header', $data);
                    $this->load->view('template/sidebar', $data);
                    $this->load->view('template/topbar');
                    $this->load->view('surat/kelahiran/tambah_surat_kelahiran', $data);
                    $this->load->view('template/footer');
                } else {
                    $bukti_kelahiran = $this->upload->data('file_name');

                    $data = array(
                        'nik_ayah' => $this->input->post('ayah'),
                        'nik_ibu' => $this->input->post('ibu'),
                        'nik_pelapor' => $this->input->post('pelapor'),
                        'nama_anak' => $this->input->post('nama'),
                        'kelamin_anak' => $this->input->post('kelamin'),
                        'tempat_lahir_anak' => $this->input->post('tempat'),
                        'tanggal_lahir_anak' => $this->input->post('tanggal'),
                        'jam_lahir_anak' => $this->input->post('jam'),
                        'hari_lahir_anak' => $this->input->post('hari'),
                        'id_pejabat' => $this->input->post('pejabat'),
                        'hubungan_sebagai' => $this->input->post('hubungan'),
                        'tanggal_surat_kelahiran' => date('Y-m-d'),
                        'surat_pengantar' => $surat_pengantar,
                        'bukti_kelahiran' => $bukti_kelahiran,
                        'status' => 'belum di-acc',
                    );

                    $insert = $this->M_surat_kelahiran->tambah_surat_kelahiran($data);
                    if ($insert) {
                        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
                        redirect(base_url('SuratKelahiran/'));
                    } else {
                        log_message('error', 'Gagal menyimpan data ke database');
                        $data['error'] = 'Gagal menyimpan data ke database';
                        $this->load->view('template/header', $data);
                        $this->load->view('template/sidebar', $data);
                        $this->load->view('template/topbar');
                        $this->load->view('surat/kelahiran/tambah_surat_kelahiran', $data);
                        $this->load->view('template/footer');
                    }
                }
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Surat Kelahiran - Desa Serpong";
        $data['penduduk'] = $this->m_penduduk->tampil();
        $data['pendudukk'] = $this->m_penduduk->tampil();
        $data['pendudukkk'] = $this->m_penduduk->tampil();
        $data['pejabat'] = $this->M_surat_kelahiran->pejabat();
        $data['surat_kelahiran'] = $this->M_surat_kelahiran->edit_surat_kelahiran($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->form_validation->set_rules('ayah', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'NIK Ibu', 'required');
        $this->form_validation->set_rules('pelapor', 'NIK Pelapor', 'required');
        $this->form_validation->set_rules('nama', 'Nama Anak', 'required');
        $this->form_validation->set_rules('kelamin', 'Kelamin Anak', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Lahir Anak', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Lahir Anak', 'required');
        $this->form_validation->set_rules('jam', 'Jam Lahir Anak', 'required');
        $this->form_validation->set_rules('hari', 'Hari Lahir Anak', 'required');
        $this->form_validation->set_rules('pejabat', 'Pejabat', 'required');
        $this->form_validation->set_rules('hubungan', 'Hubungan Sebagai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('surat/kelahiran/edit_surat_kelahiran', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './uploads/bukti/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1000; // 2MB


            $upload_surat_pengantar = $this->upload->do_upload('surat_pengantar');
            $upload_bukti_kelahiran = $this->upload->do_upload('bukti_kelahiran');

            if (!$upload_surat_pengantar && !$upload_bukti_kelahiran) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('surat/kelahiran/edit_surat_kelahiran', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'nik_ayah' => $this->input->post('ayah'),
                    'nik_ibu' => $this->input->post('ibu'),
                    'nik_pelapor' => $this->input->post('pelapor'),
                    'nama_anak' => $this->input->post('nama'),
                    'kelamin_anak' => $this->input->post('kelamin'),
                    'tempat_lahir_anak' => $this->input->post('tempat'),
                    'tanggal_lahir_anak' => $this->input->post('tanggal'),
                    'jam_lahir_anak' => $this->input->post('jam'),
                    'hari_lahir_anak' => $this->input->post('hari'),
                    'id_pejabat' => $this->input->post('pejabat'),
                    'hubungan_sebagai' => $this->input->post('hubungan'),
                );

                if ($upload_surat_pengantar) {
                    $upload_data_surat_pengantar = $this->upload->data();
                    $data['surat_pengantar'] = $upload_data_surat_pengantar['file_name'];
                }

                if ($upload_bukti_kelahiran) {
                    $upload_data_bukti = $this->upload->data();
                    $data['bukti_kelahiran'] = $upload_data_bukti['file_name'];
                }

                $where = array(
                    'id_surat_kelahiran' => $this->input->post('id'),
                );

                $this->M_surat_kelahiran->proses_edit_surat_kelahiran($where, $data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
                redirect(base_url('SuratKelahiran/'));
            }
        }
    }

    public function hapus($id)
    {
        $this->M_surat_kelahiran->hapus_surat_kelahiran($id);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
        redirect(base_url('SuratKelahiran/'));
    }

    public function cetak($id)
    {
        $data['surat_kelahiran'] = $this->M_surat_kelahiran->cetak_surat_kelahiran($id);
        $this->load->view('surat/kelahiran/cetak_surat_kelahiran', $data);
    }
}
