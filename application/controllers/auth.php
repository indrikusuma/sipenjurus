<?php if (!defined('BASEPATH')) exit('no direct script allowed');

	class auth extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
		}
		
		public function login(){
			//jika user belum login , redirect ke halaman login
			if ($this->session->userdata('kode_user'))
				redirect('/');
			
			$data['error'] = '';
			if ($this->input->post()){
				//ambil data email dan password
				$email = $this->input->post('email', true);
				$password = $this->input->post('password', true);
				$remember = $this->input->post('remember', true);
				
				//autentikasi ke user_model
				if ($this->pegawai_model->auth($email, $password, $remember)){
					//redirect ke halaman dashboard jika berhasil
					redirect('/akun');				
				}
				
				else{
					//tampilkan error jika gagal
					$data['error'] = "email dan password salah";
				}
					
			}
			
			$this->load->view('/auth/login', $data);
			
		}
		
		public function logout() {
			//jika user belum login, redirect ke halaman login
			if(!$this->session->userdata('kode_user'))
				redirect('/auth/login');
			
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('nama');
			$this->session->unset_userdata('jabatan');
			$this->session->unset_userdata('remember_me');
			redirect('/');
		}
		
	}




















?>