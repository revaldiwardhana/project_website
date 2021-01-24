<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perawatan_bus_model extends CI_Model
{

    public $table = 'perawatan_bus';
    public $id = 'id_perawatan_bus';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function bus_list(){
        $bus = $this->db->get('bus')->result();
        $_bus = [];
        foreach($bus as $row){
            $_bus[$row->id_bus] = $row->jenis_bus;
        }
        return $_bus;
    }

    // get all
    function get_all()
    {
       return $this->db
        ->select('pb.*, b.jenis_bus')
        ->join('bus b','b.id_bus = pb.id_bus')
        ->order_by($this->id, $this->order)
        ->get($this->table.' pb')->result();
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
