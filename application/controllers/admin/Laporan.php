<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_data');
        $this->load->model('m_data_ktp');
        $this->load->model('m_data_ktp','_tbl_data_ktp');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
    }

function DataKTP()
{
    if($this->m_login->logged_id())
    {
        $data['profil']=$this->m_data->getProfilApp();
        $data['datauser'] = $this->m_data->getDataUserJoin(); 
        $data['level_user'] = $this->m_data->getLevel();
        $this->load->view('admin/data_ktp_lap',$data);
    }else{
        redirect("login");
    }
} 

public function ajax_data_ktp()
{
    $list = $this->_tbl_data_ktp->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $data_ktp) {
        $no++;
        $row = array();
        $row[] = "<div class='text-center'>".$no."";
        $row[] = $data_ktp->nik;
        $row[] = $data_ktp->nama;
        $row[] = "".$data_ktp->tempat_lahir." / ".$data_ktp->tgl_lahir."";
        $row[] = $data_ktp->jenis_kelamin;
        $row[] = $data_ktp->agama;
        $row[] = $data_ktp->status_perkawinan;
        $row[] = $data_ktp->pekerjaan;
        $row[] = "".$data_ktp->alamat."
        <br> Prov : ".$data_ktp->nama_provinsi."
        <br> Kab/Kota : ".$data_ktp->nama_kab."
        <br> Kec : ".$data_ktp->nama_kec."
        <br> Kel : ".$data_ktp->nama_kel."";
        $row[] = $data_ktp->nama_user;

        $data[] = $row;
    }
    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->_tbl_data_ktp->count_all(),
        "recordsFiltered" => $this->_tbl_data_ktp->count_filtered(),
        "data" => $data,
    );
    echo json_encode($output);
}

}
