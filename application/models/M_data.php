<?php
class m_data extends CI_Model{
 
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }
 
    function jumlah_data($table){
        return $this->db->get($table)->num_rows();
    }
 
    function tampil_data($table, $number,$offset){
        return $this->db->get($table,$number,$offset)->result();
    }
 	
 	function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

 
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}


function get_Provinsi() {
    $this->db->select('*');
    $this->db->from('_tbl_provinsi');
    $query = $this->db->get();
    return $query->result();
  }

function getDataKabupaten($id_prov)
{
      $this->db->select('*');
      $this->db->from('_tbl_kabupaten');
      $this->db->where('id_prov', $id_prov);
      $query = $this->db->get();
      return $query->result();
    }

function getDataKecamatan($id_kab)
{
      $this->db->select('*');
      $this->db->from('_tbl_kecamatan');
      $this->db->where('id_kab', $id_kab);
      $query = $this->db->get();
      return $query->result();
    }    

function getDataKelurahan($id_kec)
{
      $this->db->select('*');
      $this->db->from('_tbl_kelurahan');
      $this->db->where('id_kec', $id_kec);
      $query = $this->db->get();
      return $query->result();
    }

function getAgama(){
	  $this->db->select('*');
	  $this->db->from('_tbl_agama');
	  $query = $this->db->get();
      return $query->result();
  }

function getStatusKawin(){
	  $this->db->select('*');
	  $this->db->from('_tbl_status_perkawinan');
	  $query = $this->db->get();
      return $query->result();
  }  	         	
	function getLevel(){
	  $this->db->select('*');
	  $this->db->from('tbl_level_user');
	  $this->db->where('diakses_oleh', $this->session->userdata('level'));
      $query = $this->db->get();
      return $query->result();
  }
	
	
	function getProfilApp()
	{
		return $this->db->get('tbl_profil');
	}

	

function getDataUserLogin()
	{
	  $this->db->select('*');
	  $this->db->from('tbl_user');
	  $this->db->join('tbl_level_user', 'tbl_level_user.id_level_user = tbl_user.id_level_user');
	  $this->db->where('tbl_user.user_post', $this->session->userdata('user_id'));
	  $query = $this->db->get();
      return $query->result();
  }	

function getDataUserJoin()
	{
	  $this->db->select('*');
	  $this->db->from('tbl_user');
	  $this->db->join('tbl_level_user', 'tbl_level_user.id_level_user = tbl_user.id_level_user');
	  if($this->session->userdata('level') == 1)
	  //Jika level Master, tampilkan seluruh user yang telah di Input
	  {
	  	$this->db->where('tbl_user.user_post', $this->session->userdata('user_id'));
	  } else { 
	  
	  }
	  $query = $this->db->get();
      return $query->result();
	}

						
}