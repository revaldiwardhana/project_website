<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function read($id_pemesanan)
    {
        $header['titlepage'] = 'Detail Pemesanan';
        
        $pemesanan = $this->db
        ->join('user u','u.id_user = p.id_user')
        ->join('paket pa','pa.id_paket = p.id_paket')
        ->join('bus b','b.id_bus = p.id_bus')
        ->where('p.id_pemesanan',$id_pemesanan)
        ->get('pemesanan p')->row();

        $data['pemesanan'] = $pemesanan;

        $this->template->load('template','admin/pemesanan/pemesanan_read', $data, $header);
    }

    function index()
    {
        $header['titlepage'] = 'DATA PEMESANAN';
        $pemesanan = $this->db
        ->join('user u','u.id_user = p.id_user')
        ->join('paket pa','pa.id_paket = p.id_paket')
        ->get('pemesanan p')->result();

        $data['pemesanan'] = $pemesanan;

		$this->template->load('template','admin/pemesanan/pemesanan_list', $data, $header);
    }

    
    public function update_hrg_sewa() 
    {
        $id_pemesanan   = $this->input->post('id_pemesanan',TRUE);
        $harga_sewa   = $this->input->post('harga_sewa',TRUE);
        
        $get_pemesanan = $this->db
        ->join('paket p','p.id_paket = pe.id_paket')
        ->join('bus b','b.id_bus = pe.id_bus')
        ->where(['id_pemesanan'=>$id_pemesanan])
        ->get('pemesanan pe')->row();
        if($get_pemesanan){

            $data = array(
                'total_harga'   => $harga_sewa,
            );

            $this->db->where('id_pemesanan',$id_pemesanan)->update('pemesanan',$data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/pemesanan/'));
            
        }
    }
    

 }  

?>