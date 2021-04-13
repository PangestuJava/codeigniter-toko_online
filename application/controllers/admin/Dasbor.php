<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        //Proteksi Halaman
        $this->simple_login->cek_login();
    }

    //Halaman utama dasbor
    public function index()
    {
        $data = array(
            'title'   => 'Halaman Admin',
            'isi'     => 'admin/dasbor/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }
}
