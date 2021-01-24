<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{

    public $table = 'pemesanan';
    public $id = 'id_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $pembayaran = $this->db
        ->join('user u','u.id_user = p.id_user')
        ->join('paket pa','pa.id_paket = p.id_paket')
        ->where("status", "dibayar")
        ->get('pemesanan p')->result();

        return $pembayaran;
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pembayaran', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('no_order', $q);
	$this->db->or_like('tanggal_bayar', $q);
	$this->db->or_like('nominal_pembayaran', $q);
	$this->db->or_like('bukti_transfer', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pembayaran', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('no_order', $q);
	$this->db->or_like('tanggal_bayar', $q);
	$this->db->or_like('nominal_pembayaran', $q);
	$this->db->or_like('bukti_transfer', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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
