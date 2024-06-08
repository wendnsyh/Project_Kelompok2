<?php
class Berita_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_model()
    {
        return $this->db->get('berita')->result_array();
    }
    public function get_all_berita()
    {
        $query = $this->db->get('berita');
        return $query->result_array();
    }

    public function insert_berita($data)
    {
        return $this->db->insert('berita', $data);
    }
    public function get_berita_by_id($id)
    {
        // Ambil data berita berdasarkan ID
        $this->db->where('id', $id);
        $query = $this->db->get('berita');
        return $query->row_array(); // Mengembalikan satu baris hasil sebagai array
    }
}
