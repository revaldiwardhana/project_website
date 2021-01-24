<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bus_model extends CI_Model
{

    public $table = 'bus';
    public $id = 'id_bus';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_bus', $q);
	$this->db->or_like('no_polisi', $q);
	$this->db->or_like('jenis_bus', $q);
	$this->db->or_like('fasilitas_bus', $q);
	$this->db->or_like('harga_sewa', $q);
	$this->db->or_like('jumlah_bus_kosong', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_bus', $q);
	$this->db->or_like('no_polisi', $q);
	$this->db->or_like('jenis_bus', $q);
	$this->db->or_like('fasilitas_bus', $q);
	$this->db->or_like('harga_sewa', $q);
	$this->db->or_like('jumlah_bus_kosong', $q);
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

/* End of file Bus_model.php */
/* Location: ./application/models/Bus_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-09 09:36:03 */
/* http://harviacode.com */