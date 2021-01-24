<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public $table 	= 'user';
    public $id 		= 'nama_lengkap';
    public $pass 	= 'password';
    public $user    = 'username';
    public $order 	= 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function login($username, $password)
    {
        $data = $this->db->where(['username'=>$username,'password'=>md5($password)])
        ->get($this->table);
        return $data;
    }

}
