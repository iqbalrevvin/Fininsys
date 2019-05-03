<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaKelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->model('ManajemenKelas_m');
		$this->load->helper('value_helper');
	}
	public function index(){
		$idKelas 		= $this->input->get('IDKelas');
		$namaKelas 		= $this->ManajemenKelas_m->getNamaKelas($idKelas);
		$data['kelas'] 	= $namaKelas;
		$data['crumb'] 	= [
		    'Manajemen Kelas' => 'ManajemenKelas',
		    'Kelola Kelas '.$namaKelas->nama_kelas => '' 
		];
		$template 		= 'admin_template';
		$view 			= 'kelolaKelas';

		$this->outputview->output_admin($view, $template, $data);
	}

	public function getKontenKelolaKelas(){
		$idKelas 				= $this->input->post('ID');
		$namaKelas 				= $this->ManajemenKelas_m->getNamaKelas($idKelas);
		$dataSiswaKelas 		= $this->ManajemenKelas_m->getPesdik($idKelas);
		$dataWaliKelas 			= $this->ManajemenKelas_m->getWaliKelas();
		$data['kelas'] 			= $namaKelas;
		$data['dataSiswaKelas'] = $dataSiswaKelas;
		$data['dataWaliKelas'] 	= $dataWaliKelas;

		$this->load->view('kontenKelolaKelas', $data, FALSE);
	}

	public function keluarKelas(){
		if($this->input->post('keluar')){
			$NIK_pd = $this->input->post('NIK_pd');
			$data = [
			    'NIK_pd' => $NIK_pd,
			    'idKelas' => Null
			];
			$this->ManajemenKelas_m->getKeluarKelas($data);
		}
		#$this->load->view('', $data, FALSE);
	}

	public function setWaliKelas(){
		$validate 	= $this->form_validation;
			$validate->set_rules(
					'waliKelas', 'Wali Kelas', 'is_unique[kelas.NIK_tenpen]',
					array('is_unique' => 'Wali Kelas Yang Dipilih Sudah Menjabat Dikelas Lain!')
				);
		if($this->input->post('setWali')){
			
			if($validate->run() == TRUE){
				$callback = [
			    	'status' 	=> 'sukses',
			    	'pesan' 	=> 'Tenaga Pendidik Terpilih Berhasil Diatur Sebagai Wali Kelas' 
				];
				$NIK_tenpen = $this->input->post('waliKelas');
				$kelasID = $this->input->post('kelasID');
				$data = [
				    'NIK_tenpen' => $NIK_tenpen,
				    'idKelas' => $kelasID
				];
				$this->ManajemenKelas_m->setWaliKelas($data);
			}else{
				$callback = [
			    	'status' 	=> 'gagal',
			    	'pesan' 	=> validation_errors()
				];
			}
			echo json_encode($callback);
		}
	}

	public function listPilihSiswa(){
		$list = $this->ManajemenKelas_m->get_datatables();
		$data = array();
		$no = $this->input->post('start');
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = '<label class="m-checkbox m-checkbox--solid m-checkbox--success">
						<input type="checkbox" class="m-checkbox m-checkbox--bold m-checkbox--state-success data-check" value="'.$person->NIK_pd.'"> Pilih
						<span></span>
                      </label>
					';
			$row[] = $person->nama_pd;
			$row[] = $person->jk_pd;
			$row[] = $person->nisn;
			$row[] = $person->nipd;
			$row[] = $person->nama_sekolah;
			$data[] = $row;
		}

		$output = array(
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->ManajemenKelas_m->count_all(),
						"recordsFiltered" => $this->ManajemenKelas_m->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function tambahSiswaKelas(){
		$listPD = $this->input->post('id');
		$kelasID = $this->input->post('kelasID');
		foreach ($listPD as $id) {
			$data = [
			    'NIK_pd' => $id,
			    'idKelas' => $kelasID
			];
			$this->ManajemenKelas_m->tambahSiswaKelas($data);
		}
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file KelolaKelas.php */
/* Location: ./application/modules/ManajemenKelas/controllers/KelolaKelas.php */