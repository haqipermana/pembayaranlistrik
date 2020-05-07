 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Cek jika ada session login yang aktif 
		if ($this->session->userdata('login')==1) {
			redirect('login','refresh');
		}
		$this->load->model('M_Tarif','tr');
		$this->load->model('M_Register','rg');
	}
	public function index()
	{
		// Array hasil query getTarifAll
		$data['tarif'] = $this->tr->getTarifAll();

		// Load view registrasi
		$this->load->view('v_registrasi',$data);
	}
	// Function daftar
	public function daftar()
	{
		// Pengecekan jika sukses melakukan registrasi
		if ($this->rg->registrasi()) {
			$data['status'] = 1;
			// Response json jika sukses
			echo json_encode($data);
		} else{
			$data['status'] = 0;
			$data['error'] = "Username atau Nomor kwH sudah digunakan";
			// Response json jika error
			echo json_encode($data);
		}
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
 ?>