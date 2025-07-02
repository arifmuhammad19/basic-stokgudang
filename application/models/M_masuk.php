<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masuk extends CI_Model {

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

    public function get_data_masuk() {
        $this->db->select('tb_masuk.*, tb_barang.nama AS nama_barang');
        $this->db->from('tb_masuk');
        $this->db->join('tb_barang', 'tb_masuk.kode = tb_barang.kode');
        $this->db->order_by('tb_masuk.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_data_masuk_bulan($bulan) {
        $this->db->select('tb_masuk.*, tb_barang.nama AS nama_barang');
        $this->db->from('tb_masuk');
        $this->db->join('tb_barang', 'tb_masuk.kode = tb_barang.kode');
        $this->db->where('MONTH(tb_masuk.tanggal)', $bulan);
        $this->db->order_by('tb_masuk.id', 'DESC');
        return $this->db->get()->result();
    }

    // New method to fetch tujuan data
    public function get_tujuan($where) {
        return $this->db->get_where('tb_masuk', $where)->result();
    }
}
