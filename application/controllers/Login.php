<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 
 	public function __construct()
 	{
 		parent::__construct();
 		// Pengecekan session login
 		if ($this->session->userdata('login')==1) {
 			// Pengecekan role untuk redirect
 			if ($this->session->userdata('level')==1) {
 				redirect('penggunaan','refresh');
 			} elseif ($this->session->userdata('level')==2) {
 				redirect('history','refresh');
 			} else{
 				redirect('pembayaran','refresh');
 			}
 		}

 		// Load Model Login
 		$this->load->model('M_login','l');
 	}
 	public function index()
 	{
 		// Load View Login
 		$this->load->view('v_login');
 	}

 	// Function untuk cek login
 	public function getLogin()
 	{
 		// Form validation login
 		$this->form_validation->set_rules('username', 'Username', 'trim|required');
 		$this->form_validation->set_rules('password', 'Password', 'trim|required');
 		// Pengecekan form validation
 		if ($this->form_validation->run() == TRUE) {
 			// Pengecekan suksesnya login dan role
 			if ($this->l->getLoginAdmin()->num_rows()>0) {
 			// Set session userdata admin
 			$admin = $this->l->getLoginAdmin()->row();
 			$objectAdmin = array(
 				'login' => 1,
	 			'nama' => $admin->nama,
	 			'level' => $admin->id_level);
 			$this->session->set_userdata( $objectAdmin );

 			// Response json
 			$data['status'] = 1;
 			$data['keterangan'] = 'Admin';
 			$data['level'] = $admin->id_level;
 			echo json_encode($data);
 		} elseif ($this->l->getLoginPelanggan()->num_rows()>0) {
 			// Set session userdata pelanggan
 			$pelanggan = $this->l->getLoginPelanggan()->row();
 			$objectPelanggan = array(
 				'login' => 1,
 				'id_pelanggan' => $pelanggan->id_pelanggan,
	 			'nama' => $pelanggan->nama_pelanggan,
	 			'nomor_kwh' => $pelanggan->nomor_kwh,
	 			'alamat' => $pelanggan->alamat,
	 			'id_tarif' => $pelanggan->id_tarif);
 			$this->session->set_userdata( $objectPelanggan );

 			// Response json
 			$data['status'] = 2;
 			$data['keterangan'] = 'Pelanggan';
 			echo json_encode($data);
 		} else{
 			// Response json jika username atau password salah
 			$data['status'] = 0;
 			$data['error'] = "Username Atau Password Anda Salah";
 			echo json_encode($data);
 		}
 		} else {
 			// Response json jika tidak sesuai dengan form validation
 			$data['status'] = 0;
 			$data['error'] = validation_errors();
 			echo json_encode($data);
 		}
 		
 	}
 
 }
 
 /* End of file Login.php */
 /* Location: ./application/controllers/Login.php */ ?>