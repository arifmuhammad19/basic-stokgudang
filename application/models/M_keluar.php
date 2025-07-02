<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Keluar extends CI_Model {

    public function tampil_data($table) {
        $this->db->order_by('id', 'DESC');
        return $this->db->get($table);
    }

    public function get_stok($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function update_stok($whereupdate, $dataupdate, $table) {
        $this->db->where($whereupdate);
        $this->db->update($table, $dataupdate);
    }

    public function insert($datainsert, $table) {
        $this->db->insert($table, $datainsert);
        return $this->db->insert_id(); // Mengembalikan ID dari record yang baru saja diinsert
    }

    public function delete($where, $table) {
        $this->db->delete($table, $where);
    }

    public function update($wherekode, $data, $table) {
        $this->db->where($wherekode);
        $this->db->update($table, $data);
    }

    public function get_stok_edit($wherekode, $table) {
        return $this->db->get_where($table, $wherekode);
    }

    public function update_stok_edit($wherekode, $dataupdatestok, $table) {
        $this->db->where($wherekode);
        $this->db->update($table, $dataupdatestok);
    }

    public function update_jumlah_edit($whereid, $dataupdatejumlah, $table) {
        $this->db->where($whereid);
        $this->db->update($table, $dataupdatejumlah);
    }

    public function cetak_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function get_data_keluar() {
        $this->db->select('tb_keluar.*, tb_barang.nama AS nama_barang');
        $this->db->from('tb_keluar');
        $this->db->join('tb_barang', 'tb_keluar.kode = tb_barang.kode');
        $this->db->order_by('tb_keluar.id', 'DESC');
        return $this->db->get()->result();
    }
    
    public function get_data_keluar_bulan($bulan) {
        $this->db->select('tb_keluar.*, tb_barang.nama AS nama_barang');
        $this->db->from('tb_keluar');
        $this->db->join('tb_barang', 'tb_keluar.kode = tb_barang.kode');
        $this->db->where('MONTH(tb_keluar.tanggal)', $bulan);
        $this->db->order_by('tb_keluar.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_tujuan_keluar($where, $table) {
        $this->db->where($where);
        return $this->db->get($table)->row();
    }

    // Menambahkan metode untuk mengambil barang keluar berdasarkan tujuan
    public function get_data_keluar_by_tujuan($tujuan) {
        $this->db->select('tb_keluar.*, tb_barang.nama AS nama_barang');
        $this->db->from('tb_keluar');
        $this->db->join('tb_barang', 'tb_keluar.kode = tb_barang.kode');
        $this->db->where('tb_keluar.tujuan', $tujuan); // Filter berdasarkan tujuan
        $this->db->order_by('tb_keluar.id', 'DESC');
        return $this->db->get()->result();
    }

    // Menambahkan metode untuk mengambil tujuan berdasarkan kode barang
    public function get_tujuan_by_kode($kode) {
        $this->db->select('tujuan');
        $this->db->where('kode', $kode);
        return $this->db->get('tb_keluar')->row();
    }
}
