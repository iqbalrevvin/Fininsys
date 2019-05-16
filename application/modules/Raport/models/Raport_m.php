<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_m extends CI_Model {

	public function listSemester(){
		$this->db->distinct();
		$this->db->select('semester');
		$query 		= $this->db->get('master_leger');
		$execute 	= $query->result();
		return $execute;
	}

 	public function tampilSiswaKelas($idKelas){
	 	$this->db->select('peserta_didik.*, detail_peserta_didik.idKelas');
	 	$this->db->from('peserta_didik');
	 	$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
	 	$this->db->where('idKelas', $idKelas);
	 	$query 		= $this->db->get();
	 	$execute 	= $query->result();
	 	return $execute;
 	}	

}

/* End of file Raport_m.php */
/* Location: ./application/modules/Raport/models/Raport_m.php */