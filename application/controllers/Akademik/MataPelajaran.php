<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPelajaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}

	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_table('mata_pelajaran');
		$crud->set_subject('Daftar Mata Pelajaran');
		$crud->columns('nama_mata_pelajaran', 'idKurikulum', 'idKelompok_mapel', 'sekolah');
		$crud->display_as('idKurikulum', 'Kurikulum');
		$crud->display_as('idKelompok_mapel', 'Kelompok Mapel');
		$crud->display_as('no_urut_mapel', 'No. Urut');
		$crud->display_as('singkatan_mata_pelajaran', 'Singkatan Mapel');
		#$crud->order_by('no_urut_mapel', 'asc');

		/*RELATION*/
		$crud->set_relation('idKurikulum','kurikulum','nama_kurikulum');
		$crud->set_relation('idKelompok_mapel','kelompok_mapel','nama_kelompok_mapel');

		/*VALIDATION*/
		$crud->required_fields('idKurikulum', 'idKelompok_mapel', 'nama_mata_pelajaran', 'singkatan_mata_pelajaran');
		#$crud->set_rules('npsn', 'NPSN', 'required|min_length[8]|max_length[8]');
		/*------------*/

		/*CALLBACK*/
		$crud->callback_column('sekolah',array($this,'sekolah_callback'));
		$crud->callback_column('nama_mata_pelajaran',array($this,'nama_callback'));
		/*--------------*/

		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Mata Pelajaran';
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function sekolah_callback($value, $row){
		$this->db->select('*');
		$this->db->from('mata_pelajaran');
		$this->db->join('kurikulum', 'mata_pelajaran.idKurikulum = kurikulum.idKurikulum', 'left');
		$this->db->join('sekolah', 'kurikulum.idSekolah = sekolah.idSekolah', 'left');
		$this->db->where('idMata_pelajaran', $row->idMata_pelajaran);
		$query = $this->db->get();
		$execute = $query->row();
		$sekolah = $execute->nama_sekolah;

		$value = $sekolah;
		return $sekolah;
	}


	function nama_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

}

/* End of file MataPelajaran.php */
/* Location: ./application/controllers/Akademik/MataPelajaran.php */