<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legernilai_m extends CI_Model {

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
		$this->db->join('kelas', 'master_leger.idKelas = kelas.idKelas', 'left');
		$this->db->where('master_leger.idMaster_leger', $idMasterLeger);
		$query 		= $this->db->get();
		$execute 	= $query->row();
		return $execute;
	}

	public function getMapel(){
		$this->db->select('*');
		$this->db->from('mata_pelajaran');
		$this->db->join('kelompok_mapel', 'mata_pelajaran.idKelompok_mapel = kelompok_mapel.idKelompok_mapel', 'left');
		$this->db->join('kurikulum', 'mata_pelajaran.idKurikulum = kurikulum.idKurikulum', 'left');
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
	
	public function editMapelLeger($idLeger, $data){
		$this->db->where('idLeger', $idLeger);
		$this->db->update('leger', $data);
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

	public function getlistPD($idKelas, $angkatan){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->join('kelas', 'detail_peserta_didik.idKelas = kelas.idKelas', 'left');
		$this->db->where('peserta_didik.tahun_angkatan', $angkatan);
		$this->db->where('detail_peserta_didik.idKelas', $idKelas);
		$this->db->where('peserta_didik.status_pd', 'Aktif');
		$query 		= $this->db->get();
		$execute 	= $query->result();
		return $execute;
	}
	public function getListNilaiPD($idLeger){
		$this->db->select('leger_nilai.*,peserta_didik.NIK_pd, peserta_didik.nama_pd, peserta_didik.nipd');
		$this->db->from('leger_nilai');
		$this->db->join('peserta_didik', 'leger_nilai.NIK_pd = peserta_didik.NIK_pd', 'left');
		$this->db->where('leger_nilai.idLeger', $idLeger);
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

	public function cekDataNilai(){
		$this->db->select('idLeger_nilai, NIK_pd');
		$this->db->from('leger_nilai');
		$this->db->where('idLeger_nilai', $pk);
		$cekData = $this->db->get();
		$jmlCek = $cekData->num_rows();
		return $jmlCek;
	}

	public function dataSemester($idMasterLeger){
		$query 		= $this->db->get_where('master_leger', ['idMaster_leger' => $idMasterLeger]);
		$execute 	= $query->row()->semester;
		return $execute;
	}

	public function inputAbsen($dataAbsen){
		$this->db->select('*');
		$this->db->from('rekap_absen_peserta_didik');
		$this->db->where('NIK_pd', $dataAbsen['NIK_pd']);
		$this->db->where('semester', $dataAbsen['semester']);
		$query 		= $this->db->get();
		$cekData 	= $query->num_rows();
		if($cekData == 0){
			$execute = $this->db->insert('rekap_absen_peserta_didik', $dataAbsen);
		}else{
			$execute = '';
		}
		return $execute;

	}

	public function tambahNilaiSiswa($data){
		$this->db->select('*');
		$this->db->from('leger_nilai');
		$this->db->where('idLeger', $data['idLeger']);
		$this->db->where('NIK_pd', $data['NIK_pd']);
		$query = $this->db->get();
		$cekData = $query->num_rows();
		if($cekData == 0){
			$execute = $this->db->insert('leger_nilai', $data);
		}else{
			$execute = '';
		}
		return $execute;
	}
	
	public function simpanNilai($data, $pk){
		$this->db->select('*');
		$this->db->from('leger_nilai');
		$this->db->where('idLeger_nilai', $pk);
		$cekNilai = $this->db->get();
		$jmlCek = $cekNilai->num_rows();
		if($jmlCek == 0){
			$execute = $this->db->insert('leger_nilai', $data);
		}else{
			$this->db->where('idLeger_nilai', $pk);
			$execute = $this->db->update('leger_nilai', $data);
		}
		return $execute;
	}

	public function simpanNilai2($id,$idLeger,$nik,$value,$modul){
		$this->db->select('*');
		$this->db->from('leger_nilai');
		$this->db->where('idLeger_nilai', $id);
		$cekNilai = $this->db->get();
		$jmlCek = $cekNilai->num_rows();
		if($jmlCek == 0){
			$execute = $this->db->insert('leger_nilai', array(
															'idLeger' 	=> $idLeger, 
															'NIK_pd' 	=> $nik,
															$modul=>$value
														)
										);
		}else{
			$this->db->where(array("idLeger_nilai"=>$id));
			$execute = $this->db->update("leger_nilai",array($modul=>$value));
		}
		return $execute;
	}

	/*----------------------------------------------------------------------*/
	public function getEkskul(){
		$this->db->select('*');
		$this->db->from('ekstrakulikuler');
		$this->db->order_by('nama_ekstrakulikuler', 'asc');
		$query 		= $this->db->get();
		$execute 	= $query->result();
		return $execute;
	}

	public function getKontenEkskul($idMasterLeger){
		$this->db->select('*');
		$this->db->from('leger_ekskul');
		$this->db->join('master_leger', 'leger_ekskul.idMaster_leger = master_leger.idMaster_leger', 'left');
		$this->db->where('leger_ekskul.idMaster_leger', $idMasterLeger);
		$this->db->order_by('leger_ekskul.no_urut_ekskul', 'asc');
		$query = $this->db->get();
		$execute = $query->result();
		return $execute;
	}

	public function cekEkskulNilai($data){
		$this->db->select('idMaster_leger, ekstrakulikuler');
		$this->db->from('leger_ekskul');
		$this->db->where('idMaster_leger', $data['idMaster_leger']);
		$this->db->where('ekstrakulikuler', $data['ekstrakulikuler']);
		$query = $this->db->get();
		$execute = $query->num_rows();
		return $execute;
	}

	public function addEkskulLeger($data){
		$this->db->insert('leger_ekskul', $data);
	}

	public function hapusKontenEkskul($idLegerEkskul){
		$this->db->where('idLeger_ekskul', $idLegerEkskul);
		$this->db->delete('leger_ekskul');
	}

	public function getListNilaiEkskulPD($idLeger){
		$this->db->select('leger_nilai_ekskul.*,peserta_didik.NIK_pd, peserta_didik.nama_pd, peserta_didik.nipd');
		$this->db->from('leger_nilai_ekskul');
		$this->db->join('peserta_didik', 'leger_nilai_ekskul.NIK_pd = peserta_didik.NIK_pd', 'left');
		$this->db->where('leger_nilai_ekskul.idLeger_ekskul', $idLeger);
		$query 		= $this->db->get();
		$execute 	= $query->result();
		return $execute; 
	}


	public function tambahNilaiEkskulSiswa($data){
		$this->db->select('*');
		$this->db->from('leger_nilai_ekskul');
		$this->db->where('idLeger_ekskul', $data['idLeger_ekskul']);
		$this->db->where('NIK_pd', $data['NIK_pd']);
		$query = $this->db->get();
		$cekData = $query->num_rows();
		if($cekData == 0){
			$execute = $this->db->insert('leger_nilai_ekskul', $data);
		}else{
			$execute = '';
		}
		return $execute;
	}

	public function simpanNilaiEkskul($data, $pk){
		$this->db->select('*');
		$this->db->from('leger_nilai_ekskul');
		$this->db->where('idLeger_nilai_ekskul', $pk);
		$cekNilai = $this->db->get();
		$jmlCek = $cekNilai->num_rows();
		if($jmlCek == 0){
			$execute = $this->db->insert('leger_nilai_ekskul', $data);
		}else{
			$this->db->where('idLeger_nilai_ekskul', $pk);
			$execute = $this->db->update('leger_nilai_ekskul', $data);
		}
		return $execute;
	}

	public function hapusPenilaianSiswaEkskul($id){
		$this->db->where('idLeger_nilai_ekskul', $id);
		$this->db->delete('leger_nilai_ekskul');
	}


}

/* End of file Legernilai_m.php */
/* Location: ./application/modules/LegerNilai/models/Legernilai_m.php */
