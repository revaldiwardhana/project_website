<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bus extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bus_model');
        $this->load->library('form_validation');
    }

    function upload_foto($files){
        
		$config['upload_path']      = './upload/bus/';
		$config['allowed_types']    = 'png|jpg|jpeg';
		$config['file_name']        = $this->input->post('jenis_bus').'-'.$files;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ($this->upload->do_upload($files))
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

    public function index()
    {
        $bus = $this->Bus_model->get_all();

        $data = array(
            'bus_data' => $bus
        );

        $this->template->load('template','admin/bus/bus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bus_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_bus'               => $row->id_bus,
                'jenis_bus'            => $row->jenis_bus,
                'fasilitas_bus'        => $row->fasilitas_bus,
                'jumlah_tempatduduk'   => $row->jumlah_tempatduduk,
                'jumlah_bus'            => $row->jumlah_bus,
	        );
            $this->template->load('template','admin/bus/bus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/bus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'             => 'Create',
            'action'             => site_url('admin/bus/create_action'),
            'id_bus'             => set_value('id_bus'),
            'jenis_bus'          => set_value('jenis_bus'),
            'fasilitas_bus'      => set_value('fasilitas_bus'),
            'jumlah_tempatduduk' => set_value('jumlah_tempatduduk'),
            'jumlah_bus'          => set_value('jumlah_bus'),
        );
        $this->template->load('template','admin/bus/bus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data_insert = array(
                'jenis_bus'         => $this->input->post('jenis_bus',TRUE),
                'fasilitas_bus'     => $this->input->post('fasilitas_bus',TRUE),
                'jumlah_tempatduduk'=> $this->input->post('jumlah_tempatduduk',TRUE),
                'jumlah_bus'         => $this->input->post('jumlah_bus',TRUE),
            );

            $this->Bus_model->insert($data_insert);
            $id = $this->db->insert_id();
            
            $data["id_bus"] = $id;
            if (!empty($_FILES['bus1']['name'])) {
                $gambar1 = $this->upload_foto('bus1');

                if(!isset($gambar1["pesan"])) 
                    $data["gambar1"] = $gambar1['file_name'];
            }

            if (!empty($_FILES['bus2']['name'])) {
                $gambar2 = $this->upload_foto('bus2');
                if(!isset($gambar1["pesan"])) 
                $data["gambar2"] = $gambar2['file_name'];
            }

            if (!empty($_FILES['bus3']['name'])) {
                $gambar3 = $this->upload_foto('bus3');
                if(!isset($gambar1["pesan"])) 
                $data["gambar3"] = $gambar3['file_name'];
            }

            if (!empty($_FILES['bus4']['name'])) {
                $gambar4 = $this->upload_foto('bus4');
                if(!isset($gambar1["pesan"])) 
                $data["gambar4"] = $gambar4['file_name'];
            }

            if (!empty($_FILES['bus5']['name'])) {
                $gambar5 = $this->upload_foto('bus5');
                if(!isset($gambar1["pesan"])) 
                $data["gambar5"] = $gambar5['file_name'];
            }

            if (!empty($_FILES['bus6']['name'])) {
                $gambar6 = $this->upload_foto('bus6');
                if(!isset($gambar1["pesan"])) 
                $data["gambar6"] = $gambar6['file_name'];
            }
            
            $this->db->insert("foto_bus",$data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/bus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'             => 'Update',
                'action'             => site_url('admin/bus/update_action'),
                'id_bus'             => set_value('id_bus', $row->id_bus),
                'jenis_bus'          => set_value('jenis_bus', $row->jenis_bus),
                'fasilitas_bus'      => set_value('fasilitas_bus', $row->fasilitas_bus),
                'jumlah_tempatduduk' => set_value('jumlah_tempatduduk', $row->jumlah_tempatduduk),
                'jumlah_bus'         => set_value('jumlah_bus', $row->jumlah_bus),
            );
            $data['foto_bus'] = $this->db->get_where("foto_bus",["id_bus"=>$id])->row();

            $this->template->load('template','admin/bus/bus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/bus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bus', TRUE));
        } else {
            $data_update = array(
                'jenis_bus'          => $this->input->post('jenis_bus',TRUE),
                'fasilitas_bus'      => $this->input->post('fasilitas_bus',TRUE),
                'jumlah_tempatduduk' => $this->input->post('jumlah_tempatduduk',TRUE),
                'jumlah_bus'         => $this->input->post('jumlah_bus',TRUE),
            
            );

            $this->Bus_model->update($this->input->post('id_bus', TRUE), $data_update);
            
            //Update foto bus
            if (!empty($_FILES['bus1']['name'])) {
                $gambar1 = $this->upload_foto('bus1');

                if(!isset($gambar1["pesan"])) 
                    $data["gambar1"] = $gambar1['file_name'];
            }

            if (!empty($_FILES['bus2']['name'])) {
                $gambar2 = $this->upload_foto('bus2');
                if(!isset($gambar1["pesan"])) 
                $data["gambar2"] = $gambar2['file_name'];
            }

            if (!empty($_FILES['bus3']['name'])) {
                $gambar3 = $this->upload_foto('bus3');
                if(!isset($gambar1["pesan"])) 
                $data["gambar3"] = $gambar3['file_name'];
            }

            if (!empty($_FILES['bus4']['name'])) {
                $gambar4 = $this->upload_foto('bus4');
                if(!isset($gambar1["pesan"])) 
                $data["gambar4"] = $gambar4['file_name'];
            }

            if (!empty($_FILES['bus5']['name'])) {
                $gambar5 = $this->upload_foto('bus5');
                if(!isset($gambar1["pesan"])) 
                $data["gambar5"] = $gambar5['file_name'];
            }

            if (!empty($_FILES['bus6']['name'])) {
                $gambar6 = $this->upload_foto('bus6');
                if(!isset($gambar1["pesan"])) 
                $data["gambar6"] = $gambar6['file_name'];
            }
            if(isset($data)){       
                $this->db->where("id_bus",$this->input->post('id_bus', TRUE))->update("foto_bus",$data);
            }

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/bus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bus_model->get_by_id($id);

        if ($row) {
            $this->Bus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/bus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/bus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_bus', 'jenis bus', 'trim|required');
	$this->form_validation->set_rules('fasilitas_bus', 'fasilitas bus', 'trim|required');
    $this->form_validation->set_rules('jumlah_tempatduduk', 'jumlah tempat duduk', 'trim|required');
    $this->form_validation->set_rules('jumlah_bus', 'jumlah bus', 'trim|required');
    
	$this->form_validation->set_rules('id_bus', 'id_bus', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}