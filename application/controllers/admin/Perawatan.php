<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Perawatan_bus_model','model');
    }

    function index()
    {

        $header['titlepage'] = 'DATA PERAWATAN BUS';
        $data = [
            "perawatan_bus_data"    => $this->model->get_all(),
        ];
		$this->template->load('template','admin/perawatan/perawatan_bus_list', $data, $header);
    }

    function read()
    {

        $header['titlepage'] = 'DETAIL DATA PERAWATAN BUS';
        
        $row = $this->db
        ->join('bus b','b.id_bus = pb.id_bus')
        ->get('perawatan_bus pb')->row();

        if ($row) {
            $data = [
                "perawatan_bus_data"    => $row,
            ];
            $this->template->load('template','admin/perawatan/perawatan_bus_read', $data, $header);
        }
    }

    function create()
    {
        $bus_list       = $this->model->bus_list();

        $header['titlepage'] = 'FORM PERAWATAN BUS';
        $data = [
            'button'                => 'Create',
            'action'                => site_url('admin/perawatan/create_action'),
            'id_perawatan_bus'      => set_value('id_perawatan_bus'),
            'id_bus'                => set_value('id_bus'),
            'warna_bus'             => set_value('warna_bus'),
            'jenis_perawatan'       => set_value('jenis_perawatan'),
            'tanggal_perawatan_bus' => set_value('tanggal_perawatan_bus',date('d-m-Y')),
            'harga'                 => set_value('harga'),
            'bus_list'              => $bus_list,
        ];
		$this->template->load('template','admin/perawatan/perawatan_bus_form', $data, $header);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_bus'                => $this->input->post('id_bus',TRUE),
                'warna_bus'       => $this->input->post('warna_bus',TRUE),
                'jenis_perawatan'       => $this->input->post('jenis_perawatan',TRUE),
                'tanggal_perawatan_bus' => date('Y-m-d',strtotime($this->input->post('tanggal_perawatan_bus',TRUE))),
                'harga'                 => $this->input->post('harga',TRUE),
            );

            $this->model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/perawatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->model->get_by_id($id);

        if ($row) {
            $bus_list       = $this->model->bus_list();
            $data = array(
                'button'                => 'Update',
                'action'                => site_url('admin/perawatan/update_action'),
                'id_perawatan_bus'      => set_value('id_perawatan_bus', $row->id_perawatan_bus),
                'id_bus'                => set_value('id_bus', $row->id_bus),
                'warna_bus'              => set_value('warna_bus', $row->warna_bus),
                'jenis_perawatan'       => set_value('jenis_perawatan', $row->jenis_perawatan),
                'tanggal_perawatan_bus' => set_value('tanggal_perawatan_bus', date('d-m-Y',strtotime($row->tanggal_perawatan_bus))),
                'harga'                 => set_value('harga', $row->harga),
                'bus_list'              => $bus_list,
            );
            $this->template->load('template','admin/perawatan/perawatan_bus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/perawatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_perawatan_bus', TRUE));
        } else {
            $data = array(
                'warna_bus'       => $this->input->post('warna_bus',TRUE),
                'jenis_perawatan'       => $this->input->post('jenis_perawatan',TRUE),
                'tanggal_perawatan_bus' => date('Y-m-d',strtotime($this->input->post('tanggal_perawatan_bus',TRUE))),
                'harga'                 => $this->input->post('harga',TRUE),
            );

            $this->model->update($this->input->post('id_perawatan_bus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/perawatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->model->get_by_id($id);

        if ($row) {
            $this->model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/perawatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/perawatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_bus', 'id bus', 'trim|required');
	$this->form_validation->set_rules('jenis_perawatan', 'jenis perawatan', 'trim|required');
	$this->form_validation->set_rules('tanggal_perawatan_bus', 'tanggal perawatan bus', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');

	$this->form_validation->set_rules('id_perawatan_bus', 'id_perawatan_bus', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

?>