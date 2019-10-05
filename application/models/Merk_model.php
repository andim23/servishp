<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk_model extends CI_Model {

    private $merk       = 'merk';

    // CRUD
    public function get_merk($kode = null)
    {
        if($kode == null)
        {
            $this->db->select('*');
            $this->db->from($this->merk);
            return $this->db->get();
        }
        else
        {
            $this->db->select('*');
            $this->db->from($this->merk);
            $this->db->where('kode', $kode);
            return $this->db->get();
        }
    }

    public function add_merk()
    {
        $post   = $this->input->post();
        $this->db->set('kode', 'UUID()', FALSE);
        $data   = [
            'name'          => $post['merk_add'],
        ];
        return $this->db->insert($this->merk, $data);
    }

    public function update_merk($kode)
    {
        $post   = $this->input->post();
        $data   = [
            'name'          => $post['merk_update'],
        ];
        $this->db->where('kode', $kode);
        return $this->db->update($this->merk, $data);
    }

    public function delete_merk($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->delete($this->merk);
    }
    // CRUD
}