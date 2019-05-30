<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakRaport_m extends CI_Model {

	public function getIdentitasSekolah($masterID){
		/*$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('sekolah', 'peserta_didik.idSekolah = sekolah.idSekolah', 'left');
		$this->db->where('NIK_pd', $siswaID);*/
		$this->db->select('*');
		$this->db->from('master_leger');
		$this->db->join('kelas', 'master_leger.idKelas = kelas.idKelas', 'left');
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		$this->db->join('sekolah', 'program_studi.idSekolah = sekolah.idSekolah', 'left');
		$this->db->where('idMaster_leger', $masterID);
		$query = $this->db->get();
		$execute = $query->row();
		return $execute;
	}

	public function getIdentitasPD($siswaID){
		$this->db->select('*');
		$this->db->from('peserta_didik');
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->join('ortu_peserta_didik', 'peserta_didik.NIK_pd = ortu_peserta_didik.NIK_pd', 'left');
		$this->db->join('kelas', 'detail_peserta_didik.idKelas = kelas.idKelas', 'left');
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		$this->db->where('peserta_didik.NIK_pd', $siswaID);
		$query = $this->db->get();
		$execute = $query->row();
		return $execute;
	}

	public function kontenHal2(){
		$query = $this->db->get_where('pengaturan_raport', ['jenis_pengaturan' => 'PetunjukPenggunaan']);
		$execute = $query->row();
		return $execute;
	}

	public function getKepalaSekolah($idSekolah){
		$this->db->select('*');
		$this->db->from('jabatan_tenpen');
		$this->db->join('jabatan', 'jabatan_tenpen.idJabatan = jabatan.idJabatan', 'left');
		$this->db->join('tenaga_pendidik', 'jabatan_tenpen.NIK_tenpen = tenaga_pendidik.NIK_tenpen', 'left');
		$this->db->join('detail_tenaga_pendidik', 'tenaga_pendidik.NIK_tenpen = detail_tenaga_pendidik.NIK_tenpen', 'left');
		$this->db->where('jabatan_tenpen.idSekolah', $idSekolah);
		$this->db->where('jabatan.nama_jabatan', 'Kepala Sekolah');
		$query 		= $this->db->get();
		$execute 	= $query->row();
		return $execute;
	}

}

/* End of file CetakRaport_m.php */
/* Location: ./application/modules/Raport/models/CetakRaport_m.php */