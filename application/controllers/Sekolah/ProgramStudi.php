<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramStudi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}
	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_table('program_studi');
		$crud->set_subject('Daftar Sekolah');
		#$crud->columns('');
		$crud->display_as('idSekolah', 'Sekolah');

		#$crud->set_field_upload('');

		/*RELATION*/
		$crud->set_relation('idSekolah','sekolah','nama_sekolah');

		/*VALIDATION*/
		$crud->required_fields('idSekolah', 'nama_prodi', 'singkatan_prodi', 'jumlah_semester');
		$crud->set_rules('jumlah_semester', 'jumlah_semester', 'max_length[2]');
		/*------------*/

		/*CALLBACK*/
		$crud->callback_column('idSekolah',array($this,'sekolah_callback'));
		$crud->callback_column('nama_prodi',array($this,'nama_callback'));
		/*--------------*/


		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Program Studi';;
		#$data['crumb'] 	= ['Sekolah' => ''];
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);

	}

	function sekolah_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}
	function nama_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

}

/* End of file ProgramStudi.php */
/* Location: ./application/controllers/Sekolah/ProgramStudi.php */