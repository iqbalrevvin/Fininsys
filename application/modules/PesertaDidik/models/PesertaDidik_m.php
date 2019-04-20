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

public function profil($id){
	$this->db->select('*');
	$this->db->from('peserta_didik');
	$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
	$this->db->join('ortu_peserta_didik', 'peserta_didik.NIK_pd = ortu_peserta_didik.NIK_pd', 'RIGTH');
	$this->db->where('peserta_didik.NIK_pd', $id);
	$query 		= $this->db->get();
	$execute 	= $query->row();

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