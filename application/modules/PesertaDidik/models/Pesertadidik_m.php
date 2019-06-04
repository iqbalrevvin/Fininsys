<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaDidik_m extends CI_Model {

public function insertPD($data){
	$this->db->insert('peserta_didik', $data);
	#$this->db->insert('detail_peserta_didik', $data);
}
public function insertDetail($data){
	$this->db->insert('detail_peserta_didik', $data);
	$this->db->insert('ortu_peserta_didik', $data);
}


public function getNameProfil($id){
	$query = $this->db->get_where('peserta_didik', ['NIK_pd' => $id]);
	$execute = $query->row();

	return $execute;
}

public function profil($id){
	$this->db->select('*');
	$this->db->from('peserta_didik');
	$this->db->join('sekolah', 'peserta_didik.idSekolah = sekolah.idSekolah', 'left');
	$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
	$this->db->join('ortu_peserta_didik', 'peserta_didik.NIK_pd = ortu_peserta_didik.NIK_pd', 'left');
	$this->db->join('kelas', 'detail_peserta_didik.idKelas = kelas.idKelas', 'left');
	$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
	$this->db->join('provinsi', 'peserta_didik.idProvinsi = provinsi.id_prov', 'left');
	$this->db->join('kabupaten', 'peserta_didik.idKabupaten = kabupaten.id_kab', 'left');
	$this->db->join('kecamatan', 'peserta_didik.idKecamatan = kecamatan.id_kec', 'left');
	$this->db->join('kelurahan', 'peserta_didik.idKelurahan = kelurahan.id_kel', 'left');
	//$this->db->join('kelurahan', 'peserta_didik.id_kel = kelurahan.id_kel', 'left');
	$this->db->where('peserta_didik.NIK_pd', $id);
	$query 		= $this->db->get();
	$execute 	= $query->row();
	return $execute;
}


public function editProfilPD($id, $data){
	$this->db->where('NIK_pd', $id);
	$this->db->update('peserta_didik', $data);
}


public function listKelurahan($idKecamatan){
	$this->db->where('id_kec', $idKecamatan);
	$query = $this->db->get('kelurahan');
	$execute = $query->result();
	return $execute;
}

public function listKecamatan($idKabupaten){
	$this->db->where('id_kab', $idKabupaten);
	$query = $this->db->get('kecamatan');
	$execute = $query->result();
	return $execute;
}

public function listKabupaten($idProvinsi){
	$this->db->where('id_prov', $idProvinsi);
	$query = $this->db->get('kabupaten');
	$execute = $query->result();
	return $execute;
}

public function editKontak($data, $pk){
	$this->db->where('idPd', $pk);
	$this->db->update('peserta_didik', $data);
}

public function editOrangTua($data, $pk){
	$this->db->where('NIK_pd', $pk);
	$this->db->update('ortu_peserta_didik', $data);
}

public function listKelas($idSekolah){
	$this->db->select('*');
	$this->db->from('kelas');
	$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
	$this->db->join('sekolah', 'program_studi.idSekolah = sekolah.idSekolah', 'left');
	$this->db->where('program_studi.idSekolah', $idSekolah);
	$query = $this->db->get();
	$execute = $query->result();
	return $execute;
}

public function jumlahSemester($idKelas){
	$this->db->select('*');
	$this->db->from('program_studi');
	$this->db->join('kelas', 'program_studi.idProdi = kelas.idProdi', 'left');
	$this->db->where('kelas.idKelas', $idKelas);
	$query = $this->db->get();
	$execute = $query->row();
	return $execute;
}
/*public function profil($id)
{
	$query = $this->db->get_where('peserta_didik',array('NIK_pd' => $id));

	$execute 	= $query->row();

	return $execute;
}*/
	

}

/* End of file PesertaDidik_m.php */
/* Location: ./application/models/PesertaDidik/PesertaDidik_m.php */
