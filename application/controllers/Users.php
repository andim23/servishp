<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
    }

    public function index()
    {
        $this->load->view('users/index');
    }

    public function data_users()
    {
        $response    = $this->users->full_users()->result_array();
        $no = 1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $no++;
            $tbody[]    = $row['username'];
            $tbody[]    = $row['name'];
            $tbody[]    = $row['status'];
            $aksi       =   '
                            <button type="button" class="btn btn-icon btn-round btn-primary" id="detail_data" data-kode="'.$row['kode'].'" title="Show Data"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-icon btn-round btn-danger" id="delete_data" data-kode="'.$row['kode'].'" title="Delete Data"><i class="fa fa-times"></i></button>
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

    public function detail_users()
    {
        $kode       = $this->input->get('kode');
        $response   = $this->users->get_users($kode)->row();
        echo json_encode($response);
    }

    public function add_users()
    {
        // VALIDASI
        $this->form_validation->set_rules('username_add', 'Username', 'trim|required|is_unique[users.username]|xss_clean');
        $this->form_validation->set_rules('password_add', 'Password', 'trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('level_add', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status_add', 'Status', 'trim|required|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Sudah Digunakan');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $response   = [
                'status'    => [
                    'code'      => 200,
                    'message'   => 'Berhasil Menambahkan Users',
                ],
                'response'  => $this->users->add_users(),
            ];
            echo json_encode($response);
        }
    }

    public function update_users()
    {
        // VALIDASI
        $this->form_validation->set_rules('username_update', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('level_update', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status_update', 'Status', 'trim|required|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $kode       = $this->input->post('kode');
            $response   = [
                'status'    => [
                    'code'      => 200,
                    'message'   => 'Berhasil Mengubah Users',
                ],
                'response'  => $this->users->update_users($kode),
            ];
            echo json_encode($response);
        }
    }
    
    public function delete_users()
    {
        $kode       = $this->input->post('kode');
        $response   = $this->users->delete_users($kode);
        echo json_encode($response);
    }

    public function get_users()
    {
        $response   = $this->users->get_users()->result();
        echo json_encode($response);
    }

    // LEVEL
    public function level()
    {
        $this->load->view('users/level');
    }

    public function data_level()
    {
        $response    = $this->users->get_level()->result_array();
        $no = 1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $no++;
            $tbody[]    = $row['name'];
            $aksi       =   '
                            <button type="button" class="btn btn-icon btn-round btn-primary" id="detail_data" data-kode="'.$row['kode'].'" title="Show Data"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-icon btn-round btn-danger" id="delete_data" data-kode="'.$row['kode'].'" title="Delete Data"><i class="fa fa-times"></i></button>
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

    public function detail_level()
    {
        $kode       = $this->input->get('kode');
        $response   = $this->users->get_level($kode)->row();
        echo json_encode($response);
    }

    public function add_level()
    {
        // VALIDASI
        $this->form_validation->set_rules('level_add', 'Level', 'trim|required|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $response   = [
                'status'    => [
                    'code'      => 200,
                    'message'   => 'Berhasil Menambahkan Level',
                ],
                'response'  => $this->users->add_level(),
            ];
            echo json_encode($response);
        }
    }

    public function update_level()
    {
        // VALIDASI
        $this->form_validation->set_rules('level_update', 'Level', 'trim|required|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $kode       = $this->input->post('kode');
            $response   = [
                'status'    => [
                    'code'      => 200,
                    'message'   => 'Berhasil Mengubah Level',
                ],
                'response'  => $this->users->update_level($kode),
            ];
            echo json_encode($response);
        }
    }
    
    public function delete_level()
    {
        $kode       = $this->input->post('kode');
        $response   = $this->users->delete_level($kode);
        echo json_encode($response);
    }

    public function get_level()
    {
        $response   = $this->users->get_level()->result();
        echo json_encode($response);
    }
    // LEVEL
}