<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_tenpen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->library('grocery_CRUD');
		$this->load->model('TenagaPendidik_m');
	}
	public function index(){
		$crud 	= new grocery_CRUD();

		$crud->set_table('tenaga_pendidik');
		$crud->set_subject('Tenaga Pendidik');
		$crud->columns('NIK_tenpen', 'nama_tenpen', 'JK_tenpen', 'no_telp_tenpen');
		$crud->display_as('nama_tenpen', 'Nama Tenaga Pendidik');
		$crud->display_as('NIK_tenpen', 'NIK Tenaga Didik');
		$crud->display_as('jk_tenpen', 'Jenis Kelamin');
		$crud->display_as('tempat_lahir', 'Tempat Lahir');
		$crud->display_as('no_telp_tenpen', 'No. Telp Tenpen');
		$crud->add_action('Profil', 'fa fa-user', '', '',array($this,'profilLink'));
		$crud->set_rules('NIK_tenpen','NIK Tenaga Pendidik','required|numeric|max_length[16]|min_length[16]');
		$crud->unset_read();

		#$crud->required_fields('NIK_tenpen','nama_tenpen', 'jk_tenpen', 'agama', 'no_telp_tenpen');

		$crud->set_field_upload('foto_tenpen');
		$crud->unset_add_fields('kelurahan','kecamatan', 'kota', 'provinsi', 'alamat');
		$crud->unset_edit_fields('kelurahan','kecamatan', 'kota', 'provinsi', 'alamat');

		$crud->callback_column('nama_tenpen',array($this,'nama_callback'));
		$crud->callback_after_insert(array($this,'insertDetail'));

		$output = $crud->render();
		$data['judul'] 	= 'Tenaga Pendidik';
		$template      	= 'admin_template';
		$view          	= 'grocery';
        $this->outputview->output_admin($view, $template, $data, $output);
	}

	function nama_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

	function insertDetail($post_array){
		
		$nik 	= $post_array['NIK_tenpen'];
		$data = [
		    'NIK_tenpen' => $nik,
		];

		$insertDetail = $this->TenagaPendidik_m->insertDetail($data);
		return $insertDetail;
	}

	function profilLink($primary_key, $row){
		return site_url('TenagaPendidik/Profil').'?ID='.$row->NIK_tenpen;
	}

}

/* End of file Tenaga_pendidik.php */
/* Location: ./application/modules/TenagaPendidik/controllers/Tenaga_pendidik.php */