<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //Load data model user
        $this->CI->load->model('user_model');
    }

    // Fungsi login
    public function login($username, $password)
    {
        $check = $this->CI->user_model->login($username, $password);
        //Jika ada data user, maka create session login
        if ($check) {
            $id_user            = $check->id_user;
            $nama               = $check->nama;
            $akses_level        = $check->akses_level;
            //Creat session
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);
            //Redirect ke halaman admin yang diproteksi
            redirect(base_url('admin/dasbor'), 'refresh');
        } else {
            //Kalau tidak ada(username/password salah)
            $this->CI->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsi cek login
    public function cek_login()
    {
        //Memeriksa apakah session sudah apa belom
        if ($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda Belom Login');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsilogout
    public function logout()
    {
        //Membuang semua session
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('akses_level');
        //Redirect ke login
        $this->CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
        redirect(base_url('login'), 'refresh');
    }
}
