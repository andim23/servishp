<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan_model extends CI_Model {

    private $kerusakan       = 'kerusakan';

    // CRUD
    public function get_kerusakan($kode = null)
    {
        if($kode == null)
        {
            $this->db->select('*');
            $this->db->from($this->kerusakan);
            return $this->db->get();
        }
        else
        {
            $this->db->select('*');
            $this->db->from($this->kerusakan);
            $this->db->where('kode', $kode);
            return $this->db->get();
        }
    }

    public function add_kerusakan()
    {
        $post   = $this->input->post();
        $this->db->set('kode', 'UUID()', FALSE);
        $data   = [
            'name'          => $post['kerusakan_add'],
            'harga'         => $post['harga_add']
        ];
        return $this->db->insert($this->kerusakan, $data);
    }

    public function update_kerusakan($kode)
    {
        $post   = $this->input->post();
        $data   = [
            'name'          => $post['kerusakan_update'],
            'harga'         => $post['harga_update']
        ];
        $this->db->where('kode', $kode);
        return $this->db->update($this->kerusakan, $data);
    }

    public function delete_kerusakan($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->delete($this->kerusakan);
    }
    // CRUD
}