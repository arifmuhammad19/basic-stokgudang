<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('id')) {
            redirect('welcome');
        }
        $this->load->model('M_keluar', 'm_keluar'); // Load model M_keluar
        $this->load->model('M_masuk', 'm_masuk'); // Load model M_masuk
    }

    public function index() {
        $data['barang'] = $this->m_masuk->tampil_data('tb_barang')->result(); // Get barang data
        $data['keluar'] = $this->m_keluar->get_data_keluar(); // Get keluar data

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/keluar', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah_barang() {
        $kode = $this->input->post('kode');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $tujuan = $this->input->post('tujuan'); // Get tujuan from input

        $where = array('kode' => $kode);
        $stok = $this->m_masuk->get_stok($where, 'tb_barang')->row(); // Get single row result

        if ($stok) {
            $updatestok = $stok->stok - $jumlah; // Calculate updated stock

            $datainsert = array(
                'kode' => $kode,
                'tanggal' => $tanggal,
                'jumlah' => $jumlah,
                'tujuan' => $tujuan // Insert tujuan
            );

            $whereupdate = array('kode' => $kode);
            $dataupdate = array('stok' => $updatestok);

            $this->m_masuk->update_stok($whereupdate, $dataupdate, 'tb_barang');
            $this->m_keluar->insert($datainsert, 'tb_keluar');
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Selamat!</strong> Data barang keluar berhasil ditambahkan
                </div>
            ');
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> Barang tidak ditemukan atau stok tidak mencukupi
                </div>
            ');
        }
        redirect('admin/keluar');
    }

    public function hapus($id) {
        $where = array('id' => $id);
        $datakeluar = $this->m_keluar->get_stok($where, 'tb_keluar')->row(); // Get single row result

        if ($datakeluar) {
            $wherebarang = array('kode' => $datakeluar->kode);
            $databarang = $this->m_keluar->get_stok($wherebarang, 'tb_barang')->row(); // Get single row result

            if ($databarang) {
                $stok = $databarang->stok + $datakeluar->jumlah; // Calculate updated stock
                $wherekode = array('kode' => $datakeluar->kode);
                $data = array('stok' => $stok);

                $this->m_keluar->delete($where, 'tb_keluar');
                $this->m_keluar->update($wherekode, $data, 'tb_barang');
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Selamat!</strong> Data barang keluar berhasil dihapus
                    </div>
                ');
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> Data barang tidak ditemukan
                    </div>
                ');
            }
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> Data barang keluar tidak ditemukan
                </div>
            ');
        }
        redirect('admin/keluar');
    }

    public function edit() {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $tujuan = $this->input->post('tujuan');
    
        $data = array(
            'kode' => $kode,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'tujuan' => $tujuan
        );
    
        $where = array(
            'id' => $id
        );
    
        $this->m_keluar->update($where, $data, 'tb_keluar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil diupdate!</div>');
        redirect('admin/keluar');
    }
    
    
    public function cetak() {
        $bulan = $this->input->post('bulan');
        $jenis = $this->input->post('jenis');
    
        if ($jenis == 'keluar') {
            // Get data for the specified month
            $data['cetak'] = $this->m_keluar->get_data_keluar_bulan($bulan);
        } else {
            $data['cetak'] = $this->m_masuk->get_data_masuk_bulan($bulan);
        }
    
        $data['jenis'] = $jenis;
        $this->load->view('admin/cetak', $data);
    }
    
    
    
}
