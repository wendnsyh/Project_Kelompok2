<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model
{
	public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        
        // Jika ditemukan satu baris yang sesuai, kembalikan baris tersebut
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false; // Tidak ada baris yang sesuai
        }
    }
}
