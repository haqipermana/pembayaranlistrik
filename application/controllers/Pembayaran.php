<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// Cek session jika sudah login atau pelanggan
		if ($this->session->userdata('login')==1 || $this->session->userdata('level')!=1 || $this->session->userdata('level')!=2)
		{
			// Load model pembayaran
			$this->load->model('M_Pembayaran','byr');
		} else{
			redirect('login','refresh');
		}
	}
	public function index()
	{
		// Class untuk label
		$data['status'] = array('Belum Lunas','Pending','Lunas' );
		$data['label'] = array('danger','warning','success');

		// Array hasil query getPembayaranUser
		$data['pembayaran'] = $this->byr->getPembayaranUser();

		// Menampilkan view Pembayaran
		$data['judul'] = 'Pembayaran';
		$data['halaman'] = "v_pembayaran";
		$this->load->view('v_template', $data);
	}

	// Function untuk mengupload bukti pembayaran
	public function uploadPembayaran()
	{
		// Konfigurasi upload
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2000';
		// Load library upload
		$this->load->library('upload', $config);
		
		// Pengecekan suksesnya upload bukti gambar
		if ( ! $this->upload->do_upload('gambar')){
			// Jika upload error
			$error = $this->upload->display_errors();
			redirect('pembayaran','refresh');
		}
		else{
			// Menjalankan query insert ke database pembayaran
			$bayar = $this->byr->uploadDB($this->input->post('id_penggunaan'),$this->upload->data('file_name'));
			if ($bayar) {
				redirect('pembayaran','refresh');
			} else{
				redirect('pembayaran','refresh');
			}
		}
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
 ?>