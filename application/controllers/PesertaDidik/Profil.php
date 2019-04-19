<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->model('PesertaDidik/PesertaDidik_m');
	}
	public function index(){
		$id 			= $this->input->get('ID');
		$data['profil'] = $this->PesertaDidik_m->profil($id);
		$data['judul'] 	= 'Profil Peserta Didik';
		$template      	= 'admin_template';
		$view          	= 'PesertaDidik/profil.php';
        $this->outputview->output_admin($view, $template, $data);
	}

	/*public function getProfil(){
		$id 			= $this->input->get('ID');
		$data['profil'] = $this->PesertaDidik_m->profil($id);

        $this->load->view('PesertaDidik/getProfil', $data);
	}*/

}

/* End of file ProfilPD.php */
/* Location: ./application/controllers/PesertaDidik/ProfilPD.php */