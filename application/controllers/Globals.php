<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Globals extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Globals_model', 'globals');
    }

    public function get_kota()
    {
        $response       = $this->globals->get_kota()->result();
        echo json_encode($response);
    }
}