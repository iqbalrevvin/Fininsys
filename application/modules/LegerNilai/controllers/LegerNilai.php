<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LegerNilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->library('grocery_CRUD');
		$this->load->model('LegerNilai_m');
	}
	public function index(){
		$crud = new grocery_CRUD();

		$crud->set_table('master_leger');
		$crud->set_subject('Master Leger Nilai');
		$crud->display_as('idKelas', 'Kelas');
		$crud->unset_read();
		$crud->add_action('Kelola Nilai', 'fa fa-cog', '', '',array($this,'profilLink'));

		/*LIST DATA KELAS*/
		$listKelas = $this->LegerNilai_m->getKelas();
		$finalArray = array();
		foreach ($listKelas->result() as $row){
				$finalArray[$row->idKelas]=$row->nama_kelas." | $row->nama_sekolah";
		}
		$crud->field_type('idKelas','dropdown',$finalArray);
		/*----------------------------------------------------*/

		$crud->required_fields('idKelas', 'tahun_angkatan', 'semester');

		/*LIST DATA KELAS*/
		$listTahunAngkatan = $this->LegerNilai_m->getTahunAjaran();
		$finalArray = array();
		foreach ($listTahunAngkatan->result() as $row){
				$finalArray[substr($row->nama_tahun_ajaran,0,4)]=$row->nama_tahun_ajaran;
		}
		$crud->field_type('tahun_angkatan','dropdown',$finalArray);
		/*----------------------------------------------------*/

		$output = $crud->render();
		$data['judul']  = 'Master Leger Nilai';
		$template 		= 'admin_template';
		$view 			= 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function profilLink($primary_key, $row){
		return site_url('LegerNilai/KelolaNilai').'?IDMaster='.$primary_key;
	}

	public function KelolaNilai(){
		$idMasterLeger 			= $this->input->get('IDMaster');
		$getMapel 				= $this->LegerNilai_m->getMapel();
		$data['mapel'] 			= $getMapel;
		$data['MasterLeger'] 	= $this->LegerNilai_m->detailLeger($idMasterLeger);
		$view 					= 'KelolaNilai/kontenKelolaNIlai';
		$template 				= 'admin_template';
		$data['crumb'] = array( 
				'Leger Nilai' => 'LegerNilai',
				'Kelola Nilai' => '' 
			);
		
		$this->outputview->output_admin($view, $template, $data);
	}


}

/* End of file LegerNilai.php */
/* Location: ./application/modules/LegerNilai/controllers/LegerNilai.php */