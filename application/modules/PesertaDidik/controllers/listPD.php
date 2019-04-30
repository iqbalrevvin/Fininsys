<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
		$this->load->model('PesertaDidik_m');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_table('peserta_didik');
		$crud->set_subject('Data Utama Peserta Didik');

		$crud->display_as('nama_pd', 'Nama Peserta Didik');
		$crud->display_as('NIK_pd', 'NIK Peserta Didik');
		$crud->display_as('jk_pd', 'Jenis Kelamin');
		$crud->display_as('tempat_lahir_pd', 'Tempat Lahir');
		$crud->display_as('facebook', 'Link Facebook');
		$crud->display_as('instagram', 'Link Instagram');
		$crud->display_as('twitter', 'Link Twitter');
		$crud->display_as('idSekolah', 'Sekolah');
		$crud->columns('NIK_pd', 'nama_pd', 'tempat_lahir_pd', 'tanggal_lahir_pd', 'jk_pd', 'no_telp_pd', 'idSekolah');
		$crud->add_action('Profil', 'fa fa-user', '', '',array($this,'profilLink'));
		$crud->set_rules('NIK_pd','NIK Siswa','required|numeric|max_length[16]|min_length[16]');
		$crud->set_rules('email_tenpen','Email','valid_email');
		$crud->unset_read();
		$crud->set_field_upload('foto_pd', 'assets/image/foto_pd');
		/*RELASI*/
		$crud->set_relation('idSekolah','sekolah','nama_sekolah');
		/*-----------------------------------------------*/
		$crud->unset_add_fields('kelurahan','kecamatan', 'kota', 'provinsi', 'alamat');
		$crud->unset_edit_fields('kelurahan','kecamatan', 'kota', 'provinsi', 'alamat');

		$crud->required_fields('NIK_pd','nama_pd', 'jk_pd', 'tempat_lahir_pd', 'agama', 'no_telp_pd');
		$crud->callback_after_insert(array($this,'insertDetail'));
		$crud->callback_column('nama_pd',array($this,'nama_callback'));
		#$crud->callback_column('NIK_pd',array($this,'nik_callback'));
		#$crud->callback_insert(array($this,'insert'));
		

		$output = $crud->render();

		$data['judul'] 		= 'Daftar Pesera Didik';
		$template 			= 'admin_template';
		$view 				= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function nama_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

	function nik_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

	function insertDetail($post_array){
		
		$nik 	= $post_array['NIK_pd'];
		$data = [
		    'NIK_pd' => $nik,
		];

		$insertDetail = $this->PesertaDidik_m->insertDetail($data);
		return $insertDetail;
	}

	function profilLink($primary_key, $row){
		return site_url('PesertaDidik/Profil').'?ID='.$row->NIK_pd;
	}

}

/* End of file datapd.php */
/* Location: ./application/controllers/PesertaDidik/datapd.php */