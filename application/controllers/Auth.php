<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('language');
		$this->lang->load('auth');
		$this->load->library('OutputView');		
	}

	function index()
	{
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}else{
			redirect('home');
		}
	}

	public function login()
	{
		if (!$this->ion_auth->logged_in()){
			$data['redirect'] 	= site_url('home');
			$data['error'] 		= $this->ion_auth->errors();
 			$view             	= 'auth/login';
			$template         	= 'auth_template';
			$this->outputview->output_front($view, $template, $data);
		}else{
			redirect('home');
		}
		
	}

	function ajax_login()
	{
		$remember = (bool) $this->input->post('remember');
	
		if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
			$callback = [
			    'status' 	=> 'true',
			    'pesan' 	=> 'Login Berhasil' 
			];
		}else{
			$callback = [
			    'status' 	=> 'false',
			    'pesan' 	=> $this->ion_auth->errors() 
			];
			#echo "false";
			#echo "test";
		}
		echo json_encode($callback);
	}

	public function logout()
	{
		$logout = $this->ion_auth->logout();
		redirect('auth/login');
	}

}
