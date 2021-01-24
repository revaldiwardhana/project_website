<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
    }

    function index()
    {
		
      if($this->session->user_login == true){
        redirect('beranda');
      }else{
            if($this->input->post('username',true) != null && $this->input->post('password',true) != null){
                $username = $this->input->post('username',true);
                $password = $this->input->post('password',true);
                $login = $this->login_model->login($username, $password);
                if($login->num_rows() > 0){
                    $data = $login->row();
                    $data_session = [
                      'user_nama_lengkap' => $data->nama_lengkap,
                      'user_alamat'       => $data->alamat,
                      'user_no_telp'      => $data->no_telp,
                      'user_username'     => $data->username,
                      'user_level'        => $data->level_user,
                      'user_id'           => $data->id_user,
                      'user_login'        => true,
                    ];

                  $this->session->set_userdata($data_session);
                  if($data->level_user == 'penyewa'){

                    $goto_url = $this->input->post('goto_url');
                    if($goto_url !== '') redirect($goto_url);
                    else redirect('penyewa/melihat_bus');

                  }else
                  if($data->level_user == 'pemilik'){

                    $goto_url = $this->input->post('goto_url');
                    if($goto_url !== '') redirect($goto_url);
                    else redirect('admin/pemesanan');


                  }else
                  if($data->level_user == 'supir'){

                    $goto_url = $this->input->post('goto_url');
                    if($goto_url !== '') redirect($goto_url);
                    else redirect('supir/surat_tugas');


                  }else{
                    redirect('beranda');
                  }

                }else{
                  $this->load->view('login');      
                }
            }else{
                $this->load->view('login');                
            }

      }
    }

    function logout(){
    	
      $this->session->sess_destroy();
      unset($_SESSION['user_login']);
      redirect('dashboard','refresh');

    } 

    function register(){
      $this->load->view('register_penyewa');
    }

    function register_act(){
      $data = [
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'alamat' => $this->input->post('alamat'),
        'no_telp' => $this->input->post('no_telp'),
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'level_user' =>'penyewa',
      ];

      $this->db->insert('user',$data);
      if(null != $this->input->post('goto_url')) $this->session->set_flashdata('goto_url',$this->input->post('goto_url'));
      redirect('login','refresh');
    }
 }  

?>