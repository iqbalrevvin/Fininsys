<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanNilaiPredikat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->library('grocery_CRUD');
	}
	public function index(){
		$crud 	= new grocery_CRUD();

		$crud->set_table('leger_pengaturan_nilai_predikat');
		$crud->set_subject('Pengaturan Nilai Predikat');
		// $crud->display_as('nilai_deskripsi', 'Nilai');

		/*$crud->unset_add();
		$crud->unset_delete();*/

		$crud->required_fields('nilai_awal', 'nilai_akhir', 'nilai_predikat');

		/*$crud->callback_column('nilai_deskripsi',array($this,'nilai_callback'));*/

		$output = $crud->render();
		$data['judul'] 	= 'Pengaturan Nilai Predikat';
		$view 			= 'grocery';
		$template 		= 'admin_template';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

}

/* End of file PengaturanNilaiPredikat.php */
/* Location: ./application/modules/PengaturanNilaiPredikat/controllers/PengaturanNilaiPredikat.php */