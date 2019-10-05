<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kerusakan_model', 'kerusakan');
    }

    public function index()
    {
        $this->load->view('kerusakan/index');
    }

    public function data()
    {
        $response    = $this->kerusakan->get_kerusakan()->result_array();
        $no = 1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $no++;
            $tbody[]    = $row['name'];
            $tbody[]    = $row['harga'];
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
        $response   = $this->kerusakan->get_kerusakan($kode)->row();
        echo json_encode($response);
    }

    public function add()
    {
        // VALIDASI
        $this->form_validation->set_rules('kerusakan_add', 'Kerusakan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('harga_add', 'Harga', 'trim|required|numeric|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');
        $this->form_validation->set_message('numeric', 'Maaf! Format <b>%s</b> Harus Berupa Angka');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            if($this->kerusakan->add_kerusakan())
            {
                $response   = [
                    'status'    => [
                        'code'      => 200,
                        'message'   => 'Berhasil Menambahkan Kerusakan',
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
                        'message'   => 'Gagal Menambahkan Kerusakan',
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
        $this->form_validation->set_rules('kerusakan_update', 'Kerusakan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('harga_update', 'Harga', 'trim|required|numeric|xss_clean');
        // PESAN
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');
        $this->form_validation->set_message('numeric', 'Maaf! Format <b>%s</b> Harus Berupa Angka');

        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $kode       = $this->input->post('kode');
            if($this->kerusakan->update_kerusakan($kode))
            {
                $response   = [
                    'status'    => [
                        'code'      => 200,
                        'message'   => 'Berhasil Mengubah Kerusakan',
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
                        'message'   => 'Gagal Mengubah Kerusakan',
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
        $response   = $this->kerusakan->delete_kerusakan($kode);
        echo  json_encode($response);
    }
}