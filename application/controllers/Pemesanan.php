<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        $id_paket      = $this->input->get('id_paket');

        if(!$this->session->user_login){
            $this->session->set_flashdata('goto_url',base_url().'pemesanan/?id_paket='.$id_paket);
            redirect('login','refresh');
        }

        $list_paket = [];
        $get_paket = $this->db->get('paket')->result();
        foreach($get_paket as $paket){
            $list_paket[$paket->id_paket] = $paket->jenis_paket.' - '.$paket->jumlah_hari.' hari - harga paket Rp. '.number_format($paket->harga_paket);
        }

        
        $list_pemesanan = [];
        $get_pemesanan = $this->db->get('pemesanan')->result();
        foreach($get_pemesanan as $pemesanan){
            $list_pemesanan[$pemesanan->id_pemesanan] = $pemesanan->jumlah_bus.'-' .$paket->jenis_paket.' hari - harga paket Rp. '.number_format($pemesanan->total_harga);
        }

        $list_bus = [];
        $get_bus = $this->db->get('bus')->result();
        foreach($get_bus as $bus){
            $list_bus[$bus->id_bus] = $bus->jenis_bus;
        }

        $data = array(
            'button'             => 'Buat Pesanan',
            'action'             => site_url('pemesanan/create_action'),
            'id_paket'           => set_value('id_paket',$id_paket),
            'id_bus'             => set_value('id_bus'),
            'nama_pemesanan'     => set_value('nama_pemesanan', $this->session->user_nama_lengkap),
            'alamat'             => set_value('alamat', $this->session->user_alamat),
            'no_telp'            => set_value('no_telp', $this->session->user_no_telp),
            'tanggal_pesan'      => set_value('tanggal_pesan'),
            'tanggal_keberangkatan' => set_value('tanggal_keberangkatan'),
            'total_harga'        => set_value('total_harga'),
            'status'             => set_value('status'),
            'lokasi_jemput'      => set_value('lokasi_jemput'),
            'jumlah_bus'         => set_value('jumlah_bus'),
            'bukti_bayar'        => set_value('bukti_bayar'),
            'list_paket'         => $list_paket,
            'list_bus'           => $list_bus,
        );

        $header['titlepage'] = 'Detail Paket Pemesanan';
        $this->template->load('template_umum','pemesanan_form', $data, $header);
    }

    public function create_nonpaket()
    {

        if(!$this->session->user_login){
            $this->session->set_flashdata('goto_url',base_url().'pemesanan/create_nonpaket');
            redirect('login','refresh');
        }

        $list_bus = [];
        $get_bus = $this->db->get('bus')->result();
        foreach($get_bus as $bus){
            $list_bus[$bus->id_bus] = $bus->jenis_bus.'-' .$bus->jumlah_tempatduduk.'-'.$bus->fasilitas_bus;
        }

        $data = array(
            'button'                => 'Buat Pesanan',
            'action'                => site_url('pemesanan/create_nonpaket_action'),
            'id_bus'                => set_value('id_bus'),
            'nama_pemesanan'        => set_value('nama_pemesanan', $this->session->user_nama_lengkap),
            'alamat'                => set_value('alamat', $this->session->user_alamat),
            'no_telp'               => set_value('no_telp', $this->session->user_no_telp),
            'tanggal_pesan'         => set_value('tanggal_pesan', date('d-m-Y')),
            'tanggal_keberangkatan' => set_value('tanggal_keberangkatan', date('d-m-Y')),
            'total_harga'           => set_value('total_harga'),
            'tujuan'                => set_value('tujuan'),
            'rute'                  => set_value('rute'),
            'jumlah_hari'           => set_value('jumlah_hari'),
            'jumlah_bus'           => set_value('jumlah_bus'),
            'lokasi_jemput'         => set_value('lokasi_jemput'),
            'list_bus'              => $list_bus,
        );

        $header['titlepage'] = 'Detail Pemesanan ';
        $this->template->load('template_umum','pemesanan_nonpaket_form', $data, $header);
        $this->load->view("pemesanan_nonpaket_js");
    }

    public function create_nonpaket_action() 
    {
        $get_bus    = $this->db->get_where('bus',['id_bus'=>$this->input->post('id_bus',TRUE)])->row();

        $data_paket = [
            'jenis_paket'   => $this->input->post('tujuan',TRUE),
            'jumlah_hari'   => $this->input->post('jumlah_hari',TRUE),
            'harga_paket'   => 0,
            'rute1'         => $this->input->post('rute',TRUE),
            'type'          => 'non-paket'
        ];
        $insert_paket   = $this->db->insert('paket',$data_paket);
        $id_paket       = $this->db->insert_id();
    
        $data = array(
            'id_paket'              => $id_paket,
            'id_bus'                => $this->input->post('id_bus',TRUE),
            'id_user'               => $this->session->user_id,
            'total_harga'           => 0, // $get_bus->harga_sewa,
            'nama_pemesanan'        => $this->input->post('nama_pemesanan',TRUE),
            'alamat'                => $this->input->post('alamat',TRUE),
            'lokasi_jemput'         => $this->input->post('lokasi_jemput',TRUE),
            'jumlah_bus'            => $this->input->post('jumlah_bus',TRUE),
            'no_telp'               => $this->input->post('no_telp',TRUE),
            'status'                => 'pending',
            'tanggal_pesan'         => date('Y-m-d',strtotime($this->input->post('tanggal_pesan',TRUE))),
            'tanggal_keberangkatan' =>  date('Y-m-d',strtotime($this->input->post('tanggal_keberangkatan',TRUE))),
        );

        $this->db->insert('pemesanan',$data);
        $id = $this->db->insert_id();
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('pemesanan/verifikasi/'.$id));
    }

    public function create_action() 
    {
        $get_bus    = $this->db->get_where('bus',['id_bus'=>$this->input->post('id_bus',TRUE)])->row();
        $get_paket  = $this->db->get_where('paket',['id_paket'=>$this->input->post('id_paket',TRUE)])->row();
        $get_pemesanan  = $this->db->get_where('pemesanan',['id_pemesanan'=>$this->input->post('id_pemesanan',TRUE)])->row();

            $data = array(
                'id_paket'           => $this->input->post('id_paket',TRUE),
                'id_bus'             => $this->input->post('id_bus',TRUE),
                'id_user'            => $this->session->user_id,
                'total_harga'        => $get_paket->harga_paket*$get_pemesanan->jumlah_bus, //$get_bus->harga_sewa+$get_paket->harga_paket,
                'nama_pemesanan'     => $this->input->post('nama_pemesanan',TRUE),
                'alamat'             => $this->input->post('alamat',TRUE),
                'no_telp'            => $this->input->post('no_telp',TRUE),
                'lokasi_jemput'      => $this->input->post('lokasi_jemput',TRUE),
                'jumlah_bus'      => $this->input->post('jumlah_bus',TRUE),
                'tanggal_pesan'      => date('Y-m-d',strtotime($this->input->post('tanggal_pesan',TRUE))),
                'tanggal_keberangkatan' =>  date('Y-m-d',strtotime($this->input->post('tanggal_keberangkatan',TRUE))),
            );

            $this->db->insert('pemesanan',$data);
            $id = $this->db->insert_id();
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemesanan/verifikasi/'.$id));
    }

    public function verifikasi($id_pemesanan) 
    {
        $get_pemesanan = $this->db
        ->select("jenis_paket, jumlah_hari, harga_paket, no_telp, jenis_bus, fasilitas_bus, pe.jumlah_bus, pe.id_pemesanan, otp")
        ->join('paket p','p.id_paket = pe.id_paket')
        ->join('bus b','b.id_bus = pe.id_bus')
        ->where(['pe.id_pemesanan'=>$id_pemesanan])
        ->get('pemesanan pe')->row();

        if($get_pemesanan){
            if($get_pemesanan->otp == ''){
                $otp        = substr(md5($get_pemesanan->no_telp.$id_pemesanan),0,6); //otp hasil enkripsi dari id_pemesanan dan nomertelepon diambil 6 karakter paling depan
                $send_otp   = kirim_otp($get_pemesanan->no_telp,$otp);
                $this->db->where('id_pemesanan',$id_pemesanan)->update('pemesanan',['otp'=>$otp]);
            }

            $data['pemesanan']  = $get_pemesanan;
            $data['action']     = site_url('pemesanan/verifikasi_action');

            $header['titlepage'] = 'Verifikasi Pemesanan';
            $this->template->load('template_umum','pemesanan_verifikasi', $data, $header);

        }
    }
    
    public function verifikasi_action() 
    {
        $id_pemesanan   = $this->input->post('id_pemesanan',TRUE);
        $otp_user       = $this->input->post('otp_user',TRUE);
        
        $get_pemesanan = $this->db
        ->join('paket p','p.id_paket = pe.id_paket')
        ->join('bus b','b.id_bus = pe.id_bus')
        ->where(['id_pemesanan'=>$id_pemesanan])
        ->get('pemesanan pe')->row();
        if($get_pemesanan){

            if($get_pemesanan->otp == $otp_user){
             
                $data = array(
                    'otp_confirm'   => 1,
                    'status'        => "approve",
                );

                $this->db->where('id_pemesanan',$id_pemesanan)->update('pemesanan',$data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('pemesanan/pembayaran/'.$id_pemesanan));
                
            }else{
                redirect('pemesanan/verifikasi/'.$id_pemesanan);
            }
        }
    }
    
    public function pembayaran($id_pemesanan) 
    {
        $get_pemesanan = $this->db
        ->select('pe.*, p.*, b.*, date_format((pe.tanggal_pesan + interval 1 day),"%d-%m-%Y %H:%i:%s") as tanggal_pembayaran')
        ->join('paket p','p.id_paket = pe.id_paket')
        ->join('bus b','b.id_bus = pe.id_bus')
        ->where(['id_Pemesanan'=>$id_pemesanan])
        ->get('pemesanan pe')->row();

        if($get_pemesanan){

            $data['pemesanan']  = $get_pemesanan;
            $data['action']     = site_url('pemesanan/pembayaran_action');

            $header['titlepage'] = 'Pembayaran Pemesanan';
            $this->template->load('template_umum','pemesanan_pembayaran', $data, $header);

        }
    }
    
    public function pembayaran_action() 
    {

        $bukti_bayar = $this->upload_bukti('bukti_bayar');
        if($bukti_bayar['status'] == '1'){

            $this->db->where('id_pemesanan',$this->input->post('id_pemesanan'))
            ->update('pemesanan',
            [
                'bukti_bayar'   => $bukti_bayar['file_name'],
                'total_bayar'   => $this->input->post('total_bayar'),
                'status'        => "dibayar",
                'tanggal_bayar' => date("Y-m-d H:i:s"),
            ]);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('pemesanan/create_nonpaket');
        }
    }

    
    function upload_bukti($file){
        
        $config['upload_path']      = './upload/bukti_bayar/';
        $config['allowed_types']    = 'png|jpg|jpeg|pdf';
        $config['file_name']        = 'bukti_bayar_'.$this->input->post('id_pemesanan');

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload($file))
        {
            //fetch data upload
            $file           = $this->upload->data();
            $file['status'] = '1';
        }else
        {
            $file['pesan']  = "Error :".$this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
            $file['status'] = '0';
        }   
        return $file;
    }

    function cek_keberangkatan(){
        $tgl = date("Y-m-d",strtotime($this->input->get("tgl")));

        $get_bus = $this->db->query("select ifnull(pe.jumlah_bus_dipesan,0) jumlah_bus_dipesan, pe.id_bus, b.* 
        from bus b
        left join (
            select p.id_bus, sum(p.jumlah_bus) jumlah_bus_dipesan from pemesanan p join paket pa on p.id_paket = pa.id_paket and '$tgl' between p.tanggal_keberangkatan and (p.tanggal_keberangkatan + interval pa.jumlah_hari day)
        ) pe on b.id_bus = pe.id_bus
        group by b.id_bus");

        echo json_encode($get_bus->result());

        
    }
}
