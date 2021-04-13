<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kritik extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kritik_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //Data kritik
    public function index()
    {
        $kritik = $this->kritik_model->listing();

        $data = array(
            'title'   => 'Kritik & Saran',
            'kontak'  => $kritik,
            'isi'     => 'admin/kritik/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //Delete kritik
    public function delete($id_kontak)
    {
        $data = array('id_kontak' =>  $id_kontak);
        $this->kritik_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/kritik'), 'refresh');
    }
}
