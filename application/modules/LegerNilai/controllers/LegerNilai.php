<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LegerNilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
	}
	public function index(){
		$data['judul']  = 'Master Leger Nilai';
		$template 		= 'admin_template';
		$view 			= 'MasterLeger/masterLeger';

		$this->outputview->output_admin($view, $template, $data);
	}

}

/* End of file LegerNilai.php */
/* Location: ./application/modules/LegerNilai/controllers/LegerNilai.php */