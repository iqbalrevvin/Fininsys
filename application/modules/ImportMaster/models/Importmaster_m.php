<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importmaster_m extends CI_Model {

	public function cekDataSekolah($idSekolah){
		$this->db->select('*');
		$this->db->from('sekolah');
		$this->db->where('idSekolah', $idSekolah);
		$query = $this->db->get();
		$cekData = $query->num_rows();
		return $cekData;
	}

	public function cekDataGanda($NIK,$NISN,$NIPD){
		$this->db->select('*');
		$this->db->where('NIK_pd', $NIK);
		$this->db->where('nipd', $NIPD);
		$this->db->where('nisn', $NISN);
		$this->db->from('peserta_didik');
		$query = $this->db->get();
		$cekDataGanda = $query->num_rows();
		return $cekDataGanda;
	}

	public function importDataUtama($data){
		#$this->db->insert_batch('peserta_didik', $data);
		#$insert = $this->db->insert('peserta_didik', $data);
		/*if($this->db->insert('peserta_didik', $data)){
			return true;
		}else{
			return false;
		}*/
		$this->db->select('*');
		$this->db->where('NIK_pd', $data['NIK_pd']);
		$this->db->where('nipd', $data['nipd']);
		$this->db->where('nisn', $data['nisn']);
		$this->db->from('peserta_didik');
		$query = $this->db->get();
		$cekDataGanda = $query->num_rows();
		if ($cekDataGanda == 0) {
			return $this->db->insert('peserta_didik', $data);
		}else{
			return false;
		}
		
	}
	public function importOrtuPD($importOrtuPD){
		$this->db->select('*');
		$this->db->where('NIK_pd', $importOrtuPD['NIK_pd']);
		$this->db->from('ortu_peserta_didik');
		$query = $this->db->get();
		$cekDataGanda = $query->num_rows();
		if ($cekDataGanda == 0) {
			return $this->db->insert('ortu_peserta_didik', $importOrtuPD);
		}else{
			return false;
		}
	}
	public function importDetailPD($importDetailPD){
		$this->db->select('*');
		$this->db->where('NIK_pd', $importDetailPD['NIK_pd']);
		$this->db->from('detail_peserta_didik');
		$query = $this->db->get();
		$cekDataGanda = $query->num_rows();
		if ($cekDataGanda == 0) {
			return $this->db->insert('detail_peserta_didik', $importDetailPD);
		}else{
			return false;
		}
		
	}

}

/* End of file importmaster_m.php */
/* Location: ./application/modules/ImportMaster/models/importmaster_m.php */