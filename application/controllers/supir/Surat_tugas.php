<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_tugas extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_tugas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $surat_tugas = $this->Surat_tugas_model->get_all_admin();

        $data = array(
            'surat_tugas_data' => $surat_tugas
        );

        $this->template->load('template','supir/surat_tugas/surat_tugas_list', $data);
    }

    public function read($id) 
    {
        
        $row =  $this->db
        ->select('id_surat_tugas, st.id_supir, u.nama_lengkap, st.kernet, st.uang_saku, pa.jenis_paket, st.warna_bus,
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
            $this->template->load('template','supir/surat_tugas/surat_tugas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supir/surat_tugas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surat_tugas/create_action'),
	    'id_surat_tugas' => set_value('id_surat_tugas'),
	    'id_bus' => set_value('id_bus'),
	    'id_paket' => set_value('id_paket'),
	    'id_order' => set_value('id_order'),
	    'id_supir' => set_value('id_supir'),
	);
        $this->template->load('template','surat_tugas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_bus' => $this->input->post('id_bus',TRUE),
		'id_paket' => $this->input->post('id_paket',TRUE),
		'id_order' => $this->input->post('id_order',TRUE),
		'id_supir' => $this->input->post('id_supir',TRUE),
	    );

            $this->Surat_tugas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat_tugas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_tugas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_tugas/update_action'),
		'id_surat_tugas' => set_value('id_surat_tugas', $row->id_surat_tugas),
		'id_bus' => set_value('id_bus', $row->id_bus),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'id_order' => set_value('id_order', $row->id_order),
		'id_supir' => set_value('id_supir', $row->id_supir),
	    );
            $this->template->load('template','surat_tugas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_tugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_surat_tugas', TRUE));
        } else {
            $data = array(
		'id_bus' => $this->input->post('id_bus',TRUE),
		'id_paket' => $this->input->post('id_paket',TRUE),
		'id_order' => $this->input->post('id_order',TRUE),
		'id_supir' => $this->input->post('id_supir',TRUE),
	    );

            $this->Surat_tugas_model->update($this->input->post('id_surat_tugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat_tugas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_tugas_model->get_by_id($id);

        if ($row) {
            $this->Surat_tugas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_tugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_tugas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_bus', 'id bus', 'trim|required');
	$this->form_validation->set_rules('id_paket', 'id paket', 'trim|required');
	$this->form_validation->set_rules('id_order', 'id order', 'trim|required');
	$this->form_validation->set_rules('id_supir', 'id supir', 'trim|required');

	$this->form_validation->set_rules('id_surat_tugas', 'id_surat_tugas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Surat_tugas.php */
/* Location: ./application/controllers/Surat_tugas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-09 09:37:05 */
/* http://harviacode.com */