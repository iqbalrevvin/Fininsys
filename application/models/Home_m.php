<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {

	public function jumlahSekolah(){
		$query = $this->db->get('sekolah');
		$execute = $query->num_rows();
		return $execute;		
	}

	public function jumlahProgramStudi(){
		$query = $this->db->get('program_studi');
		$execute = $query->num_rows();
		return $execute;		
	}	

	public function jumlahKelas(){
		$query = $this->db->get('kelas');
		$execute = $query->num_rows();
		return $execute;
	}

}

/* End of file Home_m.php */
/* Location: ./application/models/Home_m.php */