<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlamatChain extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AlamatChain_m');
	}
	public function listKota(){
		$idProvinsi = $this->input->post('idProvinsi');
		$listKota 	= $this->AlamatChain_m->getListKabupaten($idProvinsi);

		$lists = '<select class="form-control" name="kabupaten" id="kabupaten">';
		$lists .= "<option value=''>Pilih Kabupaten</option>";
		
		foreach($listKota as $data){
			$lists .= "<option value='".$data->id_kab."'>".$data->nama_kabupaten."</option>";
		}
			$callback = array('listKota'=>$lists); 

			echo json_encode($callback); 
		
	}

	public function listKecamatan(){
		$idKabupaten = $this->input->post('idKabupaten');
		$listKecamatan 	= $this->AlamatChain_m->getListKecamatan($idKabupaten);

		$lists = "<option value=''>Pilih Kecamatan</option>";
		
		foreach($listKecamatan as $data){
			$lists .= "<option value='".$data->id_kec."'>".$data->nama_kecamatan."</option>";
		}
			$callback = array('listKecamatan'=>$lists); 

			echo json_encode($callback); 
	}

	public function listKelurahan(){
		$idKecamatan = $this->input->post('idKecamatan');
		$listKelurahan 	= $this->AlamatChain_m->getListKelurahan($idKecamatan);

		$lists = "<option value=''>Pilih Kelurahan</option>";
		
		foreach($listKelurahan as $data){
			$lists .= "<option value='".$data->id_kel."'>".$data->nama_kelurahan."</option>";
		}
			$callback = array('listKelurahan'=>$lists); 

			echo json_encode($callback); 
	}

}

/* End of file AlamatChain.php */
/* Location: ./application/controllers/AlamatChain.php */