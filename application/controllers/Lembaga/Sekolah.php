<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
		$this->load->model('Getdata_m');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('sekolah');
		$crud->set_subject('Daftar Sekolah');
		$crud->columns('logo_sekolah', 'idSekolah', 'npsn', 'nama_sekolah', 'alamat_sekolah', 'email_sekolah');
		$crud->display_as('idSekolah', 'ID');
		$crud->set_field_upload('logo_sekolah', 'assets/image/logosekolah');

		$listDesa = $this->Getdata_m->getDataDesa();
		$finalArray = array();
		foreach ($listDesa as $row){
				$finalArray[$row->nama_desa]=$row->nama_desa;
		}
		$crud->field_type('desa_sekolah','dropdown',$finalArray);

		$listKecamatan = $this->Getdata_m->getDataKecamatan();
		$finalArray = array();
		foreach ($listKecamatan as $row){
				$finalArray[$row->nama_kecamatan]=$row->nama_kecamatan;
		}
		$crud->field_type('kecamatan_sekolah','dropdown',$finalArray);

		$listKabupaten = $this->Getdata_m->getDataKabupaten();
		$finalArray = array();
		foreach ($listKabupaten as $row){
				$finalArray[$row->nama_kabupaten]=$row->nama_kabupaten;
		}
		$crud->field_type('kabupaten_sekolah','dropdown',$finalArray);

		$listProvinsi = $this->Getdata_m->getDataProvinsi();
		$finalArray = array();
		foreach ($listProvinsi as $row){
				$finalArray[$row->nama_provinsi]=$row->nama_provinsi;
		}
		$crud->field_type('provinsi_sekolah','dropdown',$finalArray);


		/*RELATION*/
		/*$crud->set_relation('desa_sekolah','alamat_desa','nama_desa');
		$crud->set_relation('kecamatan_sekolah','alamat_kecamatan','nama_kecamatan');
		$crud->set_relation('kabupaten_sekolah','alamat_kabupaten','nama_kabupaten');
		$crud->set_relation('provinsi_sekolah','alamat_provinsi','nama_provinsi');*/

		/*VALIDATION*/
		$crud->required_fields('npsn', 'nama_sekolah', 'email_sekolah');
		$crud->set_rules('npsn', 'NPSN', 'required|min_length[8]|max_length[8]');
		$crud->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
		$crud->set_rules('email_sekolah', 'E-mail', 'required|valid_email');
		/*------------*/

		/*CALLBACK*/
		$crud->callback_column('npsn',array($this,'npsn_callback'));
		$crud->callback_column('idSekolah',array($this,'id_callback'));
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
	function id_callback($value, $primary_key = null){
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