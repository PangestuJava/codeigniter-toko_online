<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
    }

    //Halaman Utama Website - Aboutpage
    public function index()
    {
        $site       = $this->konfigurasi_model->listing();
        $data = array(
            'title'      => $site->namaweb,
            'site'       => $site,
            'logo'       => $site->logo,
            'isi'        => 'about/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
