<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetData_m extends CI_Model {

	public function getDataKelas($idKelas){
		$query 		= $this->db->get_where('kelas', ['idKelas' => $idKelas]);
		$execute 	= $query->row();
		return $execute;
	}

	public function dataPengaturan(){
		$query = $this->db->get('settings');
		$execute = $query->row();

		return $execute;
	}

	public function getDataDesa(){
		$query = $this->db->get('alamat_desa');
		$execution = $query->result();
		return $execution;
	}
	public function getDataKecamatan(){
		$query = $this->db->get('alamat_kecamatan');
		$execution = $query->result();
		return $execution;
	}

	public function getDataKabupaten(){
		$query = $this->db->get('alamat_kabupaten');
		$execution = $query->result();
		return $execution;
	}

	public function getDataProvinsi(){
		$query = $this->db->get('alamat_provinsi');
		
		return $query;
	}

	public function getDataHakAkses(){
		$query = $this->db->get_where('groups', ['name !=' => 'developer']);
		return $query;
	}

}

/* End of file GetData.php */
/* Location: ./application/models/GetData.php */
