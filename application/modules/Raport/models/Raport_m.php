<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_m extends CI_Model {

	public function listAngkatan($idKelas){
		$this->db->distinct();
		$this->db->select('tahun_angkatan');
		$this->db->where('idKelas', $idKelas);
		$query 		= $this->db->get('master_leger');
		$execute 	= $query->result();
		return $execute;
	}

	public function listSemester($idKelas,$angkatan){
		$this->db->distinct();
		$this->db->select('semester');
		$this->db->where('idKelas', $idKelas);
		$this->db->where('tahun_angkatan', $angkatan);
		$query 		= $this->db->get('master_leger');
		$execute 	= $query->result();
		return $execute;
	}

 	public function tampilSiswaKelas($angkatan, $idKelas){
	 	$this->db->select('peserta_didik.*, detail_peserta_didik.idKelas');
	 	$this->db->from('peserta_didik');
	 	$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
	 	$this->db->where('idKelas', $idKelas);
	 	$this->db->where('tahun_angkatan', $angkatan);
	 	$query 		= $this->db->get();
	 	$execute 	= $query->result();
	 	return $execute;
 	}	

 	public function identiMasterLeger($idKelas, $angkatan, $semester){
 		$this->db->select('*');
 		$this->db->from('master_leger');
 		$this->db->where('idKelas', $idKelas);
 		$this->db->where('tahun_angkatan', $angkatan);
 		$this->db->where('semester', $semester);
 		$masterLeger = $this->db->get();
 		$exeMasterLeger = $masterLeger->row();
 		$idMasterLeger = $exeMasterLeger->idMaster_leger;
 		return $idMasterLeger;
 	}

 	public function countMapel($idMasterLeger, $NIK){
 		$this->db->select('*');
 		$this->db->from('leger');
 		$this->db->join('leger_nilai', 'leger.idLeger = leger_nilai.idLeger', 'left');
 		$this->db->where('leger.idMaster_leger', $idMasterLeger);
 		$this->db->where('leger_nilai.NIK_pd', $NIK);
 		$query = $this->db->get();
 		$execute = $query->num_rows();
 		return $execute;
 	}

 	public function sumNilaiPengetahuan($idMasterLeger, $NIK){
 		$this->db->select_sum('nilai_pengetahuan');
 		$this->db->from('leger');
 		$this->db->join('leger_nilai', 'leger.idLeger = leger_nilai.idLeger', 'left');
 		$this->db->where('leger.idMaster_leger', $idMasterLeger);
 		$this->db->where('leger_nilai.NIK_pd', $NIK);
 		$query = $this->db->get();
 		$execute = $query->row();
 		return $execute;
 	}
 	public function sumNilaiKeterampilan($idMasterLeger, $NIK){
 		$this->db->select_sum('nilai_keterampilan');
 		$this->db->from('leger');
 		$this->db->join('leger_nilai', 'leger.idLeger = leger_nilai.idLeger', 'left');
 		$this->db->where('leger.idMaster_leger', $idMasterLeger);
 		$this->db->where('leger_nilai.NIK_pd', $NIK);
 		$query = $this->db->get();
 		$execute = $query->row();
 		return $execute;
 	}

}

/* End of file Raport_m.php */
/* Location: ./application/modules/Raport/models/Raport_m.php */