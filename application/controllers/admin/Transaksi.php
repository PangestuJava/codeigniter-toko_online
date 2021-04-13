<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('header_transaksi_model');
        $this->load->model('rekening_model');
        $this->load->model('transaksi_model');
        $this->load->model('konfigurasi_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //Data User
    public function index()
    {
        $header_tansaksi       = $this->header_transaksi_model->listing();
        $data           = array(
            'title'             => 'Data transaksi',
            'header_transaksi'  => $header_tansaksi,
            'isi'               => 'admin/transaksi/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //detail
    public function detail($kode_transaksi)
    {
        $header_transaksi       = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi              = $this->transaksi_model->kode_transaksi($kode_transaksi);

        $data   = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'transaksi'         => $transaksi,
            'isi'               => 'admin/transaksi/detail'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //cetak
    public function cetak($kode_transaksi)
    {
        $header_transaksi       = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi              = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site                   = $this->konfigurasi_model->listing();

        $data   = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'site'              => $site,
            'transaksi'         => $transaksi
        );
        $this->load->view('admin/transaksi/cetak', $data, false);
    }

    //unduh pdf
    public function pdf($kode_transaksi)
    {
        $header_transaksi       = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi              = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site                   = $this->konfigurasi_model->listing();

        $data   = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'site'              => $site,
            'transaksi'         => $transaksi
        );
        //$this->load->view('admin/transaksi/cetak', $data, false);
        $html = $this->load->view('admin/transaksi/cetak', $data, true);
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

    //unduh pengiriman
    public function kirim($kode_transaksi)
    {
        $header_transaksi       = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi              = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site                   = $this->konfigurasi_model->listing();

        $data   = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'site'              => $site,
            'transaksi'         => $transaksi
        );
        //$this->load->view('admin/transaksi/kirim', $data, false);
        $html = $this->load->view('admin/transaksi/kirim', $data, true);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; font-weight: bold;">
                <img src="' . base_url('assets/upload/image/' . $site->logo) . '" style="height: 50px; width: auto;">
            </div>');
        $mpdf->SetHTMLFooter('
            <div style="padding: 10px 20px; background-color: pink; white; font-size: 12px;">
            Alamat  : ' . $site->namaweb . '(' . $site->alamat . ')<br>
            Telepon : ' . $site->telepon . '
            </div>');

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $nama_file_pdf = url_title($site->namaweb, 'dash', 'true') . '-' . $kode_transaksi . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }

    public function status($kode_transaksi)
    {
        $header_transaksi       = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $rekening               = $this->rekening_model->listing();
        //Validasi Input

        $data = array(
            'id_header_transaksi'  => $header_transaksi->id_header_transaksi,
            'status_bayar'         => 'Dikirim',
        );
        $this->header_transaksi_model->edit($data);
        $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
        redirect(base_url('admin/transaksi'), 'refresh');

        //End masuk Database
    }
}
