<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Cek session login
		if ($this->session->userdata('login')!=1 || $this->session->userdata('level')!=1) {
			redirect('login','refresh');
		}
		// Load model verifikasi
		$this->load->model('M_verifikasi','v');
	}
	public function index()
	{
		// Class untuk label
		$data['status'] = array('Belum Lunas','Pending','Lunas' );
		$data['label'] = array('danger','warning','success');


		// Array hasil query getVerifikasiPending
		$data['verif'] = $this->v->getVerifikasiPending();

		// Menampilkan View Pelanggan
		$data['judul'] = "Verifikasi";
		$data['menu']= array('','','','','','active');
		$data['halaman'] = "v_verifikasi";
		$this->load->view('v_template', $data);
	}
	// Function ganti status pembayaran
	public function gantiStatus($id,$status,$idpmb)
	{
		// Pengecekan jika berhasil
		if ($this->v->gantiStatus($id,$status,$idpmb)) {
			redirect('verifikasi','refresh');
		}
	}

}

/* End of file Verifikasi.php */
/* Location: ./application/controllers/Verifikasi.php */
 ?>