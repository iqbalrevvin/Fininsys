<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeskripsiNilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->library('grocery_CRUD');
	}
	public function index(){
		$crud 	= new grocery_CRUD();

		$crud->set_table('deskripsi_nilai_prilaku');
		$crud->set_subject('Pengaturan Deskripsi Nilai');
		$crud->display_as('nilai_deskripsi', 'Nilai');
		$crud->unset_add();
		$crud->unset_delete();

		$crud->required_fields('nilai_deskripsi', 'deskripsi', 'jenis_nilai_deskripsi');

		$crud->callback_column('nilai_deskripsi',array($this,'nilai_callback'));

		$output = $crud->render();
		$data['judul'] 	= 'Pengaturan Deskripsi Nilai';
		$view 			= 'grocery';
		$template 		= 'admin_template';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function nilai_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

}

/* End of file DeskripsiNilai.php */
/* Location: ./application/modules/DeskripsiNilai/controllers/DeskripsiNilai.php */