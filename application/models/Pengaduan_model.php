<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_pengaduan($data)
    {
        return $this->db->insert('pengaduan', $data);
    }

    public function get_all_pengaduan()
    {
        $query = $this->db->get('pengaduan');
        return $query->result_array();
    }

    public function get_pengaduan_by_id($id)
    {
        $query = $this->db->get_where('pengaduan', array('id' => $id));
        return $query->row_array();
    }

    public function delete_pengaduan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengaduan');
    }

    public function detail($id)
    {
        $query = $this->db->get_where('pengaduan', array('id' => $id))->row();
        return $query;
    }
}
