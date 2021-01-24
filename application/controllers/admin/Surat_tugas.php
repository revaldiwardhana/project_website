<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_tugas extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_tugas_model','model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data = array(
            'surat' => $this->model->get_all_admin()
        );

        $this->template->load('template','admin/surat_tugas/surat_tugas_list', $data);
    }

    public function read($id) 
    {
        $row =  $this->db
        ->select('id_surat_tugas, st.id_supir, u.nama_lengkap, st.kernet, st.uang_saku, pa.jenis_paket, pa.rute1 ,st.warna_bus, st.no_polisi,
        date_format(p.tanggal_keberangkatan,"%d-%m-%Y") as tanggal_keberangkatan,b.jenis_bus,
        date_format((p.tanggal_keberangkatan + INTERVAL pa.jumlah_hari DAY),"%d-%m-%Y") as tanggal_kembali', false)
        ->join('user u','u.id_user = st.id_supir')
        ->join('pemesanan p','p.id_pemesanan = st.id_pemesanan')
        ->join('bus b','b.id_bus = st.id_bus')
        ->join('paket pa','pa.id_paket = p.id_paket')
        ->where('st.id_surat_tugas',$id)
        ->get('surat_tugas st')->row();
        if ($row) {

            $data = [
                'surat_tugas' => $row
            ];

            $this->template->load('template','admin/surat_tugas/surat_tugas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/surat_tugas'));
        }
    }

    public function create() 
    {
        $supir_list     = $this->model->supir_list();
        $bus_list       = $this->model->bus_list();
        $pemesanan_list = $this->model->pemesanan_list();

        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/surat_tugas/create_action'),
            'id_surat_tugas'    => set_value('id_surat_tugas'),
            'id_pemesanan'      => set_value('id_pemesanan'),
            'id_bus'            => set_value('id_bus'),
            'no_polisi'         => set_value('no_polisi'),
            'id_supir'          => set_value('id_supir'),
            'warna_bus'         => set_value('warna_bus'),
            'kernet'            => set_value('kernet'),
            'uang_saku'         => set_value('uang_saku'),
            'supir_list'        => $supir_list,
            'bus_list'          => $bus_list,
            'pemesanan_list'    => $pemesanan_list,
        );
        $this->template->load('template','admin/surat_tugas/surat_tugas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                
                'id_pemesanan'      => $this->input->post('id_pemesanan',TRUE),
                'id_bus'            => $this->input->post('id_bus',TRUE),
                'no_polisi'         => $this->input->post('no_polisi',TRUE),
                'id_supir'          => $this->input->post('id_supir',TRUE),
                'kernet'            => $this->input->post('kernet',TRUE),
                'uang_saku'         => $this->input->post('uang_saku',TRUE),
                'warna_bus'         => $this->input->post('warna_bus',TRUE),

            );

            $this->model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/surat_tugas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->model->get_by_id($id);

        if ($row) {
            
            $supir_list     = $this->model->supir_list();
            $bus_list       = $this->model->bus_list();
            $pemesanan_list = $this->model->pemesanan_list();

            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/surat_tugas/update_action'),

                'id_surat_tugas'    => set_value('id_surat_tugas', $row->id_surat_tugas),
                'id_pemesanan'      => set_value('id_pemesanan', $row->id_pemesanan),
                'id_bus'            => set_value('id_bus', $row->id_bus),
                'id_supir'          => set_value('id_supir', $row->id_supir),
                'no_polisi'          => set_value('no_polisi', $row->no_polisi),
                'warna_bus'          => set_value('warna_bus', $row->warna_bus),
                'kernet'            => set_value('kernet', $row->kernet),
                'uang_saku'         => set_value('uang_saku', $row->uang_saku),
                'supir_list'        => $supir_list,
                'bus_list'          => $bus_list,
                'pemesanan_list'    => $pemesanan_list,
            );
            $this->template->load('template','admin/surat_tugas/surat_tugas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/surat_tugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_surat_tugas', TRUE));
        } else {
            $data = array(
                'id_pemesanan'      => $this->input->post('id_pemesanan',TRUE),
                'id_bus'            => $this->input->post('id_bus',TRUE),
                'id_supir'          => $this->input->post('id_supir',TRUE),
                'no_polisi'            => $this->input->post('no_polisi',TRUE),
                'kernet'            => $this->input->post('kernet',TRUE),
                'uang_saku'         => $this->input->post('uang_saku',TRUE),
                'warna_bus'         => $this->input->post('warna_bus',TRUE),
            );

            $this->model->update($this->input->post('id_surat_tugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/surat_tugas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->model->get_by_id($id);

        if ($row) {
            $this->model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/surat_tugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/surat_tugas'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('id_surat_tugas', 'surat tugas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
