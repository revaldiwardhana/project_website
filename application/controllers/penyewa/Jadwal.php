<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $bulan = date('m',strtotime($this->input->get("periode")."-01"));
        $tahun = date('Y',strtotime($this->input->get("periode")."-01"));


        $get_lastday = $this->db->query("select day(last_day('$tahun-$bulan-01')) as lastday")->row();
        $glastday = $get_lastday->lastday;
        $selext_date = "";
        for($in = 1; $in<=$glastday; $in++){
            $day = $in <= 9 ? "0".$in : $in;

            if($in == $glastday)
                $selext_date .= "select '$tahun-$bulan-$day' as tanggal ";
            else
                $selext_date .= "select '$tahun-$bulan-$day' as tanggal union ";
        }

        $get_bus = $this->db->get("bus")->result();
        $jadwal = [];
        foreach($get_bus as $bus){
            $get_jadwal = $this->db
            ->select("t.tanggal, jenis_bus, ifnull(pa.jenis_paket,'-') as jenis_paket")
            ->join("(select distinct id_paket, id_bus, tanggal_keberangkatan from pemesanan) p","p.tanggal_keberangkatan = t.tanggal and year(p.tanggal_keberangkatan) = '$tahun' 
            and month(p.tanggal_keberangkatan) = '$bulan' and p.id_bus = $bus->id_bus ","left")
            ->join("paket pa","pa.id_paket = p.id_paket","left")
            ->join("bus b","b.id_bus = p.id_bus","left")
            ->get("($selext_date) as t")->result();
            $jadwal[] = $get_jadwal;
        }

        $header['titlepage'] = 'Daftar Jadwal Keberangkatan';
        $data = array(
            'bus'           => $get_bus,
            'get_lastday'   => $get_lastday,
            'tahun'         => $tahun,
            'bulan'         => $bulan,
            'jadwal'        => $jadwal,
        );

        $this->template->load('template_umum','penyewa/jadwal', $data, $header);
    }

}
