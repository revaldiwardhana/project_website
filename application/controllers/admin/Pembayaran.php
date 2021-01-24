<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function read($id_pemesanan)
    {
        $header['titlepage'] = 'Detail Pembayaran';
        
        $pembayaran = $this->db
        ->join('user u','u.id_user = p.id_user')
        ->join('paket pa','pa.id_paket = p.id_paket')
        ->join('bus b','b.id_bus = p.id_bus')
        ->join('pembayaran pe','pe.no_order = p.id_pemesanan')
        ->where('p.status','dibayar')
        ->where('p.id_pemesanan',$id_pemesanan)
        ->get('pemesanan p')->row();

        $data['pembayaran'] = $pembayaran;

        $this->template->load('template','admin/pembayaran/pembayaran_read', $data, $header);
    }

    function index()
    {
        $header['titlepage'] = 'DATA PEMBAYARAN';
        $pembayaran = $this->db
        ->join('user u','u.id_user = p.id_user')
        ->join('paket pa','pa.id_paket = p.id_paket')
        ->where('p.status','dibayar')
        ->get('pemesanan p')->result();

        $data['pembayaran'] = $pembayaran;

		$this->template->load('template','admin/pembayaran/pembayaran_list', $data, $header);
    }

 }  

?>