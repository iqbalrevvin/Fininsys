<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_tenpen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
	}
	public function index(){
		$data['judul'] 	= 'Profil Peserta Didik';
		$template      	= 'admin_template';
		$view          	= 'PesertaDidik/profil.php';
        $this->outputview->output_admin($view, $template, $data);
	}

}

/* End of file Tenaga_pendidik.php */
/* Location: ./application/modules/TenagaPendidik/controllers/Tenaga_pendidik.php */