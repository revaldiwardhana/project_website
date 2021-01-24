<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->user_login !== true) redirect('login');
    }

    function index()
    {
        if($this->session->user_level == 'admin'){
            $header['titlepage'] = 'Dashboard';
            $pending = $this->db
            ->join('user u','u.id_user = pe.id_user')
            ->join('paket p','p.id_paket = pe.id_paket')
            ->join('bus b','b.id_bus = pe.id_bus')
            ->where('pe.status','pending')
            ->get('pemesanan pe')->result();

            $dibayar = $this->db
            ->join('user u','u.id_user = pe.id_user')
            ->join('paket p','p.id_paket = pe.id_paket')
            ->join('bus b','b.id_bus = pe.id_bus')
            ->where('pe.status','dibayar')
            ->get('pemesanan pe')->result();
            
            $data = [
                'pending' => $pending,
                'dibayar' => $dibayar,
            ];
            
            $this->template->load('template','dashboard_admin', $data, $header);
        }
    }

 }  

?>