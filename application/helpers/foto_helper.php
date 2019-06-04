<?php 
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
?>