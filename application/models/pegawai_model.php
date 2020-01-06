<?php

	class pegawai_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function getData(/*$cari = false*/){
			
			
			$data = $this->db->select('pegawai.*, jabatan.nama_jabatan as jabatan')
							 ->from('pegawai')							 
							 ->join('jabatan', "jabatan.kode_jabatan = pegawai.kode_jabatan")
							 ->get()
							 ->result_array();
							 
			return $data;				 
		}
		
		public function auth($email, $password, $remember = false) {
			//ambil data user di tabel
			$user = $this->db->select('pegawai.*, jabatan.nama_jabatan as jabatan')
							 ->where('email', $email)
						 	 ->where('password', $password)
							 ->join('jabatan', "jabatan.kode_jabatan = pegawai.kode_jabatan")
							 ->from('pegawai')
							 ->get()
							 ->row_array();
					
			//cek apakah user ada
			if($user){
				//jika user ada maka simpan session user
				$this->session->set_userdata('kode_pegawai', $user['kode_pegawai']);
				$this->session->set_userdata('nama', $user['nama']);
				$this->session->set_userdata('jabatan', $user['jabatan']);
				
				//set remember me jika dicentang
				if ($remember)
					$this->session->set_userdata('remember_me', TRUE);
				return true;
			}		
				
			else
				return FALSE;		
		
		}

		public function update_data($data, $id){
		
		$this->db->where('kode_pegawai',$id)->update('pegawai', $data);
		}
	
		public function insert_data($data){
		
		$this->db->insert('pegawai',$data);
		}
		
		
		public function all(){
        	$rows = $this->db
            ->select('pegawai.*, jabatan.nama as nama_jabatan')
            ->from('pegawai')
            ->join('jabatan', 'jabatan.kode = pegawai.kode_jabatan')
            ->get()
            ->result_array();
        return $rows;
    }

    	public function delete($id){
			$this->db->where('kode_pegawai', $id)->delete('pegawai');
		}

	function one($id){
		$data = $this->db
			->from('pegawai')
			->where('kode_pegawai', $id)
			->get()
			->row_array();
		  return $data;
	}
}

?>