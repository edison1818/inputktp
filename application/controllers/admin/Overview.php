<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Overview extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
		$this->load->model('m_data');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
		$this->load->library('form_validation');
        $this->load->library('user_agent');
    }


	public function index()
	{
		if($this->m_login->logged_id())
        {
            $data['profil']=$this->m_data->getProfilApp();
            $this->load->view('admin/overview', $data);
        } else {
            redirect("login");
        } 	
	}

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }  
}
