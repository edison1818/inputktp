<?php
class m_data_ktp extends CI_Model {
 

	var $table = '_tbl_data_ktp';
	var $column_order = array(null, 'nik', 'nama', 'jenis_kelamin');
	var $column_search = array('nik', 'nama', 'jenis_kelamin'); 
	var $order = array('id_data' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$this->db->join('_tbl_provinsi', '_tbl_provinsi.id_prov = _tbl_data_ktp.id_prov');
		$this->db->join('_tbl_kabupaten', '_tbl_kabupaten.id_kab = _tbl_data_ktp.id_kab');
		$this->db->join('_tbl_kecamatan', '_tbl_kecamatan.id_kec = _tbl_data_ktp.id_kec');
		$this->db->join('_tbl_kelurahan', '_tbl_kelurahan.id_kel = _tbl_data_ktp.id_kel');
		$this->db->join('_tbl_agama', '_tbl_agama.id_agama = _tbl_data_ktp.id_agama');
		$this->db->join('_tbl_status_perkawinan', '_tbl_status_perkawinan.id_status_perkawinan = _tbl_data_ktp.id_status_perkawinan');
		$this->db->join('tbl_user', 'tbl_user.id_user = _tbl_data_ktp.id_user_post');

		if($this->session->userdata('level') == 1)
		{
			//Tampilkan semua data dari semua instansi
		} else {
			$this->db->where('_tbl_data_ktp.id_user_post', $this->session->userdata('user_id'));
		}

		$i = 0;
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) 
			{
				if($i===0) 
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i)
				$this->db->group_end();
		}
		$i++;
	}
	if(isset($_POST['order'])) 
	{
		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}
}

function get_datatables()
{
	$this->_get_datatables_query();
	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
	$query = $this->db->get();
	return $query->result();
}

function count_filtered()
{
	$this->_get_datatables_query();
	$query = $this->db->get();
	return $query->num_rows();
}
public function count_all()
{
	$this->db->from($this->table);
	return $this->db->count_all_results();
}

function get_data_ktp($url){
		
		$this->db->select('*');
		$this->db->from('_tbl_data_ktp');
		$this->db->join('_tbl_provinsi', '_tbl_provinsi.id_prov = _tbl_data_ktp.id_prov');
		$this->db->join('_tbl_kabupaten', '_tbl_kabupaten.id_kab = _tbl_data_ktp.id_kab');
		$this->db->join('_tbl_kecamatan', '_tbl_kecamatan.id_kec = _tbl_data_ktp.id_kec');
		$this->db->join('_tbl_kelurahan', '_tbl_kelurahan.id_kel = _tbl_data_ktp.id_kel');
		$this->db->join('_tbl_agama', '_tbl_agama.id_agama = _tbl_data_ktp.id_agama');
		$this->db->join('_tbl_status_perkawinan', '_tbl_status_perkawinan.id_status_perkawinan = _tbl_data_ktp.id_status_perkawinan');
		$this->db->where('_tbl_data_ktp.url', $url);
		$query = $this->db->get();
		return $query;	
		
	}

function get_data_ktp_delete($id_data) {
	return $this->db->select('*')
	                ->from('_tbl_data_ktp')
	                ->where(['id_data'=>$id_data])
				    ->get()
				    ->row();
				}	
}