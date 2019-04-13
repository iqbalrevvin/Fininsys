<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}
	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_table('peserta_didik');
		$crud->set_subject('Data Peserta Didik');

		$crud->set_field_upload('foto_pd', 'assets/image/foto_pd');


		$crud->display_as('nama_pd', 'Nama Peserta Didik');
		$crud->display_as('NIK_pd', 'NIK Peserta Didik');
		$crud->display_as('jk_pd', 'Jenis Kelamin');
		$crud->display_as('tempat_lahir_pd', 'Tempat Lahir');



		$crud->required_fields('NIK_pd','nama_pd', 'jk_pd', 'tempat_lahir_pd', 'agama');

		$crud->callback_column('nama_pd', array($this,'nama_callback'));

		$output 			= $crud->render();
		$data['judul'] 		= 'Daftar Pesera Didik';
		$template 			= 'admin_template';
		$view 				= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function nama_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

}

/* End of file datapd.php */
/* Location: ./application/controllers/PesertaDidik/datapd.php */