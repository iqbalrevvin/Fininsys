<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RaportKelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Outputview');
		$this->load->model('ListData_m');
		$this->load->model('Raport_m');
	}
	public function index(){
		$listSemester 			= $this->Raport_m->listSemester();
		$listSekolah 			= $this->ListData_m->listSekolah();
		$listKelas 				= $this->ListData_m->listKelas();
		$view 					= 'RaportKelas/raportKelas';
		$template 				= 'admin_template';
		$data['judul'] 			= 'Cetak Raport Per Kelas';
		$data['listSemester'] 	= $listSemester;
		$data['listSekolah'] 	= $listSekolah;
		$data['listKelas'] 		= $listKelas;
		$this->outputview->output_admin($view, $template, $data);
	}

	

	public function getListKelas(){
		$idSekolah = $this->input->post('idSekolah');
		$listKelas 	= $this->ListData_m->listKelasFromSekolah($idSekolah);

		$lists = '<select class="form-control" name="pilihKelas" id="pilihKelas">';
		$lists .= "<option value=''>Pilih Kelas</option>";
		
		foreach($listKelas as $list){
			$lists .= "<option value='".$list->idKelas."'>".$list->nama_kelas." | ".$list->nama_prodi."</option>";
		}
		$callback = array('listKelas'=>$lists); 

		echo json_encode($callback); 
	}


	public function tampilSiswaKelas(){
		$idKelas 	= $this->input->post('idKelas');
		$dataSiswa 	= $this->Raport_m->tampilSiswaKelas($idKelas);
		$data['dataSiswa'] = $dataSiswa;
		$this->load->view('RaportKelas/daftarSiswa', $data, FALSE);
	}

}

/* End of file RaportKelas.php */
/* Location: ./application/modules/Raport/controllers/RaportKelas.php */