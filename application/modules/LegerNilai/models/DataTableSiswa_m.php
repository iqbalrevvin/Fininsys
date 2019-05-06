<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataTableSiswa_m extends CI_Model {

	var $table = 'peserta_didik';
	var $column_order = array(null,'nama_pd','jk_pd','nipd','nisn', 'nama_sekolah'); //set column field database for datatable orderable
	var $column_search = array('detail_peserta_didik.NIK_pd','nama_pd','nipd', 'nama_sekolah'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('peserta_didik.NIK_pd' => 'desc'); // default order 
	
		//SERVERSIDE PILIH SISWA
	private function _get_datatables_query(){
		
		$this->db->from($this->table);
		$this->db->join('detail_peserta_didik', 'peserta_didik.NIK_pd = detail_peserta_didik.NIK_pd', 'left');
		$this->db->join('sekolah', 'peserta_didik.idSekolah= sekolah.idSekolah', 'left');
		$this->db->join('kelas', 'detail_peserta_didik.idKelas = kelas.idKelas', 'left');
		//$this->db->where('detail_peserta_didik.idKelas', Null);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($this->input->post('search')) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])){ // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables(){
		$this->_get_datatables_query();
		if($this->input->post('length') != -1)
		$this->db->limit($this->input->post('length'), $this->input->post('start'));
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}

/* End of file DataTableSiswa_m.php */
/* Location: ./application/modules/LegerNilai/models/DataTableSiswa_m.php */