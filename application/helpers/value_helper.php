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