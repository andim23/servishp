<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index()
    {
        $this->load->view('pegawai/index');
    }

    public function data()
    {
        $response    = $this->pegawai->full_pegawai()->result_array();
        $no = 1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $no++;
            $tbody[]    = $row['username'];
            $tbody[]    = $row['level_name'];
            $tbody[]    = $row['status'];
            $aksi       =   '
                            <button type="button" class="btn btn-icon btn-round btn-primary" id="detail_data" data-id="'.$row['users_id'].'" title="Show Data"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-icon btn-round btn-danger" id="delete_data" data-id="'.$row['users_id'].'" title="Show Data"><i class="fa fa-times"></i></button>
                            ';
            $tbody[]    = $aksi;
            $data[]     = $tbody;
        }
        if($response)
        {
            echo json_encode([
                'data'      => $data,
            ]);
        }
        else
        {
            echo json_encode([
                'data'      => 0,
            ]);
        }
    }

    public function detail()
    {

    }

    public function add()
    {
        // VALIDASI
        $this->form_validation->set_rules('users_add', 'Username', 'trim|required|is_unique[pegawai.users_id]|xss_clean');
        $this->form_validation->set_rules('nama_add', 'Nama', 'trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('jenis_kelamin_add', 'Jenis Kelamin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tempat_add', 'Tempat Lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tanggal_lahir_add', 'Tanggal Lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('agama_add', 'Agama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alamat_add', 'Alamat Kelamin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_telp_add', 'No Telp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status_add', 'Status', 'trim|required|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Sudah Digunakan');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $response   = [
                'status'    => [
                    'code'      => 200,
                    'message'   => 'Berhasil Menambahkan Pegawai',
                ],
                'response'  => $this->pegawai->add_pegawai(),
            ];
            echo json_encode($response);
        }
    }

    public function update()
    {
        echo $this->uuid->v4();
    }

    public function delete()
    {

    }
}