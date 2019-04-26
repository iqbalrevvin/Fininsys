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
		$data['kelas'] 			= $namaKelas;
		$data['dataSiswaKelas'] = $dataSiswaKelas;

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

}

/* End of file KelolaKelas.php */
/* Location: ./application/modules/ManajemenKelas/controllers/KelolaKelas.php */