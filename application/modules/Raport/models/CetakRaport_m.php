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

	public function kontenHal2($jenis){
		$query = $this->db->get_where('pengaturan_raport', ['jenis_pengaturan' => $jenis]);
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

	public function getWaliKelas($masterID){
		$this->db->select('kelas.idKelas, kelas.NIK_tenpen, tenaga_pendidik.NIK_tenpen, tenaga_pendidik.nama_tenpen, detail_tenaga_pendidik.NIP, master_leger.idMaster_leger, master_leger.idKelas');
		$this->db->from('kelas');
		$this->db->join('master_leger', 'kelas.idKelas = master_leger.idKelas', 'left');
		$this->db->join('tenaga_pendidik', 'kelas.NIK_tenpen = tenaga_pendidik.NIK_tenpen', 'left');
		$this->db->join('detail_tenaga_pendidik', 'tenaga_pendidik.NIK_tenpen = detail_tenaga_pendidik.NIK_tenpen', 'left');
		$this->db->where('master_leger.idMaster_leger', $masterID);
		$query = $this->db->get();
		$execute = $query->row();
		return $execute;
	}

	public function loopingKelompokMapel($masterID){
		$this->db->distinct();
		$this->db->select('DISTINCT(kelompok_mapel.idKelompok_mapel), kelompok_mapel.nama_kelompok_mapel');
		$this->db->from('leger');
		$this->db->join('mata_pelajaran', 'leger.idMata_pelajaran = mata_pelajaran.idMata_pelajaran', 'left');
		$this->db->join('kelompok_mapel', 'mata_pelajaran.idKelompok_mapel = kelompok_mapel.idKelompok_mapel', 'left');
		$this->db->join('tenaga_pendidik', 'leger.NIK_tenpen = tenaga_pendidik.NIK_tenpen', 'left');
		$this->db->where('leger.idMaster_leger', $masterID);
		$this->db->order_by('kelompok_mapel.nama_kelompok_mapel', 'asc');
		$query = $this->db->get();
		$execute = $query->result();
		return $execute;
	}
	public function loopingMapel($idKelompokMapel, $masterID, $NIK_pd){
		$this->db->select('*');
		$this->db->from('leger');
		$this->db->join('leger_nilai', 'leger.idLeger = leger_nilai.idLeger', 'left');
		$this->db->join('mata_pelajaran', 'leger.idMata_pelajaran = mata_pelajaran.idMata_pelajaran', 'left');
		$this->db->join('kelompok_mapel', 'mata_pelajaran.idKelompok_mapel = kelompok_mapel.idKelompok_mapel', 'left');
		$this->db->where('kelompok_mapel.idKelompok_mapel', $idKelompokMapel);
		$this->db->where('leger.idMaster_leger', $masterID);
		$this->db->where('leger_nilai.NIK_pd', $NIK_pd);
		$this->db->order_by('leger.no_urut_mapel', 'asc');
		$query = $this->db->get();
		$execute = $query->result();
		return $execute;
	}

	public function loopingEkskul($masterID, $NIK_pd){
		$this->db->select('*');
		$this->db->from('leger_ekskul');
		$this->db->join('leger_nilai_ekskul', 'leger_ekskul.idLeger_ekskul = leger_nilai_ekskul.idLeger_ekskul', 'left');
		$this->db->join('ekstrakulikuler', 'leger_ekskul.ekstrakulikuler = ekstrakulikuler.nama_ekstrakulikuler', 'left');
		$this->db->where('leger_ekskul.idMaster_leger', $masterID);
		$this->db->where('leger_nilai_ekskul.NIK_pd', $NIK_pd);
		$this->db->order_by('leger_ekskul.no_urut_ekskul', 'asc');
		$query = $this->db->get();
		#$execute = $query->result();
		return $query;
	}


	public function reapitulasiAbsen($NIK_pd, $semester){
		$query 		= $this->db->get_where('rekap_absen_peserta_didik', ['NIK_pd' => $NIK_pd, 'semester' => $semester]);
		$execute 	= $query->row();
		return $execute;
	}

}

/* End of file CetakRaport_m.php */
/* Location: ./application/modules/Raport/models/CetakRaport_m.php */