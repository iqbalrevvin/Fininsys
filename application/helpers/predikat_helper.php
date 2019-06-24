<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if (! function_exists('predikatNilai')){
		function predikatNilai($kkm, $nilai){
			$nilaiMaksimum = 100;
			$nilaiKKM = $kkm;
			$nilai = $nilai;

			$intervalPredikat = ($nilaiMaksimum-$nilaiKKM)/3;

			$nilaiA 	= ($nilaiMaksimum-$intervalPredikat);
			$nilaiB 	= $nilaiA-$intervalPredikat;
			$nilaiC 	= $nilaiB-$intervalPredikat;
			$nilaiD 	= $nilaiC-$intervalPredikat;


			if($nilai >= $nilaiA && $nilai <= $nilaiMaksimum ){
				$predikat = 'A';
			}else if($nilai >= $nilaiB && $nilai <= $nilaiA ){
				$predikat = 'B';
			}else if($nilai >= $nilaiC && $nilai <= $nilaiB ){
				$predikat = 'C';
			}else if($nilai >= $nilaiD && $nilai <= $nilaiC ){
				$predikat = 'D';
			}else{
				$predikat = 'E';
			}

			return $predikat;
		}	
	}