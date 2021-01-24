<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penyewa_model');
    }

    function index()
    {
        $data = [
            'paket' => $this->penyewa_model->paket_perjalanan()
        ];

        $header['titlepage'] = 'Paket Perjalanan';
		$this->template->load('template','penyewa/paket', $data, $header);
    }

 }  

?>