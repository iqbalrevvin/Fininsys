<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenKelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->model('ManajemenKelas_m');
		$this->load->helper('Other/fotogender');
		$this->load->helper('grade');
	}

	public function index(){

		
		#$data['siswa'] 		= $this->ManajemenKelas_m->getPesdik($idKelas);
		$data['judul'] 		= 'Manajemen Kelas';
		$template      		= 'admin_template';
		$view          		= 'manajemenKelas';

		$this->outputview->output_admin($view, $template, $data);
	}

	public function getManajemenKelas(){
		$listKelas 			= $this->ManajemenKelas_m->listing();
		$data['listKelas'] 	= $listKelas;

		$this->load->view('kontenManajemenKelas', $data, FALSE);
	}

}

/* End of file ManajemenKelas.php */
/* Location: ./application/modules/ManajemenKelas/controllers/ManajemenKelas.php */