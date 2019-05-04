<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LegerNilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->library('grocery_CRUD');
		$this->load->model('LegerNilai_m');
		$this->load->model('TenagaPendidik/TenagaPendidik_m');
	}
	public function index(){
		$crud = new grocery_CRUD();

		$crud->set_table('master_leger');
		$crud->set_subject('Master Leger Nilai');
		$crud->display_as('idKelas', 'Kelas');
		$crud->unset_read();
		$crud->add_action('Kelola Nilai', 'fa fa-cog', '', '',array($this,'profilLink'));

		/*LIST DATA KELAS*/
		$listKelas = $this->LegerNilai_m->getKelas();
		$finalArray = array();
		foreach ($listKelas->result() as $row){
				$finalArray[$row->idKelas]=$row->nama_kelas." | $row->nama_sekolah";
		}
		$crud->field_type('idKelas','dropdown',$finalArray);
		/*----------------------------------------------------*/

		$crud->required_fields('idKelas', 'tahun_angkatan', 'semester');

		/*LIST DATA KELAS*/
		$listTahunAngkatan = $this->LegerNilai_m->getTahunAjaran();
		$finalArray = array();
		foreach ($listTahunAngkatan->result() as $row){
				$finalArray[substr($row->nama_tahun_ajaran,0,4)]=$row->nama_tahun_ajaran;
		}
		$crud->field_type('tahun_angkatan','dropdown',$finalArray);
		/*----------------------------------------------------*/
		/*CALLBACK*/
		$crud->callback_insert(array($this,'insertMasterLeger'));
		$crud->callback_update(array($this,'updateMasterLeger'));
		/*--------------------------------------------*/

		$output = $crud->render();
		$data['judul']  = 'Master Leger Nilai';
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function profilLink($primary_key, $row){
		return site_url('LegerNilai/KelolaNilai').'?IDMaster='.$primary_key;
	}

	function insertMasterLeger($post_array){
		$idKelas 		= $post_array['idKelas'];
		$tahunAngkatan 	= $post_array['tahun_angkatan'];
		$semester 		= $post_array['semester'];
		$data = [
		    'idKelas' 			=> $idKelas,
		    'tahun_angkatan' 	=> $tahunAngkatan,
		    'semester' 			=> $semester
		];

		$insertMasterLeger = $this->LegerNilai_m->insertMasterLeger($data);
		return $insertMasterLeger;
	}

	function updateMasterLeger($post_array, $primary_key){
		$idKelas 		= $post_array['idKelas'];
		$tahunAngkatan 	= $post_array['tahun_angkatan'];
		$semester 		= $post_array['semester'];
		$id 			= $primary_key;
		$data = [
		    'idKelas' 			=> $idKelas,
		    'tahun_angkatan' 	=> $tahunAngkatan,
		    'semester' 			=> $semester
		];

		$updateMasterLeger = $this->LegerNilai_m->updateMasterLeger($data, $id);
		return $updateMasterLeger;
	}


	public function KelolaNilai(){
		$idMasterLeger 			= $this->input->get('IDMaster');
		$getMapel 				= $this->LegerNilai_m->getMapel();
		$getTenpen 				= $this->LegerNilai_m->getTenpen();
		//$data['test']	= $this->LegerNilai_m->cekMapelNilaiKelas();

		$data['idMasterLeger'] 	= $idMasterLeger;
		$data['tenpen'] 		= $getTenpen;
		$data['mapel'] 			= $getMapel;
		$data['MasterLeger'] 	= $this->LegerNilai_m->detailLeger($idMasterLeger);
		$view 					= 'KelolaNilai/kelolaNilai';
		$template 				= 'admin_template';
		$data['crumb'] = array( 
				'Leger Nilai' => 'LegerNilai',
				'Kelola Nilai' => '' 
			);
		
		$this->outputview->output_admin($view, $template, $data);
	}

	public function getKontenMapel(){
		$idMasterLeger = $this->input->post('id');
		$data['listMapel'] = $this->LegerNilai_m->getKontenMapel($idMasterLeger);
		$this->load->view('KelolaNIlai/kontenKelolaMapel', $data, FALSE);
	}

	public function tambahMapelNilai(){
		$validate = $this->form_validation;
		$validate->set_rules('kkmPengetahuan', 'Nilai KKM Pengetahun', 'max_length[2]|numeric');
		$validate->set_rules('kkmKeterampilan', 'Nilai KKM Keterampilan', 'max_length[2]|numeric');
		if ($validate->run() == TRUE) {
			$i = $this->input;
			$data = [
			    'idMaster_leger' 	=> $i->post('idMaster'),
			    'idMata_pelajaran' 	=> $i->post('mataPelajaran'),
			    'NIK_tenpen' 		=> $i->post('guruPengampu'),
			    'kkm_pengetahuan' 	=> $i->post('kkmPengetahuan'),
			    'kkm_keterampilan' 	=> $i->post('kkmKeterampilan'),
			    'no_urut_mapel' 	=> $i->post('noUrut')
			];
			$cekMapel = $this->LegerNilai_m->cekMapelNilaiKelas($data);
			if($cekMapel == 0){
				$callback = [
			    	'status' 	=> 'sukses',
			    	'pesan' 	=> 'Data Berhasil Ditambahkan' 
				];
				$this->LegerNilai_m->addMapelLeger($data);
			}else{
				$callback = [
			    	'status' 	=> 'ganda',
			    	'pesan' 	=> 'Data Mapel Yang Ditambahkan Sudah Tersedia' 
				];
			}
		}else{
			$callback = [
			    'status' 	=> 'gagal',
			    'pesan' 	=> validation_errors() 
			];
		}
		echo json_encode($callback);
	}


}

/* End of file LegerNilai.php */
/* Location: ./application/modules/LegerNilai/controllers/LegerNilai.php */