<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function grade($tglMasuk, $jmlSmst){
  date_default_timezone_set('Asia/Jakarta');
	$date 		= date("Y-m-d");
  if($tglMasuk == NULL){
    $grade = '...';
  }else{
    $tglMasuk   = $tglMasuk."-06-20";
    $timeStart  = strtotime($tglMasuk);
    $timeEnd  = strtotime("$date");
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
    // menghitung selisih bulan
    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
    $angkatan = date("Y",$timeStart);
    $sem = $numBulan/6;
    if($sem<=1){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '1';
      }
    }elseif($sem<=2){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '1';
      }
    }elseif($sem<=3){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '2';
      }
    }elseif($sem<=4){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '2';
      }
    }elseif($sem<=5){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '3';
      }
    }elseif($sem<=6){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '3';
      }
    }elseif($sem<=7){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '4';
      }
    }elseif($sem<=8){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '4';
      }
    }elseif($sem<=9){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '5';
      }
    }elseif($sem<=10){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '5';
      }
    }elseif($sem<=11){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '6';
      }
    }elseif($sem<=12){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '6';
      }
    }elseif($sem<=13){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '7';
      }
    }elseif($sem<=14){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '7';
      }
    }else{
        $grade = "A-".$angkatan."";
    }
    return $grade;
  }
	
}