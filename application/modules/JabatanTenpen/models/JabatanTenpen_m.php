<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanTenpen_m extends CI_Model {

	public function getJabatan(){
		$query = $this->db->get('jabatan');	
		return $query;
	}	

}

/* End of file JabatanTenpen_m.php */
/* Location: ./application/modules/JabatanTenpen/models/JabatanTenpen_m.php */