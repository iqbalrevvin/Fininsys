<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakulikuler extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}

	public function index(){

		$crud 		= new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('ekstrakulikuler');
		$crud->order_by('nama_ekstrakulikuler', 'ASC');
		$crud->set_subject('Daftar Ekstrakulikuler');
		#$crud->columns('');

		
		/*RELATION*/
		
		/*VALIDATION*/
		$crud->required_fields('nama_ekstrakulikuler');
		$crud->unique_fields(array('nama_ekstrakulikuler'));
		/*------------*/

		/*CALLBACK*/
		$crud->callback_column('nama_ekstrakulikuler',array($this,'nama_callback'));
		/*--------------*/


		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Ekstrakulikuler';
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

/* End of file Ekstrakulikuler.php */
/* Location: ./application/controllers/Akademik/Ekstrakulikuler.php */