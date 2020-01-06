<?php

	class jurnal_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData($cari = false){
			
			if ($cari)
			$this->db->like('kode_jurnal', $cari);
			
			$data = $this->db->select('jurnal_temp.*, pegawai.nama as pegawai')
							 ->from('jurnal_temp')							 
							 ->join('pegawai', "pegawai.kode_pegawai = jurnal_temp.kode_pegawai")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function counter(){
			
			$counter = $this->db->select('count(*) as count')
								->from('jurnal_temp')							 
								->get()
								->row_array();
							 
			return (int)$counter['count'];	
		}
		
		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('jurnal_temp')
							 ->where('kode_jurnal', $id)
							 ->get()
							 ->row_array();
							 
			if ($data)
			{
				$data['detail'] = $this->db->select('detail_jurnal_temp.*,akun.nama_akun as akun')
										   ->from('detail_jurnal_temp')
										   ->join('akun', "detail_jurnal_temp.kode_akun=akun.kode_akun")
										   ->where('detail_jurnal_temp.kode_jurnal', $data['kode_jurnal'])
										   ->get()
										   ->result_array();	
			}
							 
			return $data;	
		}
			
		public function insert($data){
			//return $this->db->insert('jurnal_temp', $data);		

			$detail = $data['detail'];
			unset($data['detail']);
			$this->db->insert('jurnal_temp', $data);			
			$id = $data['kode_jurnal'];
			foreach($detail as $dt){
				$dt['kode_jurnal'] = $id;
				$id_dt = $this->db->insert('detail_jurnal_temp', $dt);
			}			
		}
		
		public function delete($id){
			$this->db->where('kode_jurnal', $id)->delete('jurnal_temp');
		}
		
		public function post($jurnal, $akun, $status){
			return $this->db->where('kode_jurnal', $jurnal)->where('kode_akun', $akun)->update('detail_jurnal_temp', ['status' => $status]);
		}
	}

?>