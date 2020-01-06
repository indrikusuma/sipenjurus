<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class akun extends CI_Controller 
	{
	
		public function __construct()
		{
			parent:: __construct();
		
			if(!$this->session->userdata('kode_pegawai'))
				redirect('auth/login');
		
		}

		public function index()
		{
			//$session = $this->session->all_userdata();
			//$cari = $this->input->get('cari');
				
			$cari = $this->input->get('cari');
			$data = $this->akun_model->getData($cari);
			//var_dump($data);die;
			
			$this->layout->render('akun/index', array('data' => $data));
			
		}

		public function tambah()
		{
			
			$data = array();
			$error = '';
			
			$code = $this->input->post('kode_akun', true);
			$str = preg_replace("/0/","",$code);
			$lev = strlen($str);
			if($this->input->post())
			{
				$data = array(
					 'kode_akun' => $this->input->post('kode_akun', true),
					 'nama_akun' => $this->input->post('nama_akun', true),
					 'level' => $lev,
					 'akun_induk' => $this->input->post('akun_induk', true),
					 'saldo_normal' => $this->input->post('saldo_normal', true),
					 'saldo' => $this->input->post('saldo', true),
					 'saldo_normalreport' => $this->input->post('report', true),
					 
				 );	
					
				$this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');
				
				if ($this->form_validation->run() == false){
					$error .= validation_errors();
				}
				
				
				if (!$error){
					$this->akun_model->insert($data);
					
					redirect('akun/index');	
				}
			}
			
			$this->layout->render('akun/form_tambah', array('error' => $error));
			
		}

		public function ubah()
		{
			//$session = $this->session->all_userdata();
			$data = array();
			$error = '';
			
			if($this->input->post())
			{
				$id = $this->input->post('kode_akun',true);
				
				//$data = $this->akun_model->getOne($id);
					
				$data['kode_akun'] =  $this->input->post('kode_akun', true);
				$data['nama_akun'] =  $this->input->post('nama_akun', true);
				$data['akun_induk'] =  $this->input->post('akun_induk', true);
				$data['saldo_normal'] =  $this->input->post('saldo_normal', true);
				$data['saldo'] =  $this->input->post('saldo', true);
				$data['saldo_normalreport'] =  $this->input->post('report', true);
				
					
				// mulai validasi
				$this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');
				
				if ($this->form_validation->run() == false){
					$error .= validation_errors();
				}
				
				if (!$error){
					
					//simpan perubahan dalam database
					$this->akun_model->update($data, $id);
					
					//redirect ke halaman index
					redirect('/akun/index');
				}
			}else{
				//ambil id yang ada di segment 3
				$id = $this->uri->segment(3);
				
				//ambil detail data yang akan diubah
				$data = $this->akun_model->getOne($id);
				//var_dump($data);die;
			}
			//tampilkan form jika dari link tambah
			$this->layout->render('akun/form_ubah', array('data' => $data, 'error' => $error));
		}

		public function pdf(){
			$data = $this->akun_model->getData();
			
			$html = $this->load->view('akun/dokumen', array('data' => $data), true);
			
			$this->load->helper(array('pdf', 'file'));
			pdf_create($html, 'laporan_akun');
		}

		public function excel(){
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-Disposition: attachment; filename=laporan_akun.xls");  //File name extension was wrong
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false);
			
			$data = $this->akun_model->getData();
			
			$this->load->view('akun/dokumen', array('data' => $data));
		}
	
	}	

?>