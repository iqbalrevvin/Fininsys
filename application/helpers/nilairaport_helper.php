<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('nilai')){
	function nilai($kkm, $nilai){
		if($nilai < $kkm) {
			$result = "<b style='color:red;'>".$nilai."</b>";
		}else{
			$result = "<b>".$nilai."</b>";
		}
		return $result;
	}
}
if (! function_exists('nilaiIP')){
	function nilaiIP($nilai){
		$nilaiIP = $nilai/100*4;
		$result = number_format($nilaiIP, 2);
		return $result;
	}
}
if (! function_exists('nilaiPredikat')){
	function nilaiPredikat($nilaiIP){
		if($nilaiIP >= 3.85 && $nilaiIP <= 4.00){
			$result = 'A';
		}elseif($nilaiIP >= 3.51 && $nilaiIP <= 3.84){
			$result = 'A-';
		}elseif($nilaiIP >= 3.18 && $nilaiIP <= 3.50){
			$result = 'B+';
		}elseif($nilaiIP >= 3.18 && $nilaiIP <= 3.50){
			$result = 'B+';
		}elseif($nilaiIP >= 2.85 && $nilaiIP <= 3.17){
			$result = 'B';
		}elseif($nilaiIP >= 2.51 && $nilaiIP <= 2.84){
			$result = 'B-';
		}elseif($nilaiIP >= 2.18 && $nilaiIP <= 2.50){
			$result = 'C+';
		}elseif($nilaiIP >= 1.85 && $nilaiIP <= 2.17){
			$result = 'C';
		}elseif($nilaiIP >= 1.51 && $nilaiIP <= 1.84){
			$result = 'C-';
		}elseif($nilaiIP >= 1.18 && $nilaiIP <= 1.50){
			$result = 'D+';
		}elseif($nilaiIP >= 1.00 && $nilaiIP <= 1.17){
			$result = 'D';
		}else{
			$result = 'E';
		}
		return $result;
	}
	if (! function_exists('catatanGuruMapel')){
	function catatanGuruMapel($catatan){
		if($catatan == NULL){
			$result = '<i><small>Belum Diisi</small></i>';
		}else{
			$result = $catatan;
		}
		return $result;
	}
}
}
