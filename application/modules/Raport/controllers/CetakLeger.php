<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakLeger extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('M_pdf');
	}
	public function index(){
		$masterID 	= $this->input->get('MasterID');
		$kelasID 	= $this->input->get('KelasID');
		$angkatan 	= $this->input->get('angkatan');
		$semester 	= $this->input->get('semester');

		$data = [
			'masterID' 	=> $masterID,
			'kelasID' 	=> $kelasID,
			'angkatan' 	=> $angkatan,
			'semester' 	=> $semester
		];
		/*INIT PDF*/
        $pdf            = $this->m_pdf->pdf;
        $pdfFileName    = "Legger-KelasID=".$kelasID.".pdf";
        /*-----------------------------------------*/
        /*INIT PAGE*/
        $hal1           = $this->load->view('CetakLeger/hal1', $data, true);
        /*---------------------------------------------------------------------------*/
        /*INIT CONTENT*/
        $pdf->AddPage('L','','','','',0,0,15,15,10,10);
        $pdf->WriteHTML($hal1);
        /*--------------------------------------*/
        $pdf->Output($pdfFileName, 'I');   
	}

}

/* End of file CetakLeger.php */
/* Location: ./application/modules/Raport/controllers/CetakLeger.php */