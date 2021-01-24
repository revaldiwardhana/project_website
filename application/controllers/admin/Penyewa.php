<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penyewa extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('penyewa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user = $this->penyewa_model->get_all();

        $header['titlepage'] = 'Daftar Penyewa';
        $data = array(
            'user_data' => $user
        );

        $this->template->load('template','admin/penyewa/penyewa_list', $data, $header);
    }

    public function read($id_penyewa)
    {
        $header['titlepage'] = 'Detail Penyewa';
        $data_penyewa = $this->db
        ->where(['level_user'=>'penyewa','id_user'=>$id_penyewa])
        ->get('user u')->row();
        $data['penyewa'] = $data_penyewa;

        $this->template->load('template','admin/penyewa/penyewa_read', $data, $header);
    }

    public function create() 
    {
        $header['titlepage'] = 'Form Penyewa';
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
            'id_user' => set_value('id_user'),
            'nama_lengkap' => set_value('nama_lengkap'),
            'alamat' => set_value('alamat'),
            'no_telp' => set_value('no_telp'),
            'username' => set_value('username'),
            'password' => set_value('password'),
        );
        $this->template->load('template','admin/penyewa/penyewa_form', $data, $header);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_lengkap'  => $this->input->post('nama_lengkap',TRUE),
                'alamat'        => $this->input->post('alamat',TRUE),
                'no_telp'       => $this->input->post('no_telp',TRUE),
                'username'      => $this->input->post('username',TRUE),
                'password'      => md5($this->input->post('password',TRUE)),
                'level_user'    => 'penyewa'
            );

            $this->penyewa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/penyewa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->penyewa_model->get_by_id($id);

        if ($row) {
            $header['titlepage'] = 'Form Penyewa';
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('user/update_action'),
                'id_user'       => set_value('id_user', $row->id_user),
                'nama_lengkap'  => set_value('nama_lengkap', $row->nama_lengkap),
                'alamat'        => set_value('alamat', $row->alamat),
                'no_telp'       => set_value('no_telp', $row->no_telp),
                'username'      => set_value('username', $row->username),
            );
            $this->template->load('template','admin/penyewa/penyewa_form', $data, $header);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penyewa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
                'nama_lengkap'  => $this->input->post('nama_lengkap',TRUE),
                'alamat'        => $this->input->post('alamat',TRUE),
                'no_telp'       => $this->input->post('no_telp',TRUE),
                'username'      => $this->input->post('username',TRUE),
            );
            if($this->input->post('password',TRUE) !== '') $data['password']   = $this->input->post('password',TRUE);

            $this->penyewa_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/penyewa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->penyewa_model->get_by_id($id);

        if ($row) {
            $this->penyewa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/penyewa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penyewa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
