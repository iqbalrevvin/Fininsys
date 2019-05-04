<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LegerNilai_m extends CI_Model {

	public function insertMasterLeger($data){
		$idKelas 		= $data['idKelas'];
		$tahunAngkatan 	= $data['tahun_angkatan'];
		$semester 		= $data['semester'];
		$this->db->select('idKelas, tahun_angkatan, semester');
		$this->db->from('master_leger');
		$this->db->where('idKelas', $idKelas);
		$this->db->where('tahun_angkatan', $tahunAngkatan);
		$this->db->where('semester', $semester);
		$qrCek = $this->db->get();
		$exeCek = $qrCek->num_rows();
		if($exeCek == 0){
			$this->db->insert('master_leger', $data);
		}else{
			$this->db->insert('', $data);
		}
	}

	public function updateMasterLeger($data, $id){
		$idKelas 		= $data['idKelas'];
		$tahunAngkatan 	= $data['tahun_angkatan'];
		$semester 		= $data['semester'];
		$this->db->select('idKelas, tahun_angkatan, semester');
		$this->db->from('master_leger');
		$this->db->where('idKelas', $idKelas);
		$this->db->where('tahun_angkatan', $tahunAngkatan);
		$this->db->where('semester', $semester);
		$qrCek = $this->db->get();
		$exeCek = $qrCek->num_rows();
		if($exeCek == 0){
			$this->db->where('idMaster_leger', $id);
			$this->db->update('master_leger', $data);
		}else{
			$this->db->update('', $data);
		}
	}
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
		$this->db->order_by('nama_mata_pelajaran', 'asc');
		$query 		= $this->db->get();
		$execute 	= $query->result();
		return $execute;
	}

	public function getTenpen(){
		$this->db->select('NIK_tenpen, nama_tenpen, nama_sekolah');
		$this->db->from('tenaga_pendidik');
		$this->db->join('sekolah', 'tenaga_pendidik.idSekolah = sekolah.idSekolah', 'left');
		$this->db->order_by('tenaga_pendidik.nama_tenpen', 'asc');
		$query = $this->db->get();
		return $query->result();
		
	}

	public function cekMapelNilaiKelas($data){
		$this->db->select('idMaster_leger, idMata_pelajaran');
		$this->db->from('leger');
		$this->db->where('idMaster_leger', $data['idMaster_leger']);
		$this->db->where('idMata_pelajaran', $data['idMata_pelajaran']);
		$query = $this->db->get();
		$execute = $query->num_rows();
		return $execute;
	}

	public function addMapelLeger($data){
		$this->db->insert('leger', $data);
	}

	public function getKontenMapel($idMasterLeger){
		$this->db->select('*');
		$this->db->from('leger');
		$this->db->join('master_leger', 'leger.idMaster_leger = master_leger.idMaster_leger', 'left');
		$this->db->join('mata_pelajaran', 'leger.idMata_pelajaran = mata_pelajaran.idMata_pelajaran', 'left');
		$this->db->join('tenaga_pendidik', 'leger.NIK_tenpen = tenaga_pendidik.NIK_tenpen', 'left');
		$this->db->where('leger.idMaster_leger', $idMasterLeger);
		$this->db->order_by('leger.no_urut_mapel', 'asc');
		$query = $this->db->get();
		$execute = $query->result();
		return $execute;
	}

	public function hapusKontenMapel($idLeger){
		$this->db->where('idLeger', $idLeger);
		$this->db->delete('leger');
	}

	public function getlistPD($idKelas){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->where('detail_peserta_didik.idKelas', $idKelas);
		$query 		= $this->db->get();
		$execute 	= $query->result();
		return $execute;
	}
	public function getNilaiPD($NIK, $idLeger){
		$this->db->select('*');
		$this->db->from('leger_nilai');
		$this->db->where('NIK_pd', $NIK);
		$this->db->where('idLeger', $idLeger);
		$execute = $this->db->get();
		return $execute;
	}

}

/* End of file LegerNilai_m.php */
/* Location: ./application/modules/LegerNilai/models/LegerNilai_m.php */