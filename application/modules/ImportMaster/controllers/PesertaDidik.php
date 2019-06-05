<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaDidik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
	}
	public function DataUtama(){
		$data['judul']  = 'Import Data Utama Peserta Didik';
		$template 		= 'admin_template';
		$view 			= 'PesertaDidik/dataUtama';

		$this->outputview->output_admin($view, $template, $data);
	}

}

/* End of file PesertaDidik.php */
/* Location: ./application/modules/ImportMaster/controllers/PesertaDidik.php */