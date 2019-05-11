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
		$i 				= $this->input;
		$id 			= $i->post('ID');
		$data['profil'] = $this->PesertaDidik_m->profil($id);

        $this->load->view('getProfil', $data);
	}

	public function editProfilPD(){
		$i 			= $this->input;
		$id 		= $this->input->post('NIK_pd');
		$validate 	= $this->form_validation;
		$validate->set_rules('nama', 'Nama Peserta Didik', 'required|max_length[100]');
		$validate->set_rules('tempatLahir', 'Tempat Lahir', 'required');
		$validate->set_rules('tanggalLahir', 'Tanggal Lahir', 'required');

		if ($validate->run() == TRUE){
			$data = [
			    'nama_pd' 				=> $i->post('nama'),
			    'jk_pd' 				=> $i->post('JK'),
			    'agama' 				=> $i->post('agama'),
			    'tempat_lahir_pd' 		=> $i->post('tempatLahir'),
			    'tanggal_lahir_pd' 		=> $i->post('tanggalLahir'),
			];
			$this->PesertaDidik_m->editProfilPD($id, $data);
			$callback = [
			    'status' 	=> 'sukses',
			    'title' 	=> 'Proses Berhasil',
			    'pesan' 	=> 'Data Utama Peserta Didik Berhasil Diperbarui' 
			];
		}else{
			$callback = [
			    'status' 	=> 'gagal',
			    'title' 	=> 'Proses Gagal',
			    'pesan' 	=> validation_errors()
			];
		}
		echo json_encode($callback);	
	}

}

/* End of file ProfilPD.php */
/* Location: ./application/controllers/PesertaDidik/ProfilPD.php */