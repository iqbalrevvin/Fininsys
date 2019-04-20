<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('fotoGender')){
	function fotoGender($foto, $JK){
		if($foto == ''){
			if($JK == 'Laki-Laki'){
				$viewFoto = "siswa-L.png";
			}else{
				$viewFoto = "siswa-P.png";
			}
		}else{
			$viewFoto = $foto;
		}
		return $viewFoto;
	}
}

function tester()
{
	$test = "test";
	return $test;
}

?>