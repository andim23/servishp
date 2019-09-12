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

    public function ajax_users()
    {
        $response    = $this->users->full_users()->result_array();
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

    public function detail_users()
    {
        $id         = $this->input->get('id');
        $response   = $this->users->get_users($id)->row();
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
            $id         = $this->input->post('id');
            $response   = [
                'status'    => [
                    'code'      => 200,
                    'message'   => 'Berhasil Mengubah Users',
                ],
                'response'  => $this->users->update_users($id),
            ];
            echo json_encode($response);
        }
    }
    
    public function delete_users()
    {
        $id         = $this->input->post('id');
        $response   = $this->users->delete_users($id);
        echo json_encode($response);
    }

    // LEVEL
    /**
     * Encodes string for use in XML
     *
     * @param       string  $str    Input string
     * @return      string
     */

    public function level()
    {
        $this->load->view('users/level');
    }

    public function ajax_level()
    {
        $response    = $this->users->get_level()->result_array();
        $no = 1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['id'];
            $tbody[]    = $row['name'];
            $aksi       =   '
                            <button type="button" class="btn btn-icon btn-round btn-primary" id="detail_data" data-id="'.$row['id'].'" title="Show Data"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-icon btn-round btn-danger" id="delete_data" data-id="'.$row['id'].'" title="Show Data"><i class="fa fa-times"></i></button>
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
        $id         = $this->input->get('id');
        $response   = $this->users->get_level($id)->row();
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
            $id         = $this->input->post('id');
            $response   = [
                'status'    => [
                    'code'      => 200,
                    'message'   => 'Berhasil Mengubah Level',
                ],
                'response'  => $this->users->update_level($id),
            ];
            echo json_encode($response);
        }
    }
    
    public function delete_level()
    {
        $id         = $this->input->post('id');
        $response   = $this->users->delete_level($id);
        echo json_encode($response);
    }

    public function get_level()
    {
        $response   = $this->users->get_level()->result();
        echo json_encode($response);
    }
    // LEVEL
}