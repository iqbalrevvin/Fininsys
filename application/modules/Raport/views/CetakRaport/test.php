<?php		
		$pdf = new FPDF();
        $pdf->AddPage('P', 'A4');
       /* $pdf->SetAutoPageBreak(true, 10);*/
        /*$pdf->SetFont('Arial', '', 12);*/
        $pdf->SetTopMargin(10);
        $pdf->SetLeftMargin(10);
        $pdf->SetRightMargin(10);

        /*JUDUL DOKUMEN*/
        $pdf->SetXY(10, 15);
        $pdf->SetFont('Times', 'B', 20);
        $pdf->Cell(0, 7, 'LAPORAN HASIL BELAJAR SISWA', 0, 1, 'C', false);
		/*---------------------------------------------------------------------*/

        /*NAMA INSTANSI*/
        $pdf->SetXY(10, 22);
        $pdf->SetFont('Times', '', 20);
        $pdf->Cell(0, 7, $pengaturan->instansi, 0, 1, 'C', false);
        /*--------------------------------------------------------*/
        /*NAMA SEKOLAH*/
        $pdf->SetXY(10, 30);
		$pdf->SetFont('Times', '', 16);
		$pdf->Cell(0, 7, $identitasSekolah->nama_sekolah, 0, 1, 'C', false);
		/*-------------------------------------------------------------------*/
		/*LOGO SEKOLAH*/
		$pdf->Image(base_url('assets/image/logosekolah/'.$identitasSekolah->logo_sekolah),68,58,75,75);
		/*--------------------------------------------------------------------*/
		/*DATA PESERTA DIDIK COVER*/
		$pdf->SetXY(10, 150);
		$pdf->SetFont('Times', '', 16);
		$pdf->Cell(0, 7, 'Nama Peserta Didik', 0, 1, 'C', false);
		$pdf->SetXY(10, 158);
		$pdf->SetFont('Times', 'B', 16);
		$pdf->Cell(0, 7, $identitasPD->nama_pd, 0, 1, 'C', false);

		$pdf->SetXY(10, 175);
		$pdf->SetFont('Times', '', 16);
		$pdf->Cell(0, 7, 'No. Induk Peserta Didik', 0, 1, 'C', false);
		$pdf->SetXY(10, 183);
		$pdf->SetFont('Times', 'B', 16);
		$pdf->Cell(0, 7, $identitasPD->nipd, 0, 1, 'C', false);
		/*-------------------------------------------------------------------*/



        /*OUTPUT*/
        $pdf->Output('created_pdf.pdf','I');