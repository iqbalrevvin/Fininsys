<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenKelas_m extends CI_Model {

	public function getNamaKelas($idKelas){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('idKelas', $idKelas);

		$query = $this->db->get();
		$execute = $query->row();

		return $execute;
	}

	public function listing(){
		$this->db->select('*');
		$this->db->from('kelas');
		/*RELASI*/
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		$this->db->join('sekolah', 'program_studi.idSekolah = sekolah.idSekolah', 'left');
		/*---------*/
		$this->db->order_by('sekolah.nama_sekolah desc, kelas.nama_kelas desc');
		$query = $this->db->get();
		$execute = $query->result();

		return $execute;
	}

	public function getPesdik($idKelas){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->where('detail_peserta_didik.idKelas', $idKelas);
		$this->db->where('detail_peserta_didik.status_pd', 'Aktif');
		/*RELASI*/
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->join('kelas', 'detail_peserta_didik.idKelas = kelas.idKelas', 'left');
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		/*---------*/
		$this->db->order_by('peserta_didik.NIK_pd', 'desc');
		$query = $this->db->get();
		$execute = $query->result();

		return $execute;
	}

	public function getKeluarKelas($data){
		$this->db->where('NIK_pd', $data['NIK_pd']);
		$this->db->update('detail_peserta_didik', $data);
	}
	

}

/* End of file ManajemenKelas_m.php */
/* Location: ./application/modules/ManajemenKelas/models/ManajemenKelas_m.php */