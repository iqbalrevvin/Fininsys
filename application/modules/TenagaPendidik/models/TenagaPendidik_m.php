<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TenagaPendidik_m extends CI_Model {

	public function insertDetail($data){
		$this->db->insert('detail_tenaga_pendidik', $data);
		$this->db->insert('ortu_tenaga_pendidik', $data);
	}

}

/* End of file TenagaPendidik_m.php */
/* Location: ./application/modules/TenagaPendidik/models/TenagaPendidik_m.php */