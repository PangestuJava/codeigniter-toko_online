<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_pelanggan
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //Load data model user
        $this->CI->load->model('pelanggan_model');
    }

    // Fungsi login
    public function login($email, $password)
    {
        $check = $this->CI->pelanggan_model->login($email, $password);
        //Jika ada data user, maka create session login
        if ($check) {
            $id_pelanggan       = $check->id_pelanggan;
            $nama_pelanggan     = $check->nama_pelanggan;
            //$akses_level        = $check->akses_level;
            //Creat session
            $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->CI->session->set_userdata('email', $email);
            //$this->CI->session->set_userdata('akses_level', $akses_level);
            //Redirect ke halaman admin yang diproteksi
            redirect(base_url('dasbor'), 'refresh');
        } else {
            //Kalau tidak ada(username/password salah)
            $this->CI->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //Fungsi cek login
    public function cek_login()
    {
        //Memeriksa apakah session sudah apa belom
        if ($this->CI->session->userdata('email') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda Belom Login');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //Fungsilogout
    public function logout()
    {
        //Membuang semua session
        $this->CI->session->unset_userdata('id_pelanggan');
        $this->CI->session->unset_userdata('nama_pelanggan');
        $this->CI->session->unset_userdata('email');
        //$this->CI->session->unset_userdata('akses_level');
        //Redirect ke login
        $this->CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
        redirect(base_url('masuk'), 'refresh');
    }
}
