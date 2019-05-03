<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LegerNilai_m extends CI_Model {

	public function getKelas(){
		$this->db->select('kelas.*,tenaga_pendidik.NIK_tenpen, tenaga_pendidik.nama_tenpen, 
							program_studi.idProdi, program_studi.nama_prodi,
							sekolah.idSekolah, sekolah.nama_sekolah
						');
		$this->db->from('kelas');
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		$this->db->join('sekolah', 'program_studi.idSekolah = sekolah.idSekolah', 'left');
		$this->db->join('tenaga_pendidik', 'kelas.NIK_tenpen = tenaga_pendidik.NIK_tenpen', 'left');
		$query = $this->db->get();
		return $query;		
	}	

	public function getTahunAjaran(){
		$query = $this->db->get('tahun_ajaran');
		return $query;
	}

	public function detailLeger($idMasterLeger){
		$this->db->select('*');
		$this->db->from('master_leger');
		$this->db->join('leger', 'master_leger.idMaster_leger = leger.idMaster_leger', 'left');
		$this->db->join('leger_nilai', 'leger.idLeger = leger_nilai.idLeger', 'left');
		$this->db->where('master_leger.idMaster_leger', $idMasterLeger);
		$query 		= $this->db->get();
		$execute 	= $query->row();
		return $execute;
	}

	public function getMapel(){
		$this->db->select('*');
		$this->db->from('mata_pelajaran');
		$this->db->join('kelompok_mapel', 'mata_pelajaran.idKelompok_mapel = kelompok_mapel.idKelompok_mapel', 'left');
		$query 		= $this->db->get();
		$execute 	= $query->result();
		return $execute;
	}

}

/* End of file LegerNilai_m.php */
/* Location: ./application/modules/LegerNilai/models/LegerNilai_m.php */