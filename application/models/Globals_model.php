<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Globals_model extends CI_Model {

    public function get_kota()
    {
        $this->db->select('id, name');
        $this->db->from('kota');
        $this->db->order_by('name', 'ASC');
        return $this->db->get();
    }
}