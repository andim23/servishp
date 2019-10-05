<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Merk_model', 'merk');
    }

    public function index()
    {
        $this->load->view('merk/index');
    }

    public function data()
    {
        $response    = $this->merk->get_merk()->result_array();
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

    public function detail()
    {
        $kode       = $this->input->get('kode');
        $response   = $this->merk->get_merk($kode)->row();
        echo json_encode($response);
    }

    public function add()
    {
        // VALIDASI
        $this->form_validation->set_rules('merk_add', 'Merk', 'trim|required|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            if($this->merk->add_merk())
            {
                $response   = [
                    'status'    => [
                        'code'      => 200,
                        'message'   => 'Berhasil Menambahkan Merk',
                    ],
                    'response'  => '',
                ];
                echo json_encode($response);
            }
            else
            {
                $response   = [
                    'status'    => [
                        'code'      => 200,
                        'message'   => 'Gagal Menambahkan Merk',
                    ],
                    'response'  => '',
                ];
                echo json_encode($response);
            }
        }
    }

    public function update()
    {
        // VALIDASI
        $this->form_validation->set_rules('merk_update', 'Merk', 'trim|required|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $kode       = $this->input->post('kode');
            if($this->merk->update_merk($kode))
            {
                $response   = [
                    'status'    => [
                        'code'      => 200,
                        'message'   => 'Berhasil Mengubah Merk',
                    ],
                    'response'  => '',
                ];
                echo json_encode($response);
            }
            else
            {
                $response   = [
                    'status'    => [
                        'code'      => 200,
                        'message'   => 'Gagal Mengubah Merk',
                    ],
                    'response'  => '',
                ];
                echo json_encode($response);
            }
        }
    }

    public function delete()
    {
        $kode       = $this->input->post('kode');
        $response   = $this->merk->delete_merk($kode);
        echo  json_encode($response);
    }
}