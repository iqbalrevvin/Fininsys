<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('value')){
	function value($value){
		if($value == ''){
			$getValue = 'Belum Diisi';
		}else{
			$getValue = $value;
		}
		return $getValue;
	}
}
if (! function_exists('valueCekKelas')){
	function valueCekKelas($value){
		if($value == ''){
			$getValue = '<i>Belum Masuk Kelas</i>';
		}else{
			$getValue = $value;
		}
		return $getValue;
	}
}
if(! function_exists('valueRaport')){
	function valueRaport($value){
		if($value == ''){
			$getValue = '-';
		}else{
			$getValue = $value;
		}
		return $getValue;
	}
}
if(! function_exists('valueRaport2')){
	function valueRaport2($value){
		if($value == ''){
			$getValue = '(Belum Ditetapkan)';
		}else{
			$getValue = $value;
		}
		return $getValue;
	}
}