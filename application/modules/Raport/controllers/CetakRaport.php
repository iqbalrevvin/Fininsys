<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakRaport extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
        $this->load->library('OutputView');
        $this->load->library('M_pdf');
        $this->load->model('GetData_m');
        $this->load->model('CetakRaport_m');
	}
	public function index(){
		$this->load->view('error_page/error');
	}

	public function SelfPrint(){
		$data = [];
        $html=$this->load->view('CetakRaport/RaportIndividu/Cover/hal1', $data, true);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output('test.pdf', 'I');   
    }

    public function selfPrintCover(){
        $data = [];
        $html=$this->load->view('CetakRaport/testMpdf.php', $data, true);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output('test.pdf', 'I');   

    }

}

/* End of file CetakRaport.php */
/* Location: ./application/modules/Raport/controllers/CetakRaport.php */