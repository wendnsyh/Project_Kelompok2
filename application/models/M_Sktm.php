<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Sktm extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM pejabat")->result();
    }
    public function daftar_sktm()
    {
        $this->db->from('sktm');
        $this->db->join('penduduk', 'sktm.nik_anak=penduduk.nik');
        $this->db->join('pejabat', 'sktm.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->result();
    }

    public function tambah_sktm($data)
    {
        return $this->db->insert('sktm', $data);
    }

    public function edit_sktm($id)
    {
        $this->db->where('id_sktm', $id);
        return $this->db->get('sktm')->row();
    }

    public function cetak_sktm($id)
    {
        $this->db->from('sktm');
        $this->db->where('id_sktm', $id);
        $this->db->join('penduduk', 'sktm.nik_anak=penduduk.nik');
        $this->db->join('pejabat', 'sktm.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->row();
    }

    public function proses_edit_sktm($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('sktm', $data);
    }

    public function hapus_sktm($id)
    {
        $this->db->where('id_sktm', $id);
        return $this->db->delete('sktm');
    }
}