<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanTenpen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->library('grocery_CRUD');
		$this->load->model('TenagaPendidik/Tenagapendidik_m');
		$this->load->model('JabatanTenpen_m');
	}
	public function index(){

		$crud = new grocery_CRUD();

		$crud->set_table('jabatan_tenpen');
		$crud->set_subject('Jabatan Tenaga Pendidik');
		$crud->display_as('idSekolah', 'Sekolah');
		$crud->display_as('NIK_tenpen', 'Tenaga Pendidik');
		$crud->display_as('idJabatan', 'Jabatan');
		$crud->order_by('NIK_tenpen', 'asc');

		$crud->set_relation('idSekolah','sekolah','nama_sekolah');

		/*LIST DATA TENAGA PENDIDIK*/
		$listTenpen = $this->Tenagapendidik_m->getTenpen();
		$finalArray = array();
		foreach ($listTenpen->result() as $row){
				$finalArray[$row->NIK_tenpen]=$row->nama_tenpen;
		}
		$crud->field_type('NIK_tenpen','dropdown',$finalArray);
		/*----------------------------------------------------*/

		/*LIST DATA JABATAN*/
		$listJabatan = $this->JabatanTenpen_m->getJabatan();
		$finalArray = array();
		foreach ($listJabatan->result() as $row){
				$finalArray[$row->idJabatan]=$row->nama_jabatan;
		}
		$crud->field_type('idJabatan','dropdown',$finalArray);
		/*----------------------------------------------------*/

		$output = $crud->render();
		$data['judul'] = 'Jabatan Tenaga Pendidik';
		$template = 'admin_template';
		$view = 'grocery';

		$this->outputview->output_admin($view, $template, $data, $output);

		
	}

}

/* End of file JabatanTenpen.php */
/* Location: ./application/modules/JabatanTenpen/controllers/JabatanTenpen.php */