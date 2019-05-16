<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListData_m extends CI_Model {

	public function listSekolah(){
		$query = $this->db->get('sekolah');
		$execute = $query->result();
		return $execute;
	}

	public function listKelas(){
		$query = $this->db->get('kelas');
		$execute = $query->result();
		return $execute;
	}

	public function listKelasFromSekolah($idSekolah){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		$this->db->join('sekolah', 'program_studi.idSekolah = sekolah.idSekolah', 'left');
		$this->db->where('sekolah.idSekolah', $idSekolah);
		$this->db->order_by('kelas.nama_kelas', 'asc');
		$query 		= $this->db->get();
		$execute 	= $query->result();
		return $execute;
	}
	

}

/* End of file ListData_m.php */
/* Location: ./application/models/ListData_m.php */