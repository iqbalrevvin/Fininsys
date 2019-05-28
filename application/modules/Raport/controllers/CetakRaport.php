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
        $html=$this->load->view('CetakRaport/testMpdf.php', $data, true);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output('test.pdf', 'I');   
    }

    public function selfPrintCover(){
        $siswaID                    = $this->input->get('StudentID');
        $masterID                   = $this->input->get('MasterID');
        $data['pengaturan']         = $this->GetData_m->dataPengaturan();
        $data['identitasSekolah']   = $this->CetakRaport_m->getIdentitasSekolah($masterID);
        $data['identitasPD']        = $this->CetakRaport_m->getIdentitasPD($siswaID);
        #$data['test']               = $NIK; 
        
        $this->load->view('CetakRaport/test', $data);

    }

}

/* End of file CetakRaport.php */
/* Location: ./application/modules/Raport/controllers/CetakRaport.php */