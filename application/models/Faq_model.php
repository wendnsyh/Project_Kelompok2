<?php
class Faq_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_faqs()
    {
        return $this->db->get('faq')->result_array();
    }

    public function add_faq($data)
    {
        $this->db->insert('faq', $data);
        return $this->db->insert_id();
    }

    public function edit_faq($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('faq', $data);
    }

    public function delete_faq($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('faq');
    }
}
