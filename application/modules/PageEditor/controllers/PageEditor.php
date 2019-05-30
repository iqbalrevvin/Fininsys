<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageEditor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
	}

	public function index(){
		$data['judul'] 	= "Editor Halaman";
		$view 			= 'editorViewer';
		$template 		= 'admin_template';
		$this->outputview->output_admin($view, $template, $data);
	}

}

/* End of file PageEditor.php */
/* Location: ./application/modules/PageEditor/controllers/PageEditor.php */