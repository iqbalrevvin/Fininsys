<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('jabatan');
		$crud->set_subject('Daftar Jabatan');
		$crud->order_by('nama_jabatan','desc');
		#$crud->columns('');
		#$crud->display_as('');

		#$crud->set_field_upload('');

		/*RELATION*/
		#$crud->set_relation('','','');

		/*VALIDATION*/
		$crud->required_fields('nama_jabatan');
		#$crud->set_rules('', '', '');
		/*------------*/

		/*CALLBACK*/
		#$crud->callback_column('',array($this,''));
		
		/*--------------*/


		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Jabatan';
		#$data['crumb'] 	= ['Sekolah' => ''];
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Sekolah/Jabatan.php */