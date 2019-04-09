<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('sekolah');
		$crud->set_subject('Daftar Sekolah');
		$crud->columns('logo_sekolah', 'npsn', 'nama_sekolah', 'alamat_sekolah');

		$crud->set_field_upload('logo_sekolah', 'assets/image/logosekolah');

		/*RELATION*/
		$crud->set_relation('desa_sekolah','alamat_desa','nama_desa');
		$crud->set_relation('kecamatan_sekolah','alamat_kecamatan','nama_kecamatan');
		$crud->set_relation('kabupaten_sekolah','alamat_kabupaten','nama_kabupaten');
		$crud->set_relation('provinsi_sekolah','alamat_provinsi','nama_provinsi');

		/*VALIDATION*/
		$crud->required_fields('npsn', 'nama_sekolah');
		$crud->set_rules('npsn', 'NPSN', 'required|min_length[8]|max_length[8]');
		$crud->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
		/*------------*/

		/*CALLBACK*/
		$crud->callback_column('npsn',array($this,'npsn_callback'));
		/*--------------*/


		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Sekolah';;
		$data['crumb'] 	= ['Sekolah' => ''];
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);

	}

	function npsn_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

	// public function index(){
	// 	$data['judul'] 		= 'Daftar Sekolah';
	// 	$template 			= 'admin_template';
	// 	$view 				= 'lembaga/sekolah.php';

	// 	$this->outputview->output_admin($view, $template, $data);
	// }

}

/* End of file Sekolah.php */
/* Location: ./application/controllers/lembaga/Sekolah.php */