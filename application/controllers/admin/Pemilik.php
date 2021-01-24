<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemilik extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('pemilik_model');
        $this->load->library('form_validation');
    }

    public function read($id_pemilik)
    {
        $header['titlepage'] = 'Detail Pemilik';
        $data_pemilik = $this->db
        ->where(['level_user'=>'pemilik','id_user'=>$id_pemilik])
        ->get('user u')->row();
        $data['pemilik'] = $data_pemilik;

        $this->template->load('template','admin/pemilik/pemilik_read', $data, $header);
    }

    public function index()
    {
        $user = $this->pemilik_model->get_all();

        $header['titlepage'] = 'Daftar Pemilik';
        $data = array(
            'user_data' => $user
        );

        $this->template->load('template','admin/pemilik/pemilik_list', $data, $header);
    }

    public function create() 
    {
        $header['titlepage'] = 'Form Pemilik';
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
        $this->template->load('template','admin/pemilik/pemilik_form', $data, $header);
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
                'level_user'    => 'pemilik'
            );

            $this->pemilik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/pemilik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->pemilik_model->get_by_id($id);

        if ($row) {
            $header['titlepage'] = 'Form Pemilik';
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('admin/pemilik/update_action'),
                'id_user'       => set_value('id_user', $row->id_user),
                'nama_lengkap'  => set_value('nama_lengkap', $row->nama_lengkap),
                'alamat'        => set_value('alamat', $row->alamat),
                'no_telp'       => set_value('no_telp', $row->no_telp),
                'username'      => set_value('username', $row->username),
                'password'      => set_value('password'),
            );
            $this->template->load('template','admin/pemilik/pemilik_form', $data, $header);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pemilik'));
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
            if($this->input->post('password',TRUE) !== '') $data['password']   = md5($this->input->post('password',TRUE));

            $this->pemilik_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/pemilik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->pemilik_model->get_by_id($id);

        if ($row) {
            $this->pemilik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/pemilik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pemilik'));
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
