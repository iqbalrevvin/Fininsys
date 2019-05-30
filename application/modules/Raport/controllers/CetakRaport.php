<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakRaport extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('pdf');
        $this->load->library('OutputView');
        $this->load->library('M_pdf');
        $this->load->model('GetData_m');
        $this->load->model('CetakRaport_m');
        $this->load->helper('tglindo_helper');
        $this->load->helper('grade_helper');
        $this->load->helper('value_helper');
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
        $siswaID        = $this->input->get('StudentID');
        $masterID       = $this->input->get('MasterID');
        $titimangsa     = $this->input->get('DateOfDistribution');
        $kontenHal2     = $this->CetakRaport_m->kontenHal2();

        $data = [
            'pengaturan'        => $this->GetData_m->dataPengaturan(),
            'identitasSekolah'  => $this->CetakRaport_m->getIdentitasSekolah($masterID),
            'identitasPD'       => $this->CetakRaport_m->getIdentitasPD($siswaID),
            'titimangsa'        => $titimangsa,
            'kontenHal2'        => $kontenHal2,
        ];
        /*INIT PDF*/
        $pdf            = $this->m_pdf->pdf;
        $pdfFileName    = "Raport-".$siswaID.".pdf";
        /*-----------------------------------------*/
        /*INIT PAGE*/
        $hal1           = $this->load->view('CetakRaport/RaportIndividu/Cover/hal1', $data, true);
        $hal2           = $this->load->view('CetakRaport/RaportIndividu/Cover/hal2', $data, true);
        $hal3           = $this->load->view('CetakRaport/RaportIndividu/Cover/hal3', $data, true);
        /*---------------------------------------------------------------------------*/
        /*INIT CONTENT*/
        $pdf->AddPage('P','','','','',0,0,15,15,10,10);
        $pdf->WriteHTML($hal1);
        $pdf->AddPage('P','','','','',20,10,15,15,10,10);
        $pdf->WriteHTML($hal2);
        $pdf->AddPage('P','','','','',20,10,15,15,10,10);
        $pdf->WriteHTML($hal3);
        /*--------------------------------------*/

        $pdf->Output($pdfFileName, 'I');   

    }

}

/* End of file CetakRaport.php */
/* Location: ./application/modules/Raport/controllers/CetakRaport.php */