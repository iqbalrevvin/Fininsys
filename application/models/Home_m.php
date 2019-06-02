<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {

	public function jumlahSekolah(){
		$query = $this->db->get('sekolah');
		$execute = $query->num_rows();
		return $execute;		
	}

	public function jumlahProgramStudi(){
		$query = $this->db->get('program_studi');
		$execute = $query->num_rows();
		return $execute;		
	}	

	public function jumlahKelas(){
		$query = $this->db->get('kelas');
		$execute = $query->num_rows();
		return $execute;
	}

	public function jumlahPDFull(){
		$this->db->where('status_pd', 'Aktif');
		$query 		= $this->db->get('peserta_didik');
		$execute 	= $query->num_rows();
		return $execute;
	}

	public function jumlahPDMasukKelas(){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->where('status_pd', 'Aktif');
		$this->db->where('idKelas !=', NULL);
		$query 		= $this->db->get();
		$execute 	= $query->num_rows();
		return $execute;
	}

	public function jumlahPDnullKelas(){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->where('status_pd', 'Aktif');
		$this->db->where('idKelas', NULL);
		$query 		= $this->db->get();
		$execute 	= $query->num_rows();
		return $execute;
	}

	public function jumlahTenpen(){
		$query 		= $this->db->get('tenaga_pendidik');
		$execute 	= $query->num_rows();
		return $execute;
	}

	public function listKelas(){
		$query 		= $this->db->get('kelas');
		$execute 	= $query->result();
		return $execute;
	}

	public function jumlahKelasPD($idKelas){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->where('detail_peserta_didik.idKelas', $idKelas);
		$this->db->where('status_pd', 'Aktif');
		$query 		= $this->db->get();
		$execute 	= $query->num_rows();
		return $execute;
	}

	public function listProdi(){
		$query 		= $this->db->get('program_studi');
		$execute 	= $query->result();
		return $execute;
	}

	public function jumlahProdiPD($idProdi){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->join('kelas', 'detail_peserta_didik.idKelas = kelas.idKelas', 'left');
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		$this->db->where('kelas.idProdi', $idProdi);
		$this->db->where('status_pd', 'Aktif');
		$query 		= $this->db->get();
		$execute 	= $query->num_rows();
		return $execute;
	}

}

/* End of file Home_m.php */
/* Location: ./application/models/Home_m.php */