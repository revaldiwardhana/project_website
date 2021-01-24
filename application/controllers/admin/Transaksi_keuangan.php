<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_keuangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tanggal        = $this->input->get("tanggal");
        $tanggal        = $tanggal == null ? date('Y-m-d') : date('Y-m-d',strtotime($tanggal));

        $i_tanggal      = date('d-m-Y',strtotime($tanggal));
        $pengeluaran    = $this->db
                            ->like("tanggal",$tanggal,"none",false)
                            ->get('pengeluaran')->result();

        $data = array(
            'pengeluaran'   => $pengeluaran,
            "tanggal"       => set_value("tanggal",$i_tanggal)
        );

        $this->template->load('template','admin/keuangan/lap_keuangan', $data);
    }

    public function laporan_keluar()
    {
        $tgl_awal        = $this->input->get("tgl_awal");
        $tgl_akhir       = $this->input->get("tgl_akhir");
        $tgl_awal        = $tgl_awal == null ? date('Y-m-d') : date('Y-m-d',strtotime($tgl_awal));
        $tgl_akhir       = $tgl_akhir == null ? date('Y-m-d') : date('Y-m-d',strtotime($tgl_akhir));

        $i_tgl_awal      = date('d-m-Y',strtotime($tgl_awal));
        $i_tgl_akhir     = date('d-m-Y',strtotime($tgl_akhir));
        $pengeluaran     = $this->db
                            ->where("tanggal between '$tgl_awal' and '$tgl_akhir'")
                            ->get('pengeluaran')->result();

        $data = array(
            'pengeluaran'   => $pengeluaran,
            "tgl_awal"      => set_value("tgl_awal",$i_tgl_awal),
            "tgl_akhir"     => set_value("tgl_akhir",$i_tgl_akhir)
        );

        $this->template->load('template','admin/keuangan/lap_keuangan_periode', $data);
    }

    public function laporan_masuk()
    {
        $tgl_awal        = $this->input->get("tgl_awal");
        $tgl_akhir       = $this->input->get("tgl_akhir");
        $tgl_awal        = $tgl_awal == null ? date('Y-m-d') : date('Y-m-d',strtotime($tgl_awal));
        $tgl_akhir       = $tgl_akhir == null ? date('Y-m-d') : date('Y-m-d',strtotime($tgl_akhir));

        $i_tgl_awal      = date('d-m-Y',strtotime($tgl_awal));
        $i_tgl_akhir     = date('d-m-Y',strtotime($tgl_akhir));
        $pemasukan     = $this->db
                            ->select("tanggal_pesan as tanggal, pa.jenis_paket, total_bayar")
                            ->join("paket pa","pa.id_paket = p.id_paket")
                            ->where("date(tanggal_pesan) between '$tgl_awal' and '$tgl_akhir'")
                            ->where("status","dibayar")
                            ->get('pemesanan p')->result();

        $data = array(
            'pemasukan'   => $pemasukan,
            "tgl_awal"      => set_value("tgl_awal",$i_tgl_awal),
            "tgl_akhir"     => set_value("tgl_akhir",$i_tgl_akhir)
        );

        $this->template->load('template','admin/keuangan/lap_keuangan_masuk_periode', $data);
    }

    public function read($id) 
    {
        $row = $this->db->get_where('pengeluaran',['id_pengeluaran'=>$id]);
        if ($row) {
            $data = ['pengeluaran' => $row];
            $header['titlepage'] = 'DETAIL TRANSAKSI KEUANGAN';
            $this->template->load('template','admin/keuangan/detail_keuangan', $data,$header);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/transaksi_keuangan'));
        }
    }

    public function create() 
    {
        $data = [
            'button'                    => 'Create',
            "action"                    => base_url('admin/transaksi_keuangan/create_action'),
            "jenis_pengeluaran"         => set_value('jenis_pengeluaran'),
            "jumlah_biaya_pengeluaran"  => set_value('jumlah_biaya_pengeluaran'),
            "tanggal"                   => set_value('tanggal', date('d-m-Y')),
        ];

        $header['titlepage'] = 'TRANSAKSI KEUANGAN';
		$this->template->load('template','admin/keuangan/transaksi_keuangan', $data, $header);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'jenis_pengeluaran'         => $this->input->post('jenis_pengeluaran',TRUE),
                'jumlah_biaya_pengeluaran'  => $this->input->post('jumlah_biaya_pengeluaran',TRUE),
                'tanggal'                   => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
            );

            $this->db->insert('pengeluaran',$data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/transaksi_keuangan/laporan_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->db->get_where('pengeluaran',$id);

        if ($row) {
            $data = array(
                'button'                    => 'Update',
                'action'                    => site_url('admin/transaksi_keuangan/update_action'),
                'jenis_pengeluaran'         => set_value('jenis_pengeluaran', $row->jenis_pengeluaran),
                'jumlah_biaya_pengeluaran'  => set_value('jumlah_biaya_pengeluaran', $row->jumlah_biaya_pengeluaran),
                'tanggal'                   => set_value('tanggal', date('d-m-Y',strtotime($row->tanggal))),
            );
            $header['titlepage'] = "UPDATE TRANSAKSI KEUANGAN";
            $this->template->load('template','admin/transaksi_keuangan/transaksi_keuangan', $data, $header);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/transaksi_keuangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengeluaran', TRUE));
        } else {
            $data = array(
                'jenis_pengeluaran'         => $this->input->post('jenis_pengeluaran',TRUE),
                'jumlah_biaya_pengeluaran'  => $this->input->post('jumlah_biaya_pengeluaran',TRUE),
                'tanggal'                   => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
            );

            $this->db->where('id_pengeluaran',$this->input->post('id_pengeluaran', TRUE))
            ->update('pengeluaran', $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/transaksi_pengeluaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->db->get_where('pengeluaran',['id_pengeluaran'=>$id])->row();

        if ($row) {
            $this->db->where('id_pengeluaran',$id)->delete('pengeluaran',$id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/transaksi_pengeluaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/transaksi_pengeluaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_pengeluaran', 'jenis_pengeluaran', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jumlah_biaya_pengeluaran', 'harga', 'trim|required|numeric');

	$this->form_validation->set_rules('id_pengeluaran', 'id_pengeluaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

 }  

?>