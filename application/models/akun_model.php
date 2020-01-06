<?php

	class akun_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getDatas($contains){
			if ($contains != null){
				$query = implode(' and kode_akun != ',$contains);
				$this->db->where('kode_akun != '.$query);
			}
			
			$data = $this->db->select('*')
							 ->from('akun')							 
							 ->get()
							 ->result_array();
							 
			return $data;				 
			
		}
		
		public function getData($cari = false){
			
			if ($cari)
				$this->db->like('nama_akun',$cari);
			
			
			$data = $this->db->select('*')
							 ->from('akun')							 
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('akun')
							 ->where('kode_akun', $id)
							 ->get()
							 ->row_array();
							 
			return $data;	
		}
			
		public function insert($data){
			return $this->db->insert('akun', $data);			
		}
			
		public function update($data, $id) {
			return $this->db->update('akun', $data, array('kode_akun' => $id));
		}	
	}

?>