<?php
class m_data_web extends CI_Model{

 	
	function getProfilApp()
	{
		return $this->db->get('tbl_profil');
	}
	
	
}