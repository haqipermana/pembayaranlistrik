
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			// Cek Session Login
			if ($this->session->userdata('login')!=1 || $this->session->userdata('level')!=1) {
				redirect('login','refresh');
			}
			$this->load->model('M_Pelanggan','a');
		}
		// Function Index
		public function index()
		{
			// Array Hasil Query getAllPelanggan
			$data['pelanggan'] = $this->a->getAllPelanggan();

			// Array Hasil Query getTarif	
			$data['tarif'] = $this->a->getTarif();

			// Menampilkan View Pelanggan
			$data['judul'] = "Pelanggan";
			$data['menu']= array('','active','','','','');
			$data['halaman'] = 'v_pelanggan';
			$this->load->view('v_template', $data);
		}
		// Function menghapus pelanggan
		public function hapusPelanggan($id)
		{
			//Pengecekan hasil query hapus
			if ($this->a->deletePelanggan($id)) {
				redirect('pelanggan','refresh');
			}
		}
		// Function menambahkan pelanggan
		public function addPelanggan()
		{
			// Pengecekan hasil query menambahkan pelanggan
			if ($this->a->addPelanggan()) {
				// Menampilkan pesan jika sukses
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambahkan Data Pelanggan</div>');
				redirect('pelanggan','refresh');
			} else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Nomor Kwh atau Username sudah digunakan</div>');
				redirect('pelanggan','refresh');
			}
		}
		// Function mengupdate pelanggan berdasarkan id pelanggan
		public function updatePelanggan($id)
		{
			// Pengecekan hasil query update
			if ($this->a->updatePelanggan($id)) {
				redirect('pelanggan','refresh');
			}
		}
}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */
 ?>