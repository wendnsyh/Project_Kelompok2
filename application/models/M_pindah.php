<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pindah extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('pindahdatang')->result();
    }

    public function cari($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('pindahdatang');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function tambah($data)
    {
        return $this->db->insert('pindahdatang', $data);
    }
}