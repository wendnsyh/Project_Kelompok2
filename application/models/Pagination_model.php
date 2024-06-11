<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination_model extends CI_Model
{
    public function get_total_rows($table)
    {
        return $this->db->count_all($table);
    }

    public function get_data($table, $limit, $offset)
    {
        return $this->db->get($table, $limit, $offset)->result();
    }
}
