<?php

	class trans_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(){
			
			$data = $this->db->select('*')
							 ->from('transaksi')
							 //->join('pasien', "pasien.id_pasien = survey.id_pasien")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function getOne($id){
			$data = $this->db->select('*')
							 ->from('transaksi')
							 ->where('id_transaksi', $id)
							 ->get()
							 ->row_array();
							 
			if ($data)
			{
				$data['detail'] = $this->db->select('detail_transaksi.*, referensi.nama_referensi as referensi, akun.nama_akun as akun')
										   ->from('detail_transaksi')
										   ->join('referensi', "detail_transaksi.id_referensi = referensi.id_referensi")
										   ->join('akun', "detail_transaksi.id_akun = akun.id_akun")
										   ->where('detail_transaksi.id_transaksi', $data['id_transaksi'])
										   ->get()
										   ->result_array();
			}
							 
			return $data;	
		}
			
		public function insert($data){
			$detail = $data['detail'];
			unset($data['detail']);
			$this->db->insert('transaksi', $data);			
			$id = $this->db->insert_id();
			foreach($detail as $dt){
				$dt['id_transaksi'] = $id;
				$id_dt = $this->db->insert('detail_transaksi', $dt);
			}
		}
		
		public function delete($id){
			$this->db->where('id_transaksi', $id)->delete('detail_transaksi');
			$this->db->where('id_transaksi', $id)->delete('transaksi');
		}
		
		
		public function update($data, $id) {
			return $this->db->update('transaksi', $data, array('id_transaksi' => $id));
		}
		
		/*public function getOne($id){
			$data = $this->db->select('tangkapan.*,kapal.nama as nama_kapal,pelabuhan.nama as nama_pelabuhan')
							 ->from('tangkapan')
							 ->join('kapal', "kapal.id=tangkapan.id_kapal")
							 ->join('pelabuhan', "pelabuhan.id=tangkapan.id_pelabuhan")
							 ->where('tangkapan.id', $id)
							 ->get()
							 ->row_array();
			if ($data){
				$data['detail'] = $this->db->select('detail_tangkapan.*,ikan.nama as nama_ikan')
										   ->from('detail_tangkapan')
										   ->join('ikan', "ikan.id=detail_tangkapan.id_ikan")
										   ->where('detail_tangkapan.id_tangkapan', $data['id'])
										   ->get()
										   ->result_array();
			}
							 
			return $data;	
		}
		
		public function getPerTanggal(){
			$data = $this->db->select('tanggal, SUM(total) as total')
							 ->from('tangkapan')
							 ->group_by('tanggal')
							 ->limit(10)
							 ->order_by('tanggal', 'desc')
							 ->get()
							 ->result_array();
							 
			return $data;
		}
		
		public function insert($data){
			$detail = $data['detail'];
			unset($data['detail']);
			$this->db->insert('tangkapan', $data);			
			$id = $this->db->insert_id();
			foreach($detail as $dt){
				$dt['id_tangkapan'] = $id;
				$id_dt = $this->db->insert('detail_tangkapan', $dt);
			}
		}
		
		public function delete($id){
			$this->db->where('id_tangkapan', $id)->delete('detail_tangkapan');
			$this->db->where('id', $id)->delete('tangkapan');
		}
		*/
		
	
	}

?>