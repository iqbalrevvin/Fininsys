<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}

	public function index(){

		$crud 		= new grocery_CRUD();

		$crud->set_table('kurikulum');
		$crud->set_theme('datatables');
		$crud->set_subject('Daftar Kurikulum');
		$crud->columns('nama_kurikulum','idSekolah','idTahun_ajaran');
		$crud->display_as('idSekolah', 'Sekolah');
		$crud->display_as('idTahun_ajaran', 'Tahun Pelajaran');

		/*RELATION*/
		$crud->set_relation('idTahun_ajaran','tahun_ajaran','nama_tahun_ajaran');
		$crud->set_relation('idSekolah', 'sekolah', 'nama_sekolah');	
		/*----------------------------*/

		/*VALIDATION*/
		$crud->required_fields('nama_kurikulum', 'idsekolah', 'idTahun_ajaran');
		/*------------*/

		/*CALLBACK*/
		$crud->callback_column('nama_kurikulum',array($this,'nama_callback'));
		/*--------------*/


		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Kurikulum';
		#$data['crumb'] 	= ['Sekolah' => ''];
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
		
	}

	function nama_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

}

/* End of file Kurikulum.php */
/* Location: ./application/controllers/Akademik/Kurikulum.php */