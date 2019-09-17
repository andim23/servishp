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
            $tbody[]    = $row['nama'];
            $tbody[]    = $row['jenis_kelamin'];
            $tbody[]    = $row['tempat'];
            $aksi       =   '
                            <button type="button" class="btn btn-icon btn-round btn-primary" id="detail_data" data-kode="'.$row['kode'].'" title="Show Data"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-icon btn-round btn-danger" id="delete_data" data-kode="'.$row['kode'].'" title="Show Data"><i class="fa fa-times"></i></button>
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
        $response   = $this->pegawai->get_pegawai($kode)->row();
        echo json_encode($response);
    }

    public function add()
    {
        // VALIDASI
        $this->form_validation->set_rules('users_add', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nama_add', 'Nama', 'trim|required|xss_clean');
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
        // VALIDASI
        $this->form_validation->set_rules('users_update', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nama_update', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jenis_kelamin_update', 'Jenis Kelamin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tempat_update', 'Tempat Lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tanggal_lahir_update', 'Tanggal Lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('agama_update', 'Agama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alamat_update', 'Alamat Kelamin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_telp_update', 'No Telp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status_update', 'Status', 'trim|required|xss_clean');
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
                    'message'   => 'Berhasil Mengubah Pegawai',
                ],
                'response'  => $this->pegawai->update_pegawai($kode),
            ];
            echo json_encode($response);
        }
    }

    public function delete()
    {
        $kode       = $this->input->post('kode');
        $response   = $this->pegawai->delete_pegawai($kode);
        echo  json_encode($response);
    }
}