<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetData_m extends CI_Model {

	public function getDataKelas($idKelas){
		$query 		= $this->db->get_where('kelas', ['idKelas' => $idKelas]);
		$execute 	= $query->row();
		return $execute;
	}

}

/* End of file GetData.php */
/* Location: ./application/models/GetData.php */