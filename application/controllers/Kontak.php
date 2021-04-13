<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('kritik_model');
    }

    //Halaman Utama Website - Aboutpage
    public function index()
    {
        $site       = $this->konfigurasi_model->listing();

        //Validasi Input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama',
            'Nama lengkap',
            'required',
            array('required'        => '%s harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'          => '%s harus diisi',
                'valid_email'       => '%s tidak valid'
            )
        );
        $valid->set_rules(
            'telepon',
            'Telepon',
            'required',
            array(
                'required'          => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'pesan',
            'Pesan',
            'required',
            array('required'        => '%s harus diisi')
        );
        if ($valid->run() === false) {
            $data = array(
                'title'      => $site->namaweb,
                'site'       => $site,
                'logo'       => $site->logo,
                'isi'        => 'kritik/list'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
            //Masukan Database
        } else {
            $i = $this->input;
            $data = array(
                'nama'                => $i->post('nama'),
                'telepon'             => $i->post('telepon'),
                'email'               => $i->post('email'),
                'pesan'               => $i->post('pesan')
            );
            $this->kritik_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Kritik & Saran telah dikirim');
            redirect(base_url('kontak'), 'refresh');
        }
        //End masuk Database
    }
}
