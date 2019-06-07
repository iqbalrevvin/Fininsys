<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportPesertaDidik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('OutputView');
		$this->load->model('Importmaster_m');
	}
	private $filename = "import-data-utama_pd";
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

	public function importDataUtama(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		#$data = array();
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				$data = array(
					'idSekolah'			=>$row['A'], 
					'NIK_pd'			=>$row['B'],
					'tahun_angkatan'	=>$row['C'], 
					'nisn'				=>$row['D'], 
					'nipd'				=>$row['E'], 
					'nama_pd'			=>$row['F'], 
					'jk_pd'				=>$row['G'], 
					'tempat_lahir_pd'	=>$row['H'], 
					'tanggal_lahir_pd'	=>$row['I'], 
					'agama'				=>$row['J'], 
					'no_telp_pd'		=>$row['K'], 
					'email_pd'			=>$row['L'], 
					'facebook'			=>$row['M'], 
					'instagram'			=>$row['N'],
					'twitter'			=>$row['O'],
				);
				$this->Importmaster_m->importDataUtama($data);
				$affrow = $this->db->affected_rows();
			}
			#$numrow++;
			$numr[] = $numrow++;
			if($affrow) {
				$masuk[] = $affrow++;
			}
			
			
		}
		
		$jumlahData = count($numr)-1;
		$dataMasuk = count($masuk)-1;
		$jumlahGagal = $jumlahData-$dataMasuk;
		$this->session->set_flashdata('suksesImport', '<b>'.$jumlahData. '</b> Data Diproses | <b class="text-success">'.$dataMasuk.'</b> Data Berhasil Terimport | <b class="text-danger">'.$jumlahGagal.'</b> Data Gagal Terimport');

		redirect(base_url('ImportMaster/ImportPesertaDidik/DataUtama'));

	}

}

/* End of file PesertaDidik.php */
/* Location: ./application/modules/ImportMaster/controllers/PesertaDidik.php */