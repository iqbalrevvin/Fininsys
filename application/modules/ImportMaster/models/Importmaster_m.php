<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importmaster_m extends CI_Model {

	public function importDataUtama($data){
		$this->db->insert_batch('peserta_didik', $data);
	}

}

/* End of file importmaster_m.php */
/* Location: ./application/modules/ImportMaster/models/importmaster_m.php */