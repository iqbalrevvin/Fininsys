<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->model('PesertaDidik/PesertaDidik_m');
		$this->load->helper('fotoGender_helper');
		$this->load->helper('tglIndo_helper');
		$this->load->helper('semester_helper');
		$this->load->helper('grade_helper');
	}
	public function index(){
		#$id 			= $this->input->post('ID');
		#$data['profil'] = $this->PesertaDidik_m->profil($id);
		$id 			= $this->input->get('ID');
		$profil 		= $this->PesertaDidik_m->getNameProfil($id);
		#$data['judul'] 	= 'Profil Peserta Didik('.$id.')';
		$data['crumb']  = [
							'Peserta Didik' => 'PesertaDidik',
							$profil->nama_pd => ''
						];
		$template      	= 'admin_template';
		$view          	= 'PesertaDidik/profil.php';
        $this->outputview->output_admin($view, $template, $data);
	}

	public function getProfil(){
		$id 			= $this->input->post('ID');
		$data['profil'] = $this->PesertaDidik_m->profil($id);

        $this->load->view('getProfil', $data);
	}

}

/* End of file ProfilPD.php */
/* Location: ./application/controllers/PesertaDidik/ProfilPD.php */