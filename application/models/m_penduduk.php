<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('penduduk')->result();
    }

    public function cari($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('penduduk');
        return $query->num_rows() == 0;
    }


    public function tambah($data)
    {
        return $this->db->insert('penduduk', $data);
    }

    public function edit($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get('penduduk')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('penduduk', $data);
    }

    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->delete('penduduk');
    }
    public function detail($nik = NULL)
    {
        $query = $this->db->get_where('penduduk', array('nik' => $nik))->row();
        return $query;
    }
    public function getJumlahPenduduk()
    {
        return $this->db->count_all_results('penduduk');
    }

    public function getPendudukByJk($jk)
    {
        $this->db->where('jenis_kelamin', $jk);
        return $this->db->count_all_results('penduduk');
    }

    public function hitung_umur($tanggal_lahir)
    {
        $tanggal_lahir = new DateTime($tanggal_lahir);
        $today = new DateTime('today');
        $umur = $tanggal_lahir->diff($today)->y;
        return $umur;
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->like('nik', $keyword);
        $this->db->or_like('nama', $keyword);
        return $this->db->get()->result(); 
    }
}
