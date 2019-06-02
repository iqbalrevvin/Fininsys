<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');	
		$this->load->model('Home_m');	
	}

	public function index(){
		$jumlahSekolah  	= $this->Home_m->jumlahSekolah();
		$jumlahProgramStudi = $this->Home_m->jumlahProgramStudi();
		$jumlahKelas 		= $this->Home_m->jumlahKelas();
		$jumlahPD  			= $this->Home_m->jumlahPDMasukKelas();
		$jumlahPDFull 		= $this->Home_m->jumlahPDFull();
		$PDNullKelas 		= $this->Home_m->jumlahPDnullKelas();
		$jumlahTenpen  		= $this->Home_m->jumlahTenpen();
		$data = [
		    'judul'	 				=> 'Beranda',
		    'jumlahSekolah' 		=> $jumlahSekolah, 
		    'jumlahProgramStudi' 	=> $jumlahProgramStudi,
		    'jumlahKelas' 			=> $jumlahKelas,
		    'jumlahPD' 				=> $jumlahPD,
		    'PDNullKelas' 			=> $PDNullKelas,
		    'jumlahPDFull' 			=> $jumlahPDFull,
		    'jumlahTenpen' 			=> $jumlahTenpen
		];
		$template      	= 'admin_template';
		$view          	= 'home.php';

        $this->outputview->output_admin($view, $template, $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */