<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlamatChain_m extends CI_Model {

	public function getProvinsi(){
		$this->db->order_by('nama_provinsi', 'asc');
		$query 		= $this->db->get('provinsi');
		$execute 	= $query->result();
		return $execute;
	}

	public function getListKabupaten($idProvinsi){
		$this->db->where('id_prov', $idProvinsi);
		$this->db->order_by('nama_kabupaten', 'asc');
		//$this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');
		$query 		= $this->db->get('kabupaten');
		$execute 	= $query->result();
		return $execute;
	}

	public function getListKecamatan($idKabupaten){
		$this->db->where('id_kab', $idKabupaten);
		$this->db->order_by('nama_kecamatan', 'asc');
		$query = $this->db->get('kecamatan');
		$execute = $query->result();
		return $execute;
	}

	public function getListKelurahan($idKecamatan){
		$this->db->where('id_kec', $idKecamatan);
		$this->db->order_by('nama_kelurahan', 'asc');
		$query = $this->db->get('kelurahan');
		$execute = $query->result();
		return $execute;
	}

	public function idKelurahanSelected($idKelurahan){
		$this->db->where('id_kec', $idKecamatan);
		$this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab', 'left');
		$this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_kab', 'left');
		$query 		= $this->db->get('kecamatan');
		$execute 	= $query->row();
	}



}

/* End of file AlamatChain_m.php */
/* Location: ./application/models/AlamatChain_m.php */