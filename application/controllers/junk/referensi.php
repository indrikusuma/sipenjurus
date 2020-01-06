<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class referensi extends CI_Controller 
	{
	
		public function __construct()
		{
			parent:: __construct();

		}

		public function index()
		{
			//$session = $this->session->all_userdata();
			//$cari = $this->input->get('cari');
				
			$cari = $this->input->get('cari');
			$data = $this->ref_model->getData($cari);
			
			$this->layout->render('referensi/index', array('data' => $data));
			
		}

		public function tambah()
		{
			
			$data = array();
			$error = '';
			if($this->input->post())
			{
				$data = array(
					 'nama_referensi' => $this->input->post('nama_referensi', true),
					 'tanggal' => $this->input->post('tanggal', true),
					 'bukti' => ''
				 );	
					
				$this->form_validation->set_rules('nama_referensi', 'Nama Referensi', 'required');
				
				if ($this->form_validation->run() == false){
					$error .= validation_errors();
				}
				
				if (!$error && $_FILES['bukti']['error'] != 4){
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('bukti')){
						$error .= "<p>".$this->upload->display_errors()."</p>";
					}else{
						$data['bukti'] = $this->upload->data()['file_name'];
					}   
				}
				
				if (!$error){
					$this->ref_model->insert($data);
					
					redirect('referensi/index');	
				}
			}
			
			$this->layout->render('referensi/form_tambah', array('error' => $error));
			
		}

		public function hapus()
		{
			$id = $this->uri->segment(3);
			
			$this->ref_model->delete($id);
			
			redirect('/referensi/index');
		}

		public function ubah()
		{
			//$session = $this->session->all_userdata();
			$data = array();
			$error = '';
			if($this->input->post())
			{
				$id = $this->input->post('id_referensi');
				
				$data = $this->ref_model->getOne($id);
				
				$data['nama_referensi'] =  $this->input->post('nama_referensi', true);
				$data['tanggal'] =  $this->input->post('tanggal', true);
					
				// mulai validasi
				$this->form_validation->set_rules('nama_referensi', 'Nama Referensi', 'required');
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
				
				if ($this->form_validation->run() == false){
					$error .= validation_errors();
				}
				
				// mulai upload
				if (!$error && $_FILES['bukti']['error'] != 4){
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('bukti')){
						$error .= "<p>".$this->upload->display_errors()."</p>";
					}else{
						$data['bukti'] = $this->upload->data()['file_name'];
					}
				}
				
				if (!$error){
					//simpan perubahan dalam database
					$this->ref_model->update($data, $id);
					
					//redirect ke halaman index
					redirect('/referensi/index');
				}
			}else{
				//ambil id yang ada di segment 3
				$id = $this->uri->segment(3);
				
				//ambil detail data yang akan diubah
				$data = $this->ref_model->getOne($id);
			}
			//tampilkan form jika dari link tambah
			$this->layout->render('referensi/form_ubah', array('data' => $data, 'error' => $error));
		}

		public function pdf(){
			$data = $this->ref_model->getData();
			
			$html = $this->load->view('referensi/dokumen', array('data' => $data), true);
			
			$this->load->helper(array('pdf', 'file'));
			pdf_create($html, 'laporan_referensi');
		}

		public function excel(){
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-Disposition: attachment; filename=laporan_referensi.xls");  //File name extension was wrong
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false);
			
			$data = $this->ref_model->getData();
			
			$this->load->view('referensi/dokumen', array('data' => $data));
		}
	
	}	

?>