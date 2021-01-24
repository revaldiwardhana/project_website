<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_tugas_model extends CI_Model
{

    public $table = 'surat_tugas';
    public $id = 'id_surat_tugas';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function supir_list(){
        $supir = $this->db->get_where('user',['level_user'=>'supir'])->result();
        $_supir = [];
        foreach($supir as $row){
            $_supir[$row->id_user] = $row->nama_lengkap;
        }
        return $_supir;
    }

    function bus_list(){
        $bus = $this->db->get('bus')->result();
        $_bus = [];
        foreach($bus as $row){
            $_bus[$row->id_bus] = $row->jenis_bus;
        }
        return $_bus;
    }

    function pemesanan_list(){
        $pemesanan = $this->db
        ->join('paket p','p.id_paket = pe.id_paket')
        ->get('pemesanan pe')->result();
        $_pemesanan = [];
        foreach($pemesanan as $row){
            $_pemesanan[$row->id_pemesanan] = $row->nama_pemesanan.' - '.$row->jenis_paket.' - berangkat : '.date('d-m-Y',strtotime($row->tanggal_keberangkatan));
        }
        return $_pemesanan;
    }

    // get all
    function get_all_admin()
    {
        return $this->db
        ->select('id_surat_tugas, st.id_supir, u.nama_lengkap, st.kernet, st.uang_saku, pa.jenis_paket, pa.rute1, st.warna_bus, st.no_polisi, 
        date_format(p.tanggal_keberangkatan,"%d-%m-%Y") as tanggal_keberangkatan,b.jenis_bus, 
        date_format((p.tanggal_keberangkatan + INTERVAL pa.jumlah_hari DAY),"%d-%m-%Y") as tanggal_kembali', false)
        ->join('user u','u.id_user = st.id_supir')
        ->join('pemesanan p','p.id_pemesanan = st.id_pemesanan')
        ->join('bus b','b.id_bus = st.id_bus')
        ->join('paket pa','pa.id_paket = p.id_paket')
        ->order_by($this->id, $this->order)
        ->get($this->table.' st')->result();
    }

    function get_all_supir()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
