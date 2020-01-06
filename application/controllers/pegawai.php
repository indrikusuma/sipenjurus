<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class pegawai extends CI_Controller 
	{
	
		public function __construct()
		{
			parent:: __construct();
			$this->load->model('jabatan_model');
			$this->load->library('form_validation');

			if(!$this->session->userdata('kode_pegawai'))
				redirect('auth/login');
		
		}

		public function index()
		{
			$data = $this->pegawai_model->getData();
			//var_dump($data);die;
			
			$this->layout->render('pegawai/index', array('data' => $data));
			
		}

		
		private function validasi(){
		//untuk mengingingatkan kita jika form dibwah ini belum diisi
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('kelamin', 'kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		return $this->form_validation->run();
	}		

		public function add(){
		$data=array();
		//pengecekan apakah method yang dikirim itu POST
		if ($this->input->post()){
			//data dari form diambil dan dikelompokkan
			$data=array(
			'kode_pegawai' 		 => $this->input->post('kode_pegawai'),
			'kode_jabatan' 		 => $this->input->post('jabatan'),
			'nama' 		 => $this->input->post('nama'),			
			'kelamin' 	 => $this->input->post('kelamin'),
			'alamat' 		 => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'password' 	 => $this->input->post('password'),
			);
			
			if ($this->validasi()){					
			//kirim ke model untuk proses simpan data
			$this ->pegawai_model ->insert_data($data);
			
			//set flashmessage
			$this->session->set_flashdata('message','Berhasil Menambahkan Data Pegawai');
			
			//pindah halaman ke list pegawai 
			redirect('pegawai/index');
			}
		}	
		
		//ambil data jabatan
		$jabatan = $this->jabatan_model->all();
		//panggil view form di folder pegawai, untuk menampilkan form
		$this->layout->render('pegawai/form_tambah', array('data_jabatan' => $jabatan, 'data'=> $data));
	}

		public function edit(){
		if ($this->input->post()){ //pengecekkan metode input
			$data = array(
			'kode_pegawai' 		 => $this->input->post('kode_pegawai'),
			'kode_jabatan' 		 => $this->input->post('jabatan'),
			'nama' 		 => $this->input->post('nama'),			
			'kelamin' 	 => $this->input->post('kelamin'),
			'alamat' 		 => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'password' 	 => $this->input->post('password'),
			);
			
			$id = $this->input->post('kode_pegawai');
			if ($this->validasi()){ // validasi berhasil
			//kirim ke model untuk proses update data
			$this ->pegawai_model ->update_data($data, $id);
			
			//set flashmessage
			$this->session->set_flashdata('message','Berhasil Mengubah Data Pegawai <strong>"'.$data['kode_jabatan'].'"</strong>.');
			
			//pindah halaman ke list pegawai 
			redirect('pegawai/index');
			}
			else {
				$data['kode_pegawai'] = $id;
			}
		}
		else {
		$id =$this->uri->segment(3);
		$data =$this->pegawai_model->one($id);
		}if ($data){
			//ambil data jabatan
			$jabatan = $this->jabatan_model->all();
			
			$this->layout->render('pegawai/form_ubah', array('data' => $data, 'data_jabatan' => $jabatan ));
		}
		else {
			//pindah halaman ke list pegawai 
			redirect('pegawai/index');
		}
	}

		public function drop()
		{
			
			$datapegawai = $this->pegawai_model->getDatas($this->input->get('contains'));
			
			echo json_encode($datapegawai);
			
		}	

		public function hapus()
		{
			$id = $this->uri->segment(3);
			
			$this->pegawai_model->delete($id);
			
			redirect('/pegawai/index');
		}

		
		public function detail(){
			
			$id = $this->uri->segment(3);
			$data = $this->pegawai_model->all();
			//tampilkan ke model
			$this->layout->render('pegawai/detail', array('data' => $data));
		}
	
	}	

?>