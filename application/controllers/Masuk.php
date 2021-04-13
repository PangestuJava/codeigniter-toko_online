<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
    }

    //Login pelanggan
    public function index()
    {
        //validasi
        $this->form_validation->set_rules(
            'email',
            'Email/username',
            'required',
            array('required'     => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required'     => '%s Harus Diisi')
        );

        if ($this->form_validation->run()) {
            $email            = $this->input->post('email');
            $password            = $this->input->post('password');
            //proses ke simple login
            $this->simple_pelanggan->login($email, $password);
        }
        //end validasi
        $data   = array (
                            'title'        => 'Login Pelanggan',
                            'isi'          => 'masuk/list'
    );
        $this->load->view('layout/wrapper', $data, false);
    }

    //logout
    public function logout()
    {
        //ambil fungsi logout
        $this->simple_pelanggan->logout();
    }
}