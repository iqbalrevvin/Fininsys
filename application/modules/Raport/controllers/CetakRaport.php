<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakRaport extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
	}
	public function index(){
		$this->load->view('error_page/error');
	}

	public function SelfPrint(){

		
		/*$view = $this->load->view('CetakRaport/test',$data,true);*/
		 $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        $pdf->Cell(27,6,'NO HP',1,0);
        $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('peserta_didik')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->nipd,1,0);
            $pdf->Cell(85,6,$row->nama_pd,1,0);
            $pdf->Cell(27,6,$row->no_telp_pd,1,0);
            $pdf->Cell(25,6,$row->tanggal_lahir_pd,1,1); 
        }
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);


/* --- Cell --- */
$pdf->SetXY(47, 38);
$pdf->Cell(0, 4, 'Cell', 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(11, 44);
$pdf->Cell(0, 4, 'Cell', 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(61, 52);
$pdf->Cell(0, 4, 'Cell', 0, 1, 'L', false);
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);


/* --- Cell --- */
$pdf->Cell(20,6,'NIM',0,0);
$pdf->Cell(173, 4, 'Cell', 0, 1);
/* --- Cell --- */

$pdf->Cell(176, 4, 'Cell', 0, 1);
/* --- Write --- */
$pdf->SetY(26);
$pdf->Write(5, 'Write');
/* --- Text --- */
$pdf->Text(11, 38, 'Textsdfasff');
        $pdf->Output();
	}

}

/* End of file CetakRaport.php */
/* Location: ./application/modules/Raport/controllers/CetakRaport.php */