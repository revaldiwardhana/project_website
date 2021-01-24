<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $paket = $this->Paket_model->get_all();
        

        $data = array(
            'paket_data' => $paket
        );

        $this->template->load('template','admin/paket/paket_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paket_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_paket' => $row->id_paket,
                'jenis_paket' => $row->jenis_paket,
                'jumlah_hari' => $row->jumlah_hari,
                'harga_paket' => $row->harga_paket,
                'rute1' => $row->rute1,
                // 'rute2' => $row->rute2,
                // 'rute3' => $row->rute3,
                'gambar1' => $row->gambar1,
                // 'gambar2' => $row->gambar2,
                // 'gambar3' => $row->gambar3,
            );
            $this->template->load('template','admin/paket/paket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/paket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/paket/create_action'),
            'id_paket' => set_value('id_paket'),
            'jenis_paket' => set_value('jenis_paket'),
            'jumlah_hari' => set_value('jumlah_hari'),
            'harga_paket' => set_value('harga_paket'),
            'rute1' => set_value('rute1'),
            // 'rute2' => set_value('rute2'),
            // 'rute3' => set_value('rute3'),
            'gambar1' => set_value('gambar1'),
            // 'gambar2' => set_value('gambar2'),
            // 'gambar3' => set_value('gambar3'),
        );
        $this->template->load('template','admin/paket/paket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data = array(
                'jenis_paket' => $this->input->post('jenis_paket',TRUE),
                'jumlah_hari' => $this->input->post('jumlah_hari',TRUE),    
                'harga_paket' => $this->input->post('harga_paket',TRUE),
                'rute1' => $this->input->post('rute1',TRUE),
            );

            if (!empty($_FILES['gambar1']['name'])) {
                $gambar1 = $this->upload_foto('gambar1');
                $data["gambar1"] = $gambar1['file_name'];
            }
            // if (!empty($_FILES['gambar2']['name'])) {
            //     $gambar2 = $this->upload_foto('gambar2');
            //     $data["gambar2"] = $gambar2['file_name'];
            // }
            // if (!empty($_FILES['gambar3']['name'])) {
            //     $gambar3 = $this->upload_foto('gambar3');
            //     $data["gambar3"] = $gambar3['file_name'];
            // }

            $this->Paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/paket'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/paket/update_action'),
                'id_paket' => set_value('id_paket', $row->id_paket),
                'jenis_paket' => set_value('jenis_paket', $row->jenis_paket),
                'jumlah_hari' => set_value('jumlah_hari', $row->jumlah_hari),
                'harga_paket' => set_value('harga_paket', $row->harga_paket),
                'rute1' => set_value('rute1', $row->rute1),
                // 'rute2' => set_value('rute2', $row->rute2),
                // 'rute3' => set_value('rute3', $row->rute3),
                'gambar1' => set_value('gambar1', $row->gambar1),
            );
            $this->template->load('template','admin/paket/paket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/paket'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paket', TRUE));
        } else {
            $data = array(
                'jenis_paket' => $this->input->post('jenis_paket',TRUE),
                'jumlah_hari' => $this->input->post('jumlah_hari',TRUE),
                'harga_paket' => $this->input->post('harga_paket',TRUE),
                'rute1' => $this->input->post('rute1',TRUE),
            );

            if (!empty($_FILES['gambar1']['name'])) {
                $gambar1 = $this->upload_foto('gambar1');
                $data["gambar1"] = $gambar1['file_name'];
            }
            // if (!empty($_FILES['gambar1']['name'])) {
            //     $gambar2 = $this->upload_foto('gambar2');
            //     $data["gambar2"] = $gambar2['file_name'];
            // }
            // if (!empty($_FILES['gambar3']['name'])) {
            //     $gambar3 = $this->upload_foto('gambar3');
            //     $data["gambar3"] = $gambar3['file_name'];
            // }

            $this->Paket_model->update($this->input->post('id_paket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/paket'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $this->Paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/paket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_paket', 'jenis paket', 'trim|required');
	$this->form_validation->set_rules('jumlah_hari', 'jumlah hari', 'trim|required');
	$this->form_validation->set_rules('harga_paket', 'harga paket', 'trim|required|numeric');

	$this->form_validation->set_rules('id_paket', 'id_paket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function upload_foto($file){
        
		$config['upload_path']      = './upload/paket/';
		$config['allowed_types']    = 'png|jpg|jpeg';
		$config['file_name']        = 'paket_'.$this->input->post('jenis_paket');

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
}
