<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class jurnal extends CI_Controller 
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
			$data = $this->jurnal_model->getData($cari);
			//var_dump($data);die;
			
			$this->layout->render('jurnal/index', array('data' => $data));
			
		}

		public function tambah()
		{
			
			$data = array();
			$error = '';
			
			$counter = $this->jurnal_model->counter();
			//var_dump($counter);die;
			$string = (string)$counter+1;
			
			$id = "JUR.".date("d-m-Y").".".$string;
			
			//$data['id'] = $id;
			
			//var_dump($id);die;
			
			if($this->input->post())
			{
				
				
				
			//ambil data dari form dan kumpulkan dalam 1 array
			$data = array(
					 'kode_jurnal' => $id,
					 'kode_jenisbayar' => $this->input->post('kode_jenisbayar', true),
					 'referensi' => $this->input->post('referensi', true),
					 'keterangan' => $this->input->post('keterangan', true),
					 'kode_pegawai' => 'peg.001',
					 'kode_postransaksi' => $this->input->post('id_postransaksi', true),
					 'status' => $this->input->post('status', true),
					 'cek' => $this->input->post('cek', true)
					 
					 
				 );	
				
				
			//.$this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');
				
				if ($this->form_validation->run() == false){
					$error .= validation_errors();
				}
				
				$totalDebet = $this->input->post('totalDebet', true);
				$totalKredit = $this->input->post('totalKredit', true);
				
				if($totalDebet != $totalKredit)
				{
					$error = "akun tidak balance";
				}
				
				
			
			//cek validasi
			if (!$error){				
				$data['detail'] = array();
				foreach($_POST['id_akun'] as $k => $akun){
					
					/*$debet = $_POST['debet'][$k];
					$kredit = $_POST['kredit'][$k];
					
					if($debet == "")
						$debet = 0;
					elseif($kredit == "")
						$kredit = 0;*/
					
					if ($akun){
						//$total = intval($_POST['berat'][$k]) * intval($_POST['harga'][$k]);
						$data['detail'][] = array(
							'kode_jurnal' => $id, 
							'kode_akun' => $akun, 
							'debet' => $_POST['debet'][$k],
							'kredit' => $_POST['kredit'][$k],
							'status' => 'unpost'
						);
						//$data['total'] += $total; 
					}
				}
				
				//var_dump($this->input->post());die;
				//simpan data ke database
				$this->jurnal_model->insert($data);
				
				//redirect ke halaman index
				redirect('jurnal/index');	
			}
		}
		
			$dataakun = $this->akun_model->getData();
			
			$this->layout->render('jurnal/form_tambah', array('error' => $error, 'counter' => $counter, 'dataakun' => $dataakun, 'id' => $id));
			
		}
		
		public function drop()
		{
			
			$dataakun = $this->jurnal_model->getDatas($this->input->get('contains'));
			
			echo json_encode($dataakun);
			
		}	

		public function hapus()
		{
			$id = $this->uri->segment(3);
			
			$this->jurnal_model->delete($id);
			
			redirect('/jurnal/index');
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
		
		public function detail(){
			
			$id = $this->uri->segment(3);
			$data = $this->jurnal_model->getOne($id);
			//tampilkan ke model
			$this->layout->render('jurnal/detail', array('data' => $data));
		}
		
		public function post(){
			//http://localhost/buku/index.php/jurnal/post/JUR.04-06-2016.1/11010101/post
			
			$jurnal = $this->uri->segment(3);
			$akun = $this->uri->segment(4);
			$status = $this->uri->segment(5);
			//$ids = $this->berita_model->post($id);
			
			$this->jurnal_model->post($jurnal, $akun, $status);
								
			redirect('/jurnal/detail/'.$jurnal);
		}

		public function pdf(){
			$data = $this->jurnal_model->getData();
			
			$html = $this->load->view('jurnal/dokumen', array('data' => $data), true);
			
			$this->load->helper(array('pdf', 'file'));
			pdf_create($html, 'laporan_jurnal');
		}

		public function excel(){
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-Disposition: attachment; filename=laporan_jurnal.xls");  //File name extension was wrong
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false);
			
			$data = $this->jurnal_model->getData();
			
			$this->load->view('jurnal/dokumen', array('data' => $data));
		}
	
	}	

?>