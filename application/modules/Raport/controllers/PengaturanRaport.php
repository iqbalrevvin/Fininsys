<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanRaport extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->library('grocery_CRUD');
	}
	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_table('pengaturan_raport');
		$crud->set_subject('Pengaturan Raport');
		/*$crud->unset_add();
		$crud->unset_delete();*/

		$output = $crud->render();
		$data['judul'] 	= 'Pengaturan Raport';
		$view 			= 'grocery';
		$template 		= 'admin_template';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

}

/* End of file PengaturanRaport.php */
/* Location: ./application/modules/Raport/controllers/PengaturanRaport.php */