<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('tahun_ajaran');
		$crud->order_by('nama_tahun_ajaran', 'DESC');
		$crud->set_subject('Daftar Tahun Ajaran');
		#$crud->columns('');

		
		/*RELATION*/
		

		/*VALIDATION*/
		$crud->required_fields('nama_tahun_ajaran');
		$crud->unique_fields(array('nama_tahun_ajaran'));
		/*------------*/

		/*CALLBACK*/
		#$crud->callback_column('npsn',array($this,'npsn_callback'));
		/*--------------*/


		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Tahun Ajaran';
		#$data['crumb'] 	= ['Sekolah' => ''];
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
		
	}

}

/* End of file TahunAjaran.php */
/* Location: ./application/controllers/Akademik/TahunAjaran.php */