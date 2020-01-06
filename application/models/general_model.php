<?php

	class general_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData($cari = false){
			
			if ($cari)
				$this->db->like('tanggal_insert',$cari);
			
			
			$data = $this->db->select('*')
							 ->from('buku_besar')							 
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function getDataPart()
		{
			$this->db->select('kode_akun, nama_akun');
			$akun = $this->db->get('akun')->result();
			
			$output = array();
			foreach($akun as $row){
				$this->db->select('kode_bukubesar, tanggal_insert, debet, kredit, keterangan');
				$this->db->where('kode_akun', $row->kode_akun);
				$buku = $this->db->get('buku_besar')->result_array();
				
				if($buku){
					$output[] = array(
						'nama_akun' => $row->nama_akun,
						'kode_akun' => $row->kode_akun,
						'buku' => $buku
					);
				}
			}
							 
			return $output;	
		}
		
	
	}

?>