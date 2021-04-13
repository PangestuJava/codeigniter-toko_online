<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rekening_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //Data Rekening
    public function index()
    {
        $rekening = $this->rekening_model->listing();

        $data = array(
            'title'         => 'Data Rekening',
            'rekening'      => $rekening,
            'isi'           => 'admin/rekening/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //Tambah rekening
    public function tambah()
    {
        //Validasi Input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_bank',
            'Nama rekening',
            'required',
            array(
                'required'        => '%s Harus Diisi'
            )
        );
        $valid->set_rules(
            'nomor_rekening',
            'Nomor rekening',
            'required|is_unique[rekening.nomor_rekening]',
            array(
                'required'        => '%s Harus Diisi',
                'is_unique'      => '%s Sudah Ada'
            )
        );
        $valid->set_rules(
            'nama_pemilik',
            'Nama pemilik rekening',
            'required',
            array(
                'required'        => '%s Harus Diisi'
            )
        );

        if ($valid->run() === false) {
            $data = array(
                'title'             => 'Tambah Rekening',
                'isi'               => 'admin/rekening/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, false);

            //Masukan Database
        } else {
            $i              = $this->input;
            $data = array(
                'nama_bank'                   => $i->post('nama_bank'),
                'nomor_rekening'              => $i->post('nomor_rekening'),
                'nama_pemilik'                => $i->post('nama_pemilik')
            );
            $this->rekening_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //End masuk Database
    }

    //Edit rekening
    public function edit($id_rekening)
    {
        $rekening = $this->rekening_model->detail($id_rekening);
        //Validasi Input

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama rekening',
            'required|is_unique[rekening.nama_bank]',
            array(
                'required'        => '%s harus diisi',
                'is_unique'       => '%s Sudah Ada'
            )
        );
        if ($valid->run() === false) {

            $data = array(
                'title'                 => 'Edit Rekening',
                'rekening'              => $rekening,
                'isi'                   => 'admin/rekening/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, false);
            //Masukan Database
        } else {
            $i = $this->input;
            $data = array(
                'id_rekening'                 => $id_rekening,
                'nama_bank'                   => $i->post('nama_bank'),
                'nomor_rekening'              => $i->post('nomor_rekening'),
                'nama_pemilik'                => $i->post('nama_pemilik')
            );
            $this->rekening_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //End masuk Database
    }

    //Delete rekening
    public function delete($id_rekening)
    {
        $data = array('id_rekening' =>  $id_rekening);
        $this->rekening_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/rekening'), 'refresh');
    }
}
