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
		$this->load->model('DataTableSiswa_m');
		$this->load->model('GetData_m');
	}
	public function index(){
		$crud = new grocery_CRUD();

		$crud->set_table('master_leger');
		$crud->set_subject('Master Leger Nilai');
		$crud->display_as('idKelas', 'Kelas/Sekolah');
		$crud->unset_read();
		$crud->add_action('Nilai Reguler', 'fa fa-cog', '', 'navigation',array($this,'linkReguler'));
		$crud->add_action('Nilai Ekskul', 'fa fa-cog', '', 'navigation',array($this,'linkEkskul'));

		/*LIST DATA KELAS*/
		$listKelas = $this->LegerNilai_m->getKelas();
		$finalArray = array();
		foreach ($listKelas->result() as $row){
				$finalArray[$row->idKelas]=$row->nama_kelas." | $row->nama_sekolah";
		}
		$crud->field_type('idKelas','dropdown',$finalArray);
		/*----------------------------------------------------*/

		$crud->required_fields('idKelas', 'tahun_angkatan', 'semester');

		
		/*LIST DATA TAHUN AJARAN*/
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


	function linkReguler($primary_key, $row){
		return site_url('LegerNilai/KelolaNilai').'?IDMaster='.$primary_key;
	}

	function linkEkskul($primary_key, $row){
		return site_url('LegerNilai/KelolaNilaiEkskul').'?IDMaster='.$primary_key;
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

	/*-------------------------KELOLA LEGER NILAI--------------------*/

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
				'Kelola Nilai Reguler' => '' 
			);
		
		$this->outputview->output_admin($view, $template, $data);
	}

	public function getKontenMapel(){
		$idMasterLeger 		= $this->input->post('id');
		$getMapel 			= $this->LegerNilai_m->getMapel();
		$getTenpen 			= $this->LegerNilai_m->getTenpen();
		$data['listMapel'] 	= $this->LegerNilai_m->getKontenMapel($idMasterLeger);
		$data['mapel'] 		= $getMapel;
		$data['tenpen'] 	= $getTenpen;
		$this->load->view('KelolaNilai/kontenKelolaMapel', $data, FALSE);
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
			    	'pesan' 	=> 'Data Mata Pelajaran Berhasil Ditambahkan' 
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

	public function editMapelNilai(){
		$validate = $this->form_validation;
		$validate->set_rules('editKKMPengetahuan', 'Nilai KKM Pengetahun', 'max_length[2]|numeric');
		$validate->set_rules('editKKMKeterampilan', 'Nilai KKM Keterampilan', 'max_length[2]|numeric');
		if ($validate->run() == TRUE) {
			$i = $this->input;
			$idLeger = $this->input->post('idLeger');
			$data = [
			    //'idLeger' 			=> $i->post('id'),
			    'NIK_tenpen' 		=> $i->post('tenpen'),
			    'kkm_pengetahuan' 	=> $i->post('KKMPengetahuan'),
			    'kkm_keterampilan' 	=> $i->post('KKMKeterampilan'),
			    'no_urut_mapel' 	=> $i->post('noUrut')
			];
			$this->LegerNilai_m->editMapelLeger($idLeger, $data);
			$callback = [
			    'status' 	=> 'sukses',
			    'pesan' 	=> 'Data Mata Pelajaran Berhasil Diperbarui' 
			];
		}else{
			$callback = [
			    'status' 	=> 'gagal',
			    'pesan' 	=> validation_errors() 
			];
		}
		echo json_encode($callback);
	}

	public function hapusKontenMapel(){
		$idLeger = $this->input->post('id');
		$this->LegerNilai_m->hapusKontenMapel($idLeger);
	}

	public function getKontenKelolaNilai(){
		$idKelas 	= $this->input->post('idKelas');
		$idLeger 	= $this->input->post('idLeger');
		$namaMapel 	= $this->input->post('namaMapel');
		$angkatan 	= $this->input->post('angkatan');
		$idMaster 	= $this->input->post('idMaster');
		$listSiswa 	= $this->LegerNilai_m->getlistPD($idKelas, $angkatan);
		$listNilai  = $this->LegerNilai_m->getListNilaiPD($idLeger);
		$kelas  	= $this->GetData_m->getDataKelas($idKelas); 
		/*foreach ($listSiswa as $pd) {
			$NIK = $pd->NIK_pd;
			$nilai = $this->LegerNilai_m->getNilaiPD($NIK, $idLeger);
			if(count($nilai) == 0){
				$data['nilai'] = $nilai->nilai_pengetahuan;
			}else{
				$data['nilai'] = 0;
			}
		}*/
		#$data['nilai'] = $this->LegerNilai_m->getNilaiPD($NIK, $idLeger);
		$data['angkatan'] 	= $angkatan;
		$data['kelas'] 		= $kelas; 
		$data['idKelas'] 	= $idKelas;
		$data['listSiswa'] 	= $listSiswa;
		$data['listNilai'] 	= $listNilai;
		$data['namaMapel'] 	= $namaMapel;
		$data['idLeger'] 	= $idLeger;
		$data['idMaster'] 	= $idMaster;

		$this->load->view('KelolaNilai/kontenKelolaNilai', $data, FALSE);
	}

	public function tambahPenilainSiswa(){
		$listPD 		= $this->input->post('id');
		$idMasterLeger 	= $this->input->post('idMaster');
		$idLeger 		= $this->input->post('idLeger');
		$semester 		= $this->LegerNilai_m->dataSemester($idMasterLeger);
		foreach ($listPD as $id) {
			/*INPUT SISWA KE DATA PENILAIAN*/
			$data = [
			    'NIK_pd' => $id,
			    'idLeger' => $idLeger
			];
			$this->LegerNilai_m->tambahNilaiSiswa($data);
			/*------------------------------------------*/
			/*INPUT SISWA KE DATA REKAP ABSEN*/
			$dataAbsen = [
			    'NIK_pd' 			=> $id,
			    'semester' 			=> $semester,
			    'jumlah_alpa' 		=> 0,
			    'jumlah_izin' 		=> 0,
			    'jumlah_sakit' 		=> 0,
			    'jumlah_terlambat' 	=> 0,
			];
			$this->LegerNilai_m->inputAbsen($dataAbsen);
			/*-------------------------------*/

		}
		echo json_encode(array("status" => TRUE));
	}

	public function simpanNilai(){
		$NIK 	= $this->input->post('nik');
		$field 	= $this->input->post('name');
		$pk 	= $this->input->post('pk');
		$value 	= $this->input->post('value');

		$data = [
		    $field => $value,
		    //'NIK_pd' => $NIK
		];
		$this->LegerNilai_m->simpanNilai($data, $pk);
	}


	/*-------------------NILAI EKSKUL---------------------*/

	public function KelolaNilaiEkskul(){
		$idMasterLeger 			= $this->input->get('IDMaster');
		$getEkskul 				= $this->LegerNilai_m->getEkskul();
		$getTenpen 				= $this->LegerNilai_m->getTenpen();

		$data['idMasterLeger'] 	= $idMasterLeger;
		$data['tenpen'] 		= $getTenpen;
		$data['ekskul'] 		= $getEkskul;
		$data['MasterLeger'] 	= $this->LegerNilai_m->detailLeger($idMasterLeger);
		$view 					= 'KelolaNilaiEkskul/kelolaNilaiEkskul';
		$template 				= 'admin_template';
		$data['crumb'] = array( 
				'Leger Nilai' => 'LegerNilai',
				'Kelola Nilai Ekstrakulikuler' => '' 
			);
		
		$this->outputview->output_admin($view, $template, $data);
	}

	public function getKontenEkskul(){
		$idMasterLeger = $this->input->post('id');
		$data['listEkskul'] = $this->LegerNilai_m->getKontenEkskul($idMasterLeger);
		$this->load->view('KelolaNilaiEkskul/kontenKelolaEkskul', $data, FALSE);
	}

	public function tambahEkskulNilai(){
		$i = $this->input;
		$data = [
		    'idMaster_leger' 	=> $i->post('idMaster'),
		    'ekstrakulikuler' 	=> $i->post('pilihEkskul'),
		    'pembimbing' 		=> $i->post('pembimbingEkskul'),
		    'no_urut_ekskul' 	=> $i->post('noUrut')
		];
		$cekEkskul = $this->LegerNilai_m->cekEkskulNilai($data);
		if($cekEkskul == 0){
			$callback = [
		    	'status' 	=> 'sukses',
		    	'pesan' 	=> 'Data Berhasil Ditambahkan' 
			];
			$this->LegerNilai_m->addEkskulLeger($data);
			
		}else{
			$callback = [
		    	'status' 	=> 'ganda',
		    	'pesan' 	=> 'Data Mapel Yang Ditambahkan Sudah Tersedia' 
			];
		}

		echo json_encode($callback);
	}
	public function hapusKontenEkskul(){
		$idLegerEkskul = $this->input->post('id');
		$this->LegerNilai_m->hapusKontenEkskul($idLegerEkskul);
	}

	public function getKontenKelolaNilaiEkskul(){
		$idKelas 	= $this->input->post('idKelas');
		$idLeger 	= $this->input->post('idLeger');
		$namaEkskul = $this->input->post('namaEkskul');
		$angkatan 	= $this->input->post('angkatan');
		$listSiswa 	= $this->LegerNilai_m->getlistPD($idKelas, $angkatan);
		$listNilai  = $this->LegerNilai_m->getListNilaiEkskulPD($idLeger);
		/*foreach ($listSiswa as $pd) {
			$NIK = $pd->NIK_pd;
			$nilai = $this->LegerNilai_m->getNilaiPD($NIK, $idLeger);
			if(count($nilai) == 0){
				$data['nilai'] = $nilai->nilai_pengetahuan;
			}else{
				$data['nilai'] = 0;
			}
		}*/
		#$data['nilai'] = $this->LegerNilai_m->getNilaiPD($NIK, $idLeger);
		$data['angkatan'] 	= $angkatan;
		$data['idKelas'] 	= $idKelas;
		$data['listSiswa'] 	= $listSiswa;
		$data['listNilai'] 	= $listNilai;
		$data['namaEkskul'] = $namaEkskul;
		$data['idLeger'] 	= $idLeger;

		$this->load->view('KelolaNilaiEkskul/kontenKelolaNilaiEkskul', $data, FALSE);
	}

	public function tambahPenilaianEkskulSiswa(){
		$listPD = $this->input->post('id');
		$idLeger = $this->input->post('idLeger');
		foreach ($listPD as $id) {
			$data = [
			    'NIK_pd' => $id,
			    'idLeger_ekskul' => $idLeger
			];
			$this->LegerNilai_m->tambahNilaiEkskulSiswa($data);
		}
		echo json_encode(array("status" => TRUE));
	}

	public function simpanNilaiEkskul(){
		$NIK 	= $this->input->post('nik');
		$field 	= $this->input->post('name');
		$pk 	= $this->input->post('pk');
		$value 	= $this->input->post('value');

		$data = [
		    $field => $value,
		    //'NIK_pd' => $NIK
		];
		$this->LegerNilai_m->simpanNilaiEkskul($data, $pk);
	}

	public function hapusPenilaianSiswaEkskul(){
		$id = $this->input->post('id');
		$this->LegerNilai_m->hapusPenilaianSiswaEkskul($id);
	}



	/*-----------------------------------------------------*/

}

/* End of file LegerNilai.php */
/* Location: ./application/modules/LegerNilai/controllers/LegerNilai.php */