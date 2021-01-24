<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    function melihat_bus()
    {
        $data['data_bus']       = $this->db->get('bus')->result();
        $header['titlepage']    = 'Melihat Bus';
        $this->template->load('template_umum','melihat_bus', $data, $header);
    }

    function melihat_bus_detail($id)
    {
        $data['data_bus']       = $this->db->get_where('bus',["id_bus"=>$id])->row();
        $data['foto_bus']       = $this->db->get_where('foto_bus',["id_bus"=>$id])->row();
        $header['titlepage']    = 'Melihat Bus Detail';
        $this->template->load('template_umum','melihat_bus_detail', $data, $header);
    }

    function melihat_paket()
    {
        $data['data_paket']     = $this->db->get('paket')->result();
        $header['titlepage']    = 'Melihat Paket';
        $this->template->load('template_umum','melihat_paket', $data, $header);
    }

    function data_diri()
    {
        
        if(!$this->session->user_login){
            $this->session->set_flashdata('goto_url',base_url().'penyewa/data_diri');
            redirect('login','refresh');
        }

        $data['data_diri']      = $this->db->get_where('user',['id_user'=>$this->session->user_id])->row();
        $header['titlepage']    = 'Kelola Data Diri';
        $this->template->load('template_umum','update_user_penyewa', $data, $header);
    }

    function data_diri_action()
    {
        
        $data['nama_lengkap']   = $this->input->post('nama_lengkap');
        $data['alamat']         = $this->input->post('alamat');
        $data['no_telp']        = $this->input->post('no_telp');
        $data['username']       = $this->input->post('username');
        if(null !== $this->input->post('password') && '' !== $this->input->post('password')){
            $data['password']       = md5($this->input->post('password'));
        }

        $update = $this->db->where("id_user",$this->input->post('id_user'))->update('user',$data);
        if($update){
            redirect('dashboard');
        }else{
            redirect('data_diri');
        }
    }

 }  

?>