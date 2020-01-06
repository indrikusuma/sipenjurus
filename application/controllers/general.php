<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class general extends CI_Controller 
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
			$data = $this->general_model->getData($cari);
			//var_dump($data);die;
			
			$this->layout->render('general/index', array('data' => $data));
			
		}

		public function report()
		{	
			$data = $this->general_model->getData();
			$this->layout->render('general/report', array('data' => $data));
			
		}
		
		public function partreport()
		{
			$data = $this->general_model->getDataPart();
			$this->layout->render('general/partreport', array('data' => $data));
		}

		public function pdf(){
			$data = $this->general_model->getData();
			
			$html = $this->load->view('general/dokumen', array('data' => $data), true);
			
			$this->load->helper(array('pdf', 'file'));
			pdf_create($html, 'report');
		}

		public function excel(){
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-Disposition: attachment; filename=report.xls");  //File name extension was wrong
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false);
			
			$data = $this->general_model->getData();
			
			$this->load->view('general/dokumen', array('data' => $data));
		}
	
	}	

?>