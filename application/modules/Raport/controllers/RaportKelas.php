<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RaportKelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Outputview');
		$this->load->model('ListData_m');
		$this->load->model('Raport_m');
		$this->load->helper('value_helper');
		$this->load->helper('tglindo_helper');
	}
	public function index(){	
		$listSekolah 			= $this->ListData_m->listSekolah();
		$listKelas 				= $this->ListData_m->listKelas();
		$view 					= 'RaportKelas/raportKelas';
		$template 				= 'admin_template';
		$data['judul'] 			= 'Cetak Raport Kelas';
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
			$lists .= "<option value='".$list->idKelas."'>".$list->nama_kelas." | ".$list->singkatan_prodi."</option>";
		}
		$callback = array('listKelas'=>$lists); 

		echo json_encode($callback); 
	}

	public function getListAngkatan(){
		$idKelas 		= $this->input->post('idKelas');
		$listAngkatan 	= $this->Raport_m->listAngkatan($idKelas);
		$lists 			= "<option value=''>Pilih Angkatan</option>";
		
		foreach($listAngkatan as $list){
			$lists .= "<option value='".$list->tahun_angkatan."'>".$list->tahun_angkatan."</option>";
		}
		$callback = array('listAngkatan'=>$lists); 

		echo json_encode($callback); 
	}


	public function getListSemester(){
		$idKelas 		= $this->input->post('kelas');
		$angkatan 		= $this->input->post('angkatan');
		$listSemester 	= $this->Raport_m->listSemester($idKelas, $angkatan);

		$lists = '<select class="form-control" name="pilihSemester" id="pilihSemester">';
		$lists .= "<option value=''>Pilih Semester</option>";
		
		foreach($listSemester as $list){
			$lists .= "<option value='".$list->semester."'>".$list->semester."</option>";
		}
		$callback = array('listSemester'=>$lists); 

		echo json_encode($callback); 
	}

	public function tampilSiswaKelas(){
		$angkatan 					= $this->input->post('angkatan');
		$idKelas 					= $this->input->post('idKelas');
		$semester 					= $this->input->post('semester');
		$titimangsa 				= $this->input->post('titimangsa');
		$masterLeger 				= $this->Raport_m->identiMasterLeger($idKelas, $angkatan, $semester);
		//$dataSiswa 				= $this->Raport_m->tampilSiswaKelas($angkatan, $idKelas);
		$dataSiswa					= $this->Raport_m->tampilSiswaKelas($masterLeger);
		$data['dataSiswa'] 			= $dataSiswa;
		$data['semester'] 			= $semester;
		$data['idMasterLeger'] 		= $masterLeger;
		$data['titimangsa'] 		= $titimangsa;
		$data['idKelas'] 			= $idKelas;
		//$data['dataTest'] 			= $dataTest;

		$this->load->view('RaportKelas/daftarSiswa', $data, FALSE);
	}

	public function updateRekapAbsen(){
		$field 	= $this->input->post('name');
		$pk 	= $this->input->post('pk');
		$value 	= $this->input->post('value');
		$data = [
		    $field => $value
		];
		$this->Raport_m->updateRekapAbsen($data, $pk);
	}


}

/* End of file RaportKelas.php */
/* Location: ./application/modules/Raport/controllers/RaportKelas.php */