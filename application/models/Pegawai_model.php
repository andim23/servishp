<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    private $profil     = 'profil';

    // GLOBAL
    public function full_pegawai()
    {
        $this->db->select('*');
        $this->db->from($this->profil);
        return $this->db->get();
    }
    // GLOBAL

    // CRUD
    public function get_pegawai($kode = null)
    {
        if($kode == null)
        {
            $this->db->select('*');
            $this->db->from($this->profil);
            return $this->db->get();
        }
        else
        {
            $this->db->select('*');
            $this->db->from($this->profil);
            $this->db->where('kode', $kode);
            return $this->db->get();
        }
    }

    public function add_pegawai()
    {
        $post   = $this->input->post();
        $this->db->set('kode', 'UUID()', FALSE);
        $data   = [
            'users_kode'        => $post['users_add'],
            'nama'              => $post['nama_add'],
            'jenis_kelamin'     => $post['jenis_kelamin_add'],
            'tempat'            => $post['tempat_add'],
            'tanggal_lahir'     => date('Y-m-d', strtotime($post['tanggal_lahir_add'])),
            'agama'             => $post['agama_add'],
            'alamat'            => $post['alamat_add'],
            'no_telp'           => $post['no_telp_add'],
            'status'            => $post['status_add'],
        ];
        return $this->db->insert($this->profil, $data);
    }

    public function update_pegawai($kode)
    {
        $post   = $this->input->post();
        $data   = [
            'users_kode'        => $post['users_update'],
            'nama'              => $post['nama_update'],
            'jenis_kelamin'     => $post['jenis_kelamin_update'],
            'tempat'            => $post['tempat_update'],
            'tanggal_lahir'     => date('Y-m-d', strtotime($post['tanggal_lahir_update'])),
            'agama'             => $post['agama_update'],
            'alamat'            => $post['alamat_update'],
            'no_telp'           => $post['no_telp_update'],
            'status'            => $post['status_update'],
        ];
        $this->db->where('kode', $kode);
        return $this->db->update($this->profil, $data);
    }

    public function delete_pegawai($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->delete($this->profil);
    }
    // CRUD
}