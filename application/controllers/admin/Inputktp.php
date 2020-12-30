<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Inputktp extends CI_Controller {

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

    
    function InputKTP()
    {
        if($this->m_login->logged_id())
        {           
            $data['profil']=$this->m_data->getProfilApp();
            $data['datauser'] = $this->m_data->getDataUserJoin(); 
            $data['level_user'] = $this->m_data->getLevel(); 
            $data['provinsi']=$this->m_data->get_Provinsi(); 
            $data['agama'] = $this->m_data->getAgama();
            $data['status'] = $this->m_data->getStatusKawin();
            $this->load->view('admin/input_ktp',$data);
            
        } else {
            redirect("login");
        }
    }

function get_Kabupaten(){
        $id_prov=$this->input->post('id_prov');
        $data=$this->m_data->getDataKabupaten($id_prov);
        echo json_encode($data);
    }

function get_Kecamatan(){
        $id_kab=$this->input->post('id_kab');
        $data=$this->m_data->getDataKecamatan($id_kab);
        echo json_encode($data);
    } 

function get_Kelurahan(){
        $id_kec=$this->input->post('id_kec');
        $data=$this->m_data->getDataKelurahan($id_kec);
        echo json_encode($data);
    }        

function PostDataKTP(){
    if($this->m_login->logged_id())
    {
        $this->form_validation->set_rules('id_prov','Provinsi','required');
        if($this->form_validation->run() != false) {
            $id_prov = $this->input->post('id_prov');
            $id_kab = $this->input->post('id_kab');
            $id_kec = $this->input->post('id_kec');
            $id_kel = $this->input->post('id_kel');
            $alamat = $this->input->post('alamat');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $id_agama = $this->input->post('id_agama');
            $id_status_perkawinan = $this->input->post('id_status_perkawinan');
            $pekerjaan = $this->input->post('pekerjaan');
            $url = $this->input->post('url');
            $id_user_post = $this->session->userdata('user_id');

            //Cek NIK
            $sql = $this->db->query("SELECT nik FROM _tbl_data_ktp where nik = '$nik'");
            $cek_nik = $sql->num_rows();
            if ($cek_nik > 0) 
            {
                $response = array(
                    'status' => 'gagaldouble'
                );
                echo json_encode($response);
            } else {

                $pengacak       = "AJWKXLAJSCLWLW";
                $url = md5($pengacak . md5($nik) . $pengacak );

                $data = array(
                    'id_prov' => $id_prov,
                    'id_kab' => $id_kab,
                    'id_kec' => $id_kec,
                    'id_kel' => $id_kel,
                    'alamat' => $alamat,
                    'nik' => $nik,
                    'nama' => $nama,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_agama' => $id_agama,
                    'id_status_perkawinan' => $id_status_perkawinan,
                    'pekerjaan' => $pekerjaan,
                    'id_user_post' => $id_user_post,
                    'url' => $url
                );
                //Response
                $this->m_data->input_data($data,'_tbl_data_ktp');
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
    }else{
        redirect("login");
    }
}

function DataKTP()
{
    if($this->m_login->logged_id())
    {
        $data['profil']=$this->m_data->getProfilApp();
        $data['datauser'] = $this->m_data->getDataUserJoin(); 
        $data['level_user'] = $this->m_data->getLevel();
        $this->load->view('admin/data_ktp',$data);
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
        $row[] = $no;
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
        
        $row[] = "<div class='text-center'>
                    <a href='".base_url('admin/Inputktp/EditData/'.$data_ktp->url.'')."'><button class='btn btn-info btn-sm' title='Edit'><i class='fa fa-edit'> </i> Edit</button></a>
                    <button class='btn btn-warning btn-sm' onclick=btndeletedataktp(".$data_ktp->id_data.") title='delete'><i class='fa fa-trash'> </i> Hapus</button>
                  </div>";
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

function EditData($url){
        if($this->m_login->logged_id())
        {
            $url=$this->uri->segment(4);
            $data['data_ktp']=$this->m_data_ktp->get_data_ktp($url);

            $data['profil']=$this->m_data->getProfilApp();
            $data['datauser'] = $this->m_data->getDataUserJoin(); 
            $data['level_user'] = $this->m_data->getLevel();
            $data['provinsi']=$this->m_data->get_Provinsi(); 
            $data['agama'] = $this->m_data->getAgama();
            $data['status'] = $this->m_data->getStatusKawin();
            $this->load->view('admin/edit_ktp',$data);
        }else{
            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");
        }
    }

function update_data_ktp(){
    if($this->m_login->logged_id())
    {
        $this->form_validation->set_rules('nik','NIK','required');
        if ($this->form_validation->run() == TRUE) {
            $id_data = $this->input->post('id_data');
            $id_prov = $this->input->post('id_prov');
            $id_kab = $this->input->post('id_kab');
            $id_kec = $this->input->post('id_kec');
            $id_kel = $this->input->post('id_kel');
            $alamat = $this->input->post('alamat');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $id_agama = $this->input->post('id_agama');
            $id_status_perkawinan = $this->input->post('id_status_perkawinan');
            $pekerjaan = $this->input->post('pekerjaan');
            $id_user_post = $this->session->userdata('user_id');

            //Cek NIK
            $sql = $this->db->query("SELECT nik FROM _tbl_data_ktp where nik = '$nik' AND id_data != $id_data");
            $cek_nik = $sql->num_rows();
            if ($cek_nik > 0) 
            {
                $response = array(
                    'status' => 'gagaldouble'
                );
                echo json_encode($response);
            } else {

                $pengacak       = "AJWKXLAJSCLWLW";
                $url = md5($pengacak . md5($nik) . $pengacak );

                $data = array(
                    'id_prov' => $id_prov,
                    'id_kab' => $id_kab,
                    'id_kec' => $id_kec,
                    'id_kel' => $id_kel,
                    'alamat' => $alamat,
                    'nik' => $nik,
                    'nama' => $nama,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_agama' => $id_agama,
                    'id_status_perkawinan' => $id_status_perkawinan,
                    'pekerjaan' => $pekerjaan,
                    'id_user_post' => $id_user_post
                );
                $where = array(
                    'id_data' => $id_data
                );
                $this->m_data->update_data($where,$data,'_tbl_data_ktp');
                $response = array(
                    'status' => 'successupdate'
                );
                echo json_encode($response);
            }
        }
    }else{
    }
} 

function get_data_ktp() {
    if($this->m_login->logged_id())
    {
        $id_data = $this->input->get('id_data');
        $get_data = $this->m_data_ktp->get_data_ktp_delete($id_data);
            echo json_encode($get_data); 
            exit();
        }else{
            redirect("login");
        }
    } 

function delete_data_ktp(){
    if($this->m_login->logged_id())
    {
        $this->form_validation->set_rules('id_data','ID','required');

        if($this->form_validation->run() != false) {
            $id_data = $this->input->post('id_data');
            $where = array(
                'id_data' => $id_data
            );
            $this->m_data->hapus_data($where,'_tbl_data_ktp');
            $response = array(
                'status' => 'successdelete'
            );
            echo json_encode($response);
        }
    } else {
        redirect("login");
    }
}



function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }  
}
