<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
		$this->load->model('PesertaDidik_m');
		$this->load->model('application/modules/Legernilai/Legernilai_m');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_table('peserta_didik');
		$crud->set_subject('Data Utama Peserta Didik');

		$crud->display_as('nama_pd', 'Nama');
		$crud->display_as('NIK_pd', 'NIK Peserta Didik');
		$crud->display_as('jk_pd', 'Jenis Kelamin');
		$crud->display_as('tempat_lahir_pd', 'Tempat Lahir');
		$crud->display_as('tanggal_lahir_pd', 'Tanggal Lahir');
		$crud->display_as('facebook', 'Link Facebook');
		$crud->display_as('instagram', 'Link Instagram');
		$crud->display_as('twitter', 'Link Twitter');
		$crud->display_as('idSekolah', 'Sekolah');
		$crud->display_as('email_pd', 'Email');
		$crud->display_as('no_telp_pd', 'No. Hp');
		$crud->display_as('status_pd', 'Status');
		$crud->display_as('tahun_angkatan', 'Angkatan');
		$crud->columns('NIK_pd', 'nama_pd', 'tahun_angkatan', 'nipd', 'jk_pd', 'idSekolah', 'status_pd');
		$crud->unset_columns(['idProvinsi']);
		$crud->add_action('Profil', 'fa fa-user', '', '',array($this,'profilLink'));
		$crud->set_rules('NIK_pd','NIK Siswa','required|numeric|max_length[16]|min_length[16]');
		$crud->set_rules('tahun_angkatan','Tahun Angkatan','required|numeric|max_length[4]|min_length[4]');
		$crud->set_rules('nisn','NISN','required|numeric|max_length[10]|min_length[10]');
		$crud->set_rules('nipd','NIPD','required|numeric|max_length[10]');
		$crud->set_rules('email_pd','Email','valid_email');
		$crud->unset_read();
		$crud->set_field_upload('foto_pd', 'assets/image/foto_pd');
		/*RELASI*/
		$crud->set_relation('idSekolah','sekolah','nama_sekolah');
		/*-----------------------------------------------*/
		#$crud->add_fields('idSekolah','tahun_angkatan','NIK_pd', 'nama_pd', 'jk_pd', 'tampat_lahir_pd', 'tanggal_lahir_pd', 'agama', 'no_telp_pd', 'email_pd', 'foto_pd', 'facebook', 'instagram', 'twitter');
		$crud->unset_add_fields('idProvinsi','idKabupaten', 'idKecamatan', 'idKelurahan', 'alamat');
		$crud->unset_edit_fields('idProvinsi','idKabupaten', 'idKecamatan', 'idKelurahan', 'alamat');

		/*LIST DATA TAHUN AJARAN*/
		$listTahunAngkatan = $this->Legernilai_m->getTahunAjaran();
		$finalArray = array();
		foreach ($listTahunAngkatan->result() as $row){
				$finalArray[substr($row->nama_tahun_ajaran,0,4)]=$row->nama_tahun_ajaran;
		}
		$crud->field_type('tahun_angkatan','dropdown',$finalArray);
		/*----------------------------------------------------*/

		$crud->required_fields('NIK_pd','tahun_angkatan','nisn','nipd','nama_pd', 'jk_pd', 'tempat_lahir_pd', 'agama', 'no_telp_pd');
		$crud->callback_after_insert(array($this,'insertDetail'));
		$crud->callback_column('nama_pd',array($this,'nama_callback'));
		$crud->callback_column('status_pd',array($this,'status_callback'));
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

	function status_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}
	function nik_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

	function insertDetail($post_array){
		
		$nik 			= $post_array['NIK_pd'];
		#$tahunAngkatan 	= $post_array['tahun_angkatan'];
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
