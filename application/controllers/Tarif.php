<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

	public function __construct()
	{
		// Cek Session Login
		parent::__construct();
		if ($this->session->userdata('login')!=1 || $this->session->userdata('level')!=1) {
			redirect('login','refresh');
		}
		$this->load->model('M_Tarif','t');
	}
	public function index()
	{
		// Array hasil query getTarifAll
		$data['tarif'] = $this->t->getTarifAll();

		// Menampilkan View Tarif
		$data['judul'] = "Tarif";
		$data['menu']= array('','','','active','','');
		$data['halaman'] = 'v_tarif';
		$this->load->view('v_template', $data);
	}
	// Function menghapus tarif berdasarkan id tarif
	public function deleteTarif($id)
	{
		// Pengecekan jika berhasil menghapus tarif
		if ($this->t->deleteTarif($id)) {
			// Menampilkan pesan jika sukses
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Tarif</div>');
			redirect('tarif','refresh');
		}
	}
	// Function menambahkan tarif
	public function addTarif()
	{
		if ($this->t->addTarif()) {
			// Menampilkan pesan jika sukses
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambahkan Tarif</div>');
			redirect('tarif','refresh');
		}
	}
	// Function mengupdate tarif
	public function updateTarif()
	{
		if ($this->t->updateTarif()) {
			// Menampilkan pesan jika sukses
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Update Tarif</div>');
			redirect('tarif','refresh');
		}
	}

}

/* End of file Tarif.php */
/* Location: ./application/controllers/Tarif.php */ ?>