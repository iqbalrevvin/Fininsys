<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelompokMapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('kelompok_mapel');
		$crud->set_subject('Daftar Kelompok Mapel');
		$crud->columns('nama_kelompok_mapel', 'keterangan');

		/*RELATION*/
		
		/*VALIDATION*/
		$crud->required_fields('nama_kelompok');

		/*Callback*/
		$crud->callback_column('nama_kelompok_mapel',array($this,'nama_callback'));
		/*-----------------------------------*/

		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Sekolah';;
		$data['crumb'] 	= ['Sekolah' => ''];
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function nama_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

}

/* End of file KelompokMapel.php */
/* Location: ./application/controllers/Akademik/KelompokMapel.php */