<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['data_perjalanan']    = $this->db->get_where('paket',['type'=>'paket'])->result();
        $header['titlepage']        = 'Paket Perjalanan';

        $this->template->load('template_penyewa','dashboard', $data, $header);
    }

 }  

?>