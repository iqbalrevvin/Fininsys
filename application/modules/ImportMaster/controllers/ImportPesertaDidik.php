<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportPesertaDidik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');

	}
	private $filename = "import_data";
	public function DataUtama(){
		$data = array();
		if($this->input->post('previewImport')){
			$this->load->library('upload');
			$config['upload_path'] = './excel/';
			$config['allowed_types'] = 'xlsx';
			$config['max_size']	= '2048';
			$config['overwrite'] = true;
			$config['file_name'] = $this->filename;
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileImport')){
				$upload = ['result' => 'success', 'file' => $this->upload->data(), 'error' => ''];
			}else{
				$upload = ['result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors()];
			}
			if($upload['result'] == 'success'){
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				$excelreader 	= new PHPExcel_Reader_Excel2007();
				$loadexcel 		= $excelreader->load('excel/'.$this->filename.'.xlsx');
				$sheet 			= $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				$data['sheet'] 	= $sheet; 
			}else{
				$data['upload_error'] = $upload['error'];
			}
		}

		$data['judul']  = 'Import Data Utama Peserta Didik';
		$template 		= 'admin_template';
		$view 			= 'PesertaDidik/dataUtama';

		$this->outputview->output_admin($view, $template, $data);
	}

}

/* End of file PesertaDidik.php */
/* Location: ./application/modules/ImportMaster/controllers/PesertaDidik.php */