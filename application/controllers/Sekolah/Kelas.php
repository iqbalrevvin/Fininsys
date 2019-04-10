<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('outputView');
		$this->load->library('grocery_CRUD');
	}
	public function index(){
		$crud 		= new grocery_CRUD();

		$crud->set_table('kelas');
		$crud->set_subject('Daftar Kelas');
		$crud->columns('sekolah','nama_kelas','idProdi');
		$crud->display_as('idProdi', 'Program Studi');

		#$crud->set_field_upload('');

		/*RELATION*/
		$crud->set_relation('idProdi','program_studi','nama_prodi');
		#$crud->set_relation('idSekolah','sekolah','nama_sekolah');

		/*VALIDATION*/
		$crud->required_fields('idProdi', 'nama_kelas');
		#$crud->set_rules('jumlah_semester', 'jumlah_semester', 'max_length[2]');
		/*------------*/

		/*CALLBACK*/
		$crud->callback_column('sekolah',array($this,'sekolah_callback'));
		$crud->callback_column('nama_kelas',array($this,'kelas_callback'));
		/*--------------*/


		$output 		= $crud->render();
		$data['judul'] 	= 'Daftar Kelas';;
		#$data['crumb'] 	= ['Sekolah' => ''];
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function sekolah_callback($value, $row){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('program_studi', 'kelas.idProdi = program_studi.idProdi', 'left');
		$this->db->join('sekolah', 'program_studi.idSekolah = sekolah.idSekolah', 'left');
		$this->db->where('idKelas', $row->idKelas);
		$query = $this->db->get();
		$execute = $query->row();
		$sekolah = $execute->nama_sekolah;

		$value = $sekolah;
		return $sekolah;
	}

	function kelas_callback($value, $primary_key = null){
		$value = '<b>'.$value.'</b>';
		return $value;
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/Sekolah/Kelas.php */