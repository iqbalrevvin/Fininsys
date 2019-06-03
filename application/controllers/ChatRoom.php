<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatRoom extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
	}

	public function index(){
		$data['judul'] 		= 'Ruang Pesan';
		$view             	= 'chatRoom';
		$template         	= 'admin_template';
		$this->outputview->output_admin($view, $template, $data);
	}

}

/* End of file ChatRoom.php */
/* Location: ./application/controllers/ChatRoom.php */