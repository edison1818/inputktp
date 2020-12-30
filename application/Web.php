<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Web extends CI_Controller {
	
 public function __construct()
    {
        parent::__construct();
        //load model Web
		$this->load->model('m_data_web');
		$this->load->model('m_data');
		$this->load->helper('url');
        $this->load->library('form_validation');
       
	}
	
public function index()
	{
		$data['profil']=$this->m_data->getProfilApp();
		$this->load->view('web/home', $data);
	}

public function register()
	{
		$data['profil']=$this->m_data->getProfilApp();
		$this->load->view('register', $data);
	}	

function PostRegister(){
    $this->form_validation->set_rules('username','Email','required');
    $this->form_validation->set_rules('password','Pass','required');

    if($this->form_validation->run() != false) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $status_user = $this->input->post('status_user');
            $status_user = '1';
            $id_level_user = $this->input->post('id_level_user');
            $id_level_user = '2';
            $nama_user = $this->input->post('nama_user');
            $nama_user = 'Online Reg';
            //Cek Email
            $sql = $this->db->query("SELECT username FROM tbl_user where username = '$username'");
            $cek_user = $sql->num_rows();
            if ($cek_user > 0) 
            {
                $response = array(
                    'status' => 'gagaldouble'
                );
                echo json_encode($response);
            } else {
                $pengacak       = "AJWKXLAJSCLWLW";
                $password = md5($pengacak . md5($password) . $pengacak );

                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'status_user' => $status_user,
                    'nama_user' => $nama_user,
                    'id_level_user' => $id_level_user
                );
                //Response
                $this->m_data->input_data($data,'tbl_user');
                $response = array(
                    'status' => 'successinput'
                );
                echo json_encode($response);
            }
        } else {
            $response = array(
                'status' => 'gagalinput'
            );
            echo json_encode($response);
        }
    
}

}
