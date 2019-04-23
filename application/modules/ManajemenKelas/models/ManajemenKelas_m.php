<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenKelas_m extends CI_Model {

	public function listing(){
		$this->db->select('*');
		$this->db->from('kelas');
		/*RELASI*/
		/*---------*/
		$this->db->order_by('nama_kelas', 'desc');
		$query = $this->db->get();
		$execute = $query->result();

		return $execute;
	}

	function kelas(){
		$this->db->select('*');
		$this->db->from('kelas');
		/*RELASI*/
		/*---------*/
		$this->db->order_by('nama_kelas', 'desc');
		$query = $this->db->get();
		$execute = $query->row();

		return $execute;
	}

	public function getPesdik($idKelas){
		$this->db->select('*');
		$this->db->from('detail_peserta_didik');
		$this->db->where('idKelas', $idKelas);
		/*RELASI*/
		/*---------*/
		$this->db->order_by('NIK_pd', 'desc');
		$query = $this->db->get();
		$execute = $query->result();

		return $execute;
	}
	

}

/* End of file ManajemenKelas_m.php */
/* Location: ./application/modules/ManajemenKelas/models/ManajemenKelas_m.php */