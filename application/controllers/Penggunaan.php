 <?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Penggunaan extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			// Cek Session Login
			if ($this->session->userdata('login')!=1 || $this->session->userdata('level')!=1) {
				redirect('login','refresh');
			}
			// Load Model Pelanggan & Penggunaan
			$this->load->model('M_Pelanggan','pl');
			$this->load->model('M_Penggunaan','pg');
		}
		// Function Index
		public function index()
		{
			// Array Bulan
			$data["bulan"] = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			
			// Array Class Active sidebar
			$data['menu']= array('active','','','','','');

			// Array Hasil Query getAllPelanggan
			$data["pelanggan"] = $this->pl->getAllPelanggan();
			
			//Load View Penggunaan
			$data["judul"] = "Penggunaan"; 
			$data["halaman"] = "v_penggunaan";
			$this->load->view('v_template', $data);
		}
		// Function untuk menambahkan peggunaan
		public function addPenggunaan()
		{
			// Cek jika query berhasil
			if ($this->pg->addPenggunaan()) {
				// Menampilkan pesan jika sukses
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambahkan Penggunaan</div>');
				redirect('penggunaan','refresh');
			} else{
				// Menampilkan pesan jika gagal
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Penggunaan di bulan ini sudah ada</div>');
				redirect('penggunaan','refresh');
			}
		}
		// Function untuk halaman detail penggunaan
		public function detail($id)
		{
			// Class Active sidebar
			$data['menu']= array('active','','','','','');

			// Array label status
			$data['status'] = array('Belum Lunas','Pending','Lunas' );
			$data['label'] = array('danger','warning','success');

			// Array Hasil Query getPenggunaanDetail
			$data["detail"] = $this->pg->getPenggunaanDetail($id)->result();

			// Load View Detail Penggunaan
			$nama = $this->pl->getPelangganById($id)->nama_pelanggan;
			$data["judul"] = "Penggunaan ".$nama.""; 
			$data["pelanggan"] = $this->pl->getPelangganById($id);
			$data["halaman"] = "v_detailPenggunaan";
			$this->load->view('v_template', $data);	
		}
	
	}
	
	/* End of file Penggunaan.php */
	/* Location: ./application/controllers/Penggunaan.php */
 ?>