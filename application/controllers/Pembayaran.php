<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pembayaran = $this->Pembayaran_model->get_all();

        $data = array(
            'pembayaran_data' => $pembayaran
        );

        $this->template->load('template','pembayaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembayaran' => $row->id_pembayaran,
		'id_user' => $row->id_user,
		'no_order' => $row->no_order,
		'tanggal_bayar' => $row->tanggal_bayar,
		'nominal_pembayaran' => $row->nominal_pembayaran,
		'bukti_transfer' => $row->bukti_transfer,
	    );
            $this->template->load('template','pembayaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
	    'id_pembayaran' => set_value('id_pembayaran'),
	    'id_user' => set_value('id_user'),
	    'no_order' => set_value('no_order'),
	    'tanggal_bayar' => set_value('tanggal_bayar'),
	    'nominal_pembayaran' => set_value('nominal_pembayaran'),
	    'bukti_transfer' => set_value('bukti_transfer'),
	);
        $this->template->load('template','pembayaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'no_order' => $this->input->post('no_order',TRUE),
		'tanggal_bayar' => $this->input->post('tanggal_bayar',TRUE),
		'nominal_pembayaran' => $this->input->post('nominal_pembayaran',TRUE),
		'bukti_transfer' => $this->input->post('bukti_transfer',TRUE),
	    );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
		'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
		'id_user' => set_value('id_user', $row->id_user),
		'no_order' => set_value('no_order', $row->no_order),
		'tanggal_bayar' => set_value('tanggal_bayar', $row->tanggal_bayar),
		'nominal_pembayaran' => set_value('nominal_pembayaran', $row->nominal_pembayaran),
		'bukti_transfer' => set_value('bukti_transfer', $row->bukti_transfer),
	    );
            $this->template->load('template','pembayaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'no_order' => $this->input->post('no_order',TRUE),
		'tanggal_bayar' => $this->input->post('tanggal_bayar',TRUE),
		'nominal_pembayaran' => $this->input->post('nominal_pembayaran',TRUE),
		'bukti_transfer' => $this->input->post('bukti_transfer',TRUE),
	    );

            $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('no_order', 'no order', 'trim|required');
	$this->form_validation->set_rules('tanggal_bayar', 'tanggal bayar', 'trim|required');
	$this->form_validation->set_rules('nominal_pembayaran', 'nominal pembayaran', 'trim|required|numeric');
	$this->form_validation->set_rules('bukti_transfer', 'bukti transfer', 'trim|required');

	$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-09 09:36:52 */
/* http://harviacode.com */