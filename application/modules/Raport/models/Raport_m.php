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

 	/*public function tampilSiswaKelas($angkatan, $idKelas){
	 	$this->db->select('peserta_didik.*, detail_peserta_didik.idKelas');
	 	$this->db->from('peserta_didik');
	 	$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
	 	$this->db->where('idKelas', $idKelas);
	 	$this->db->where('tahun_angkatan', $angkatan);
	 	$query 		= $this->db->get();
	 	$execute 	= $query->result();
	 	return $execute;
 	}	*/


 	public function tampilSiswaKelas($masterLeger){
 		$this->db->distinct();
 		$this->db->select('DISTINCT(leger_nilai.NIK_pd), peserta_didik.nama_pd, 
 				peserta_didik.nipd, peserta_didik.nisn, peserta_didik.jk_pd');  
 		$this->db->from('leger_nilai');
 		$this->db->join('leger', 'leger_nilai.idLeger = leger.idLeger', 'left');
  		$this->db->join('peserta_didik', 'leger_nilai.NIK_pd = peserta_didik.NIK_pd', 'left');
 		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
 		$this->db->where('leger.idMaster_leger', $masterLeger);
 		$this->db->order_by('peserta_didik.nama_pd', 'asc');

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

 	public function sumNilaiPengetahuan($idMasterLeger, $NIK=NULL){
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

 	public function sumNilaiKelas($idMasterLeger){
 		$this->db->select_sum('nilai_pengetahuan');
 		$this->db->select_sum('nilai_keterampilan');
 		$this->db->from('leger');
 		$this->db->join('leger_nilai', 'leger.idLeger = leger_nilai.idLeger', 'left');
 		$this->db->where('leger.idMaster_leger', $idMasterLeger);
 		$this->db->group_by('NIK_pd');
 		$this->db->order_by('nilai_pengetahuan'.+.'nilai_keterampilan', 'desc');
 		$query = $this->db->get();
 		$execute = $query->result();
 		return $execute;
 	}

 	public function rankSystem($value, $arrayValue=NULL){
 		$query = $this->db->query("SELECT FIND_IN_SET($value, $arrayValue) AS rank");
 		$execute = $query->row();
 		return $execute;
 	}

 	public function nilaiPrilaku($idMasterLeger, $NIK_pd){
 		$this->db->select('nilai_sikap, nilai_sosial');
 		$this->db->from('leger_nilai');
 		$this->db->join('leger', 'leger.idLeger = leger_nilai.idLeger', 'left');
 		$this->db->where('leger.idMaster_leger', $idMasterLeger);
 		$this->db->where('leger_nilai.NIK_pd', $NIK_pd);
 		$query 		= $this->db->get();
 		$execute 	= $query->row();
 		return $execute;
 	}

 	public function deskripsiNilaiPrilaku($nilai, $jenisNilai){
 		$query = $this->db->get_where('deskripsi_nilai_prilaku', ['nilai_deskripsi' => $nilai, 'jenis_nilai_deskripsi' => $jenisNilai]);
 		$execute = $query->row();
 		return $execute;
 	}

 	public function rekapAbsen($NIK_pd, $semester){
 		$query = $this->db->get_where('rekap_absen_peserta_didik', ['NIK_pd' => $NIK_pd, 'semester' => $semester]);
 		$execute = $query->row();
 		return $execute;
 	}

 	public function updateRekapAbsen($data, $pk){
 		$this->db->select('*');
		$this->db->from('rekap_absen_peserta_didik');
		$this->db->where('idRekap_absen', $pk);
		$cekNilai = $this->db->get();
		$jmlCek = $cekNilai->num_rows();
		if($jmlCek == 0){
			$execute = $this->db->insert('rekap_absen_peserta_didik', $data);
		}else{
			$this->db->where('idRekap_absen', $pk);
			$execute = $this->db->update('rekap_absen_peserta_didik', $data);
		}
		return $execute;
 	}

}

/* End of file Raport_m.php */
/* Location: ./application/modules/Raport/models/Raport_m.php */